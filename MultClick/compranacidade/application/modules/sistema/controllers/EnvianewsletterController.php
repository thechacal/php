<?php

class Sistema_EnvianewsletterController extends Model_Modelo
{

	private $tbl_pedido;
	
    public function init()
    {
		$this->tbl_pedido = new Model_Pedido_Table();
    }

    public function indexAction()
    {
    	$this->_helper->layout()->disableLayout();
    	
//	        $select = $this->tbl_pedido->select()
//	        		   ->setIntegrityCheck(false)
//	        		   ->from(array('p'=>'pedido'), array('count(*) as total'))
//	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('minimo_compradores' => 'o.minimo_compradores'))
//	        		   ->where('p.id_oferta = '.$id_oferta)
//	        		   ->group('p.id_oferta')
//	        		   ->query()
//	        		   ->fetchAll();
//		
//		        $select2 = $this->tbl_pedido->select()
//        		   ->setIntegrityCheck(false)
//        		   ->from(array('p'=>'pedido'), array())
//        		   ->join(array('u'=>'usuario'),'u.id = p.id_usuario',array('email' => 'u.email'))
//        		   ->where('p.id_oferta = '.$id_oferta)
//				   ->order(array('p.id DESC'))
//        		   ->query()
//        		   ->fetchAll();
		
//				$i = 0;
//				foreach($select2 as $value){

    				$email = "johny21@gmail.com";
    	
    				$conteudo = '
											<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
											  <tr>
											    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
											  </tr>
											  <tr>
											    <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
											      <tr>
											        <td><p><font face="Arial" size="5"><strong>Título da oferta</strong></font></p>
											          <table width="100%" border="0" cellspacing="0" cellpadding="0">
											            <tr>
											              <td width="241"><table width="241" border="0" cellspacing="0" cellpadding="0" height="203">
											                <tr>
											                  <td valign="top" background="http://compranacidade.com.br/public/css/images/balao.jpg">
											                    <table width="95%" border="0" cellspacing="10" cellpadding="0">
											                    <tr>
											                      <td><p align="center"><font color="#FFFFFF" size="5" face="Arial"><b>de R$625</b></font><br />
										                          <font color="#FED000" size="6" face="Arial"><b>por R$185</b></font></p></td>
										                        </tr>
											                    <tr>
											                      <td align="center"><a href="#"><img src="http://compranacidade.com.br/public/css/images/bt_visitenos.png" border="0" /></a></td>
											                      </tr>
									                          </table>                                                             
                                                              </td>
										                    </tr>
										                  </table>
                                                              <br/>                                                             
                                                                <p><font color="#000000" size="3" face="Arial"><strong>Clínica Corpore e Saúde</strong></font></p>
                                                                <p><font color="#000000" size="2" face="Arial">R. Desembargador Trindade, 147<br/>
                                                                CENTRO - Telefone: 3322.4326</font></p>
                                                          </td>
											              <td valign="top"><img src="http://compranacidade.com.br/public/css/images/foto_principal.gif" width="340" /></td>
										                </tr>
											            <tr>
											              <td colspan="2">&nbsp;</td>
										                </tr>
											            <tr>
											              <td colspan="2">&nbsp;</td>
										                </tr>
										              </table></td>
											      </tr>
											    </table></td>
											  </tr>
											</table>
					';
    				
					$mail = new Model_PHPMailer();
					$mail->IsSMTP(); // mandar via SMTP
					$mail->Host = "smtp.googlemail.com"; // Seu servidor SMTP
					$mail->SMTPAuth = true; // Habilita a autenticação via SMTP
					$mail->Username = "jonata.marcelino@multclick.com.br"; // usuário deste servidor SMTP
					$mail->Password = "j0n4t41983"; // senha deste servidor SMTP
					$mail->From = "compranacidade@multclick.com.br"; // Remetente
				    $mail->FromName = "Site Compra na Cidade";
					$mail->isHTML(true);
				    $mail->AddAddress("$email");
				    $mail->Subject = "Compra na Cidade - Newsletter";
				   	$mail->Body = $conteudo;
				    $mail->Send();
						
//					$mail = new Model_PHPMailer();
//					$mail->IsSMTP(); // mandar via SMTP
//					$mail->From = "contato@compranacidade.com.br"; // Remetente
//				    $mail->FromName = "Site Compra na Cidade";
//					$mail->isHTML(true);
//				    $mail->AddAddress($value['email']);
//				    $mail->Subject = "Compra na Cidade - Cupom de compra";
//				   	$mail->Body = $conteudo;
//				    $mail->Send();
			    
//			    		if($i == 9){
//			    			$i = 0;
//			    			sleep(10);
//			    		} else
//							$i++;
//				}
			
    	session_start();
    
    	$_SESSION['msg']['content'] = 'O envio da newsletter foi enviado para os usu&aacute;rios com sucesso!';
    	$_SESSION['msg']['title'] = 'Sucesso!'; 
	
    	$this->_redirect('/sistema/newsletter');
    
    }

}

