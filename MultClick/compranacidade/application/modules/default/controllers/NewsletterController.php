<?php

class NewsletterController extends Model_Modelo
{

	  private $tbl_oferta;
	  private $tbl_newsletter;
	  private $tbl_usuario;
	
      public function init()
      {
      		$this->tbl_oferta = new Model_Oferta_Table();
      		$this->tbl_newsletter = new Model_Newsletter_Table();
      		$this->tbl_usuario = new Model_Usuario_Table();
      }

      public function indexAction()
      {
      	
            if ( $this->isPost() )
            {
            	
                  $now = time();
                  $data = $this->getPost();
                  
                  $redireciona = ($data['tipo']) ? '/'.$data['tipo'].'/' : '/' ;
                  $c = (isset($data['cidade'])) ? $data['cidade'] : $data['id_cidade'] ;
                  
                  if(($c == 'Escolha a cidade') || ($c == 'Cidade'))
                  	$c = '';
                  
                  session_start();
                  	
                 if ( !empty( $data['email'] ) && !empty($c) )
                  {
                  	
						if(isset($data['cidade'])){
							$cidade = $this->getCidadeByNome( $data['cidade'] );
							$id_cidade = $cidade['id'];
						} else {
							$id_cidade = $data['id_cidade'];
						}
                  	
					    $cidade = $this->getCidadeByNome( $data['cidade'] );
					    
                        $newsTbl = new Model_Newsletter_Table();
                        $validaEmail = new Zend_Validate_EmailAddress();
                        $validaUnico = $newsTbl->select()->from( $newsTbl, 'id' )
                                            ->where( 'email=?', $data['email'] )
                                            ->where( 'id_cidade=?', $id_cidade )
                                            ->query()->fetch();

						$existeEmail = $newsTbl->select()->from( $newsTbl, 'COUNT(*) as total' )
                        		->where( 'email=?', $data['email'] )
                                ->where( 'id_cidade=?', $id_cidade )
                                ->query()->fetch();
                                
						$existe = ($existeEmail['total'] > 0) ? true : false ;

						if(!$existe){
						
	                        if ( $validaEmail->isValid( $data['email'] ) )
	                        {
	                        	
	                              if ( !isset( $validaUnico['id'] ) )
	                              {
	
	                                    $newsTbl->insert( array(
	                                          'email' => $data['email'],
	                                          'id_cidade' => $id_cidade,
	                                          'data' => $now,
	                                          'confirmado' => 0,
	                                          'inscricao_cancelada' => 0
	                                              ) );
	                                              
	                                    $newsletter = $newsTbl->select()->from( $newsTbl, 'id' )
	                                                        ->where( 'email=?', $data['email'] )
	                                                        ->where( 'id_cidade=?', $id_cidade )
	                                                        ->query()->fetch();
	
	                                                        
	                                    $sistemaTbl = new Model_Sistema_Table();
	                                    $nome_site = $sistemaTbl->getNomeSite();
	                                    $dominio = 'http://' . $_SERVER['SERVER_NAME'];
	                                    $link = $dominio . '/newsletter/confirmar/' . base64_encode( $newsletter['id'] ) . '/' . base64_encode( $data['email'] ) . '/' . base64_encode( $data['cidade'] );
	
	                                    /**
	                                     * Envia email
	                                     */
	                                    $mail = new Model_PHPMailer();
										$mail->IsSMTP(); // mandar via SMTP
										$mail->From = "contato@compranacidade.com.br"; // Remetente
									    $mail->FromName = "Site Compra na Cidade";
										$mail->isHTML(true);
	                                    $mail->AddReplyTo( 'noreply@noreply.com.br' );
	                                    $mail->AddAddress( $data['email'] );
									    $mail->Subject = "Compra na Cidade - E-mail de confirma��o da Compra";
	
	                                    $msg = '
											<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
											  <tr>
											    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
											  </tr>
											  <tr>
											    <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
											      <tr>
											        <td><p><font face="Arial" size="5"><strong>Prezado assinante</strong></font></p>
											          <p><font face="Arial" size="3">Para confirmar sua inscri&ccedil;&atilde;o em nossa lista voc&ecirc; deve acessar o link abaixo:</font></p>
											          <p><font face="Arial" size="3"><a href="' . $link . '">' . $link . '</a></font></p>
											          <p><font face="Arial" size="3">Atenciosamente,<br/>
											          Equipe ' . $nome_site . '</font></p></td>
											      </tr>
											    </table></td>
											  </tr>
											</table>
	                                    ';
	                                    
									   	$mail->Body = $msg;
	                                    
	                                    if ( $mail->Send() )
	                                    {
					                          $_SESSION['msg']['title'] = 'Sucesso';
					                          $_SESSION['msg']['content'] = 'Seu e-mail foi cadastrado em nossa lista.<br />Para confirmar a inscrição você deve ir em seu e-mail cadastrado seguir as instruções';
	                                    }
	                                    else
	                                    {
					                          $_SESSION['msg']['title'] = 'Erro';
					                          $_SESSION['msg']['content'] = 'Ocorreu um erro. Contacte o administrador';
	                                    }
	                                    $this->redirect($redireciona);
	                              }
	                              else
	                              {
					                    $_SESSION['msg']['title'] = 'Erro';
										$_SESSION['msg']['content'] = 'Este e-mail já está cadastrado para receber notícias dessa cidade';
	                                    $this->redirect( '/' );
	                              }
	                        }
	                        else
	                        {
					              $_SESSION['msg']['title'] = 'Erro';
								  $_SESSION['msg']['content'] = 'O endereço de e-mail dado é inválido';
	                              $this->redirect($redireciona);
	                        }
	                        
						} else {
				              $_SESSION['msg']['title'] = 'Erro';
							  $_SESSION['msg']['content'] = 'O seu e-mail j&aacute; foi cadastrado!';
                              $this->redirect($redireciona);							
						}
	                        
                  }
                  else
                  {                
                  		$redireciona = ($data['tipo']) ? '/'.$data['tipo'].'/' : '/' ;
                  	
				        $_SESSION['msg']['title'] = 'Erro';
						$_SESSION['msg']['content'] = 'Você deve preencher todos os campos para cadastrar em nossa newsletter';
                        $this->redirect($redireciona);
                  }
            }
            else
            {
                  $this->redirect( '/' );
            }
      }

      public function confirmarAction()
      {
            $cidade = $this->getRequest()->getParam( 'cidade' );
            
            if ( isset( $cidade ) )
            {
                  $id = base64_decode( $this->getRequest()->getParam( 'id' ) );
                  $email = base64_decode( $this->getRequest()->getParam( 'email' ) );
                  $cidade = $this->getCidadeByNome( base64_decode( $this->getRequest()->getParam( 'cidade' ) ) );

                  $newsTbl = new Model_Newsletter_Table();
                  $newsletter = $newsTbl->find( $id )->current();

                  if ( is_object( $newsletter ) )
                  {
                        $newsletter = $newsletter->toArray();
                        if ( $newsletter['email'] == $email && $newsletter['id_cidade'] == $cidade['id'] )
                        {
                              $newsTbl->update( array(
                                    'confirmado' => 1
                                        ), array(
                                    "{$newsTbl->getPkName()} = ?" => $id
                                        ) );

                              $this->redirect( '/newsletter/email-confirmado/' . $this->getRequest()->getParam( 'id' ) );
                        }
                        else
                        {
                              $this->redirect( '/newsletter/nao-confirmado/' . $this->getRequest()->getParam( 'id' ) );
                        }
                  }
                  else
                  {
                        $this->redirect( '/newsletter/nao-confirmado/' . $this->getRequest()->getParam( 'id' ) );
                  }
            }
            else
            {
                  $this->redirect( '/' );
            }
      }

      public function naoConfirmadoAction()
      {
            $id = base64_decode( $this->getRequest()->getParam( 'id' ) );

            
			session_start();
            
            if ( !isset( $id ) )
            {
                  $this->redirect( '/' );
            }

            $newsTbl = new Model_Newsletter_Table();
            $newsletter = $newsTbl->find( $id )->current();

            if ( !is_object( $newsletter ) )
            {
                  $this->redirect( '/' );
            }

            $newsletter->toArray();

			$_SESSION['msg']['title'] = 'Erro';
			$_SESSION['msg']['content'] = 'O E-mail ' . $newsletter['email']. ' não pôde ser confirmado';
            $this->redirect( '/' );
      }

      public function emailConfirmadoAction()
      {
            $id = base64_decode( $this->getRequest()->getParam( 'id' ) );

			session_start();
            
            if ( !isset( $id ) )
            {
                  $this->redirect( '/' );
            }

            $newsTbl = new Model_Newsletter_Table();
            $newsletter = $newsTbl->find( $id )->current();

            if ( !is_object( $newsletter ) )
            {
                  $this->redirect( '/' );
            }

            $newsletter->toArray();

			$_SESSION['msg']['title'] = 'Sucesso';
			$_SESSION['msg']['content'] = 'O E-mail ' . $newsletter['email']. ' foi confirmado com sucesso';
            $this->redirect( '/' );
      }
      
      public function visualizaAction(){
	    	$this->_helper->layout()->disableLayout();
	    	
	    	$id = base64_decode( $this->getRequest()->getParam( 'id' ) );

    		$select = $this->tbl_oferta->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('o'=>'oferta'), array('titulo'=>'o.titulo','preco_normal'=>'o.M_preco_normal','preco_oferta'=>'o.M_preco_oferta','fotos'=>'o.imagens','id_oferta'=>'o.id','id_cidade'=>'o.id_cidade'))
	        		   ->join(array('p'=>'parceiro'),'p.id = o.id_parceiro',array('nome_parceiro' => 'p.nome','sobre_parceiro'=>'p.sobre','rua'=>'p.rua','numero'=>'p.numero','complemento'=>'p.complemento','cep'=>'p.cep','bairro'=>'p.bairro','site'=>'p.site','telefone'=>'p.telefone'))
	        		   ->join(array('n'=>'newsletter'),'n.id_cidade = o.id_cidade',array())
	        		   ->where('o.id = '.$id)
					   ->limit(1)
	        		   ->query()
	        		   ->fetchAll();
	        		   
			$dados = $select[0];
			
			/* DADOS DA OFERTA */
			$id_oferta = $dados['id_oferta'];
			$cidade = $this->getCidadeById($dados['id_cidade']);
			$titulo = strip_tags($dados['titulo']);
			$preco_normal = Model_Util::stringToMoney( $dados['preco_normal'], false );
			$preco_oferta = Model_Util::stringToMoney( $dados['preco_oferta'], false );
			
			$images = explode(',',$dados['fotos']);
			$foto = $images[0];
			
			/* DADOS DO PARCEIRO DA OFERTA */
			$nome_parceiro = $dados['nome_parceiro'];
			$sobre_parceiro = strip_tags($dados['sobre_parceiro']);
			$rua = $dados['rua'];
			$numero = $dados['numero'];
			$complemento = (!empty($dados['complemento'])) ? $dados['complemento'] : '' ;
			$cep = $dados['cep'];
			$bairro = $dados['bairro'];
			$site = (!empty($dados['site'])) ? 'http://'.$dados['site'] : '' ;
			$telefone = $dados['telefone'];
	
    		echo '
								<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR">
								<head>
									<title>Compra na Cidade - Newsletter</title>
									<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
									<script type="text/javascript">
									</script>
								</head>
								<body>
									<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
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
									              <td colspan="2"><font size="2" face="Arial">'.$sobre_parceiro.'</font></td>
								                </tr>
									            <tr>
									              <td colspan="2">&nbsp;</td>
								                </tr>
								              </table></td>
									      </tr>
									    </table></td>
									  </tr>
									</table>
								</body>
								</html>
			';
      }

      public function cancelarAction(){
            $email = base64_decode( $this->getRequest()->getParam( 'email' ) );
			$this->tbl_newsletter->update( array( 'inscricao_cancelada' => 1 ), array( "email = ?" => $email) );
			$this->tbl_usuario->update( array( 'newsletter' => 0 ), array( "email = ?" => $email) );
			
			session_start();
			$_SESSION['msg']['title'] = 'Sucesso';
			$_SESSION['msg']['content'] = 'A sua inscri&ccedil;&atilde;o foi cancelada da nossa newsletter com sucesso!';
            $this->redirect( '/' );
            
      }
      
}