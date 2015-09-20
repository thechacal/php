<?php

class Sistema_NewsletterController extends Model_Modelo
{
	
	  private $tbl_usuario;
	  private $tbl_newsletter;
	  private $tbl_oferta;
	
      public function init()
      {
      		$this->tbl_usuario = new Model_Usuario_Table();
      		$this->tbl_newsletter = new Model_Newsletter_Table();
      		$this->tbl_oferta = new Model_Oferta_Table();
      }

      public function indexAction()
      {
			$this->view->content = array('page_title' => 'Newsletter');

	   		$select = $this->tbl_usuario->select()
	    				->setIntegrityCheck(false)
		       		   ->from(array('u'=>'usuario'), array('email'=>'u.email'))
		       		   ->join(array('c'=>'cidade'),'u.id_cidade = c.id',array('cidade'=>'nome'))
		       		   ->where('u.newsletter = 1')
		       		   ->query()
		       		   ->fetchAll();
		        		   
	    	$select2 = $this->tbl_newsletter->select()
	    				->setIntegrityCheck(false)
		       		   ->from(array('n'=>'newsletter'), array('email'=>'n.email'))
		       		   ->join(array('c'=>'cidade'),'n.id_cidade = c.id',array('cidade'=>'nome'))
		       		   ->where('n.inscricao_cancelada = 0')
		       		   ->where('n.confirmado = 1')
		       		   ->query()
		       		   ->fetchAll();
			
      		$users = array_merge($select, $select2);
			$users = Model_Util::super_unique($users);
		       		   
			$this->view->dados = $users;
      }
      
      public function enviaAction(){
	    	$this->_helper->layout()->disableLayout();
	        		   
	   		$select = $this->tbl_usuario->select()
		       		   ->from(array('u'=>'usuario'), array('email'=>'u.email','id_cidade'=>'u.id_cidade'))
		       		   ->where('u.newsletter = 1')
		       		   ->query()
		       		   ->fetchAll();
		        		   
	    	$select2 = $this->tbl_newsletter->select()
		       		   ->from(array('n'=>'newsletter'), array('email'=>'n.email','id_cidade'=>'n.id_cidade'))
		       		   ->where('n.inscricao_cancelada = 0')
		       		   ->where('n.confirmado = 1')
		       		   ->query()
		       		   ->fetchAll();
		       		   
      		$users = array_merge($select, $select2);
			$users = Model_Util::super_unique($users);
						
			$i = 0;
			foreach($users as $v){
				
	    		$select = $this->tbl_oferta->select()
		        		   ->setIntegrityCheck(false)
		        		   ->from(array('o'=>'oferta'), array('titulo'=>'o.titulo','preco_normal'=>'o.M_preco_normal','preco_oferta'=>'o.M_preco_oferta','fotos'=>'o.imagens','id_oferta'=>'o.id','id_cidade'=>'o.id_cidade'))
		        		   ->join(array('p'=>'parceiro'),'p.id = o.id_parceiro',array('nome_parceiro' => 'p.nome','sobre_parceiro'=>'p.sobre','rua'=>'p.rua','numero'=>'p.numero','complemento'=>'p.complemento','cep'=>'p.cep','bairro'=>'p.bairro','site'=>'p.site','telefone'=>'p.telefone'))
		        		   ->where('o.id_cidade = '.$v['id_cidade'])
						   ->order('o.id DESC')
		        		   ->query()
		        		   ->fetchAll();

				if(count($select) > 0){

					
						$dados = $select[0];
						
						/* DADOS DA OFERTA */
						$id_oferta = $dados['id_oferta'];
						$cidade = $this->getCidadeById($dados['id_cidade']);
						$titulo = utf8_decode(strip_tags($dados['titulo']));
						$preco_normal = Model_Util::stringToMoney( $dados['preco_normal'], false );
						$preco_oferta = Model_Util::stringToMoney( $dados['preco_oferta'], false );
						
						$images = explode(',',$dados['fotos']);
						$foto = $images[0];
						
						/* DADOS DO PARCEIRO DA OFERTA */
						$nome_parceiro = utf8_decode($dados['nome_parceiro']);
						$sobre_parceiro = utf8_decode(strip_tags($dados['sobre_parceiro']));
						$rua = utf8_decode($dados['rua']);
						$numero = utf8_decode($dados['numero']);
						$complemento = (!empty($dados['complemento'])) ? utf8_decode($dados['complemento']) : '' ;
						$cep = $dados['cep'];
						$bairro = utf8_decode($dados['bairro']);
						$site = (!empty($dados['site'])) ? 'http://'.$dados['site'] : '' ;
						$telefone = $dados['telefone'];
				
	
	    				$email = $v['email'];
	    	
	    				$conteudo = '
												<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
												  <tr>
												  	<td align="center"><p><font face="Arial" size="2">Se n&atilde;o conseguir visualizar esta newsletter, <a href="http://compranacidade.com.br/newsletter/visualiza/'.base64_encode($id_oferta).'" target="_blank">acesse aqui</a>!</font></p><br/></td>
												  </tr>
												  <tr>
												  	<td></td>
												  </tr>
												  <tr>
												    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
												  </tr>
												  <tr>
												    <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
												      <tr>
												        <td><p><font face="Arial" size="5"><strong>'.$titulo.'</strong></font></p>
												          <table width="100%" border="0" cellspacing="0" cellpadding="0">
												            <tr>
												              <td width="241"><table width="241" border="0" cellspacing="0" cellpadding="0" height="203">
												                <tr>
												                  <td valign="top" background="http://compranacidade.com.br/public/css/images/balao.jpg">
												                    <table width="95%" border="0" cellspacing="10" cellpadding="0">
												                    <tr>
												                    	<td></td>
												                    </tr>
												                    <tr>
												                      <td><p align="center"><font color="#FFFFFF" size="5" face="Arial"><b>de R$'.$preco_normal.'</b></font><br />
											                          <font color="#FED000" size="6" face="Arial"><b>por R$'.$preco_oferta.'</b></font></p></td>
											                        </tr>
												                    <tr>
												                      <td align="center"><a href="http://compranacidade.com.br/'.$cidade['nome'].'/oferta/'.$id_oferta.'"><img src="http://compranacidade.com.br/public/css/images/bt_visitenos.png" border="0" /></a></td>
												                      </tr>
										                          </table>                                                             
	                                                              </td>
											                    </tr>
											                  </table>
	                                                              <br/>                                                             
	                                                                <p><font color="#000000" size="3" face="Arial"><strong>'.$nome_parceiro.'</strong></font></p>
	                                                                <p><font color="#000000" size="2" face="Arial">'.$rua.', '.$numero.'<br/>
	                                                                '.$bairro.' - CEP: '.$cep.'<br/>
	                                                                Telefone: '.$telefone.'</font></p>
	                                                          </td>
												              <td valign="top"><img src="http://compranacidade.com.br/uploads/'.$foto.'" width="340" /></td>
											                </tr>
												            <tr>
												              <td colspan="2">&nbsp;</td>
											                </tr>
												            <tr>
												              <td colspan="2"><font face="Arial" size="2">'.$sobre_parceiro.'</font></td>
											                </tr>
												            <tr>
												              <td colspan="2">&nbsp;</td>
											                </tr>
												            <tr>
												              <td colspan="2" height="1" bgcolor="#000000"></td>
											                </tr>
												            <tr>
												              <td colspan="2" align="center">
												              	<p><font face="Arial" size="2">
												              		Se desejar n&atilde;o receber mais esta newsletter, favor <a href="http://compranacidade.com.br/newsletter/cancelar/'.base64_encode($email).'">clique aqui</a>!
												              	</font></p>
												              </td>
											                </tr>
											              </table></td>
												      </tr>
												    </table></td>
												  </tr>
												</table>
						';
	    				
						$mail = new Model_PHPMailer();
						$mail->IsSMTP(); // mandar via SMTP
//						$mail->Host = "smtp.googlemail.com"; // Seu servidor SMTP
//						$mail->SMTPAuth = true; // Habilita a autenticação via SMTP
//						$mail->Username = "jonata.marcelino@multclick.com.br"; // usuário deste servidor SMTP
//						$mail->Password = "j0n4t41983"; // senha deste servidor SMTP
						$mail->From = "newsletter@compranacidade.com.br"; // Remetente
					    $mail->FromName = "Site Compra na Cidade";
						$mail->isHTML(true);
					    $mail->AddAddress("$email");
					    $mail->Subject = "Compra na Cidade - Newsletter";
					   	$mail->Body = $conteudo;
					    $mail->Send();
	    				
				}
				
	    		if($i == 9){
	    			$i = 0;
	    			sleep(10);
	    		} else
					$i++;				
				
			}
				    
	    	session_start();
	    
	    	$_SESSION['msg']['content'] = 'O envio da newsletter foi enviado para os usu&aacute;rios com sucesso!';
	    	$_SESSION['msg']['title'] = 'Sucesso!'; 
		
	    	$this->_redirect('/sistema/newsletter');
      }
      
}