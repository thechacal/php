<?php

class ResgatarsenhaController extends Model_Modelo
{

    private $tbl;
    private $tbl_administrador;
	private $cidades;
	private $form;
	private $tipo;
	
    public function init()
    {
            $this->tbl = new Model_Usuario_Table();
            $this->tbl_administrador = new Model_Administrador_Table();
            $this->cidades = new Model_Cidade_Table();
            
            $this->tipo = $this->getRequest()->getParam( 'tipo' );
            if($this->tipo){
				$this->form = new Model_Administrador_ResgatarSenha();
				$this->view->descricao = 'Caro administrador, digite o seu login e e-mail para que possamos enviar uma nova senha atrav&eacute;s do seu endere&ccedil;o de e-mail:';
            } else {
				$this->form = new Model_Usuario_ResgatarSenha();
				$this->view->descricao = 'Caro usu&aacute;rio, digite o seu CPF e e-mail para que possamos enviar uma nova senha atrav&eacute;s do seu endere&ccedil;o de e-mail:';
            }
            
    }

    public function indexAction()
    {
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Esqueci a Senha";
            
    		$data = $this->_request->getPost();
	
	        if ( $this->_request->isPost() && $this->form->isValid( $data ) )
	        {
	
	        		if(!$this->tipo){
						$select = $this->fetchAll( $this->tbl,
		            				array(
										'cpf = ?' => $data['cpf'],
		            					'email = ?' => $data['email']
									)
								);	        			
	        		} else {
						$select = $this->fetchAll( $this->tbl_administrador,
		            				array(
										'login = ?' => $data['login'],
		            					'email = ?' => $data['email']
									)
								);
	        		}
	        	
			    	session_start();
							
					if(count($select) > 0){
						
						$senha = $this->senhaAleatoria();
						
						$msg = ($this->tipo) ? 'Para alterar a sua senha, entre na conta do administrador no Compra na Cidade com a nova senha e altere em Mudar Senha.' : 'Para alterar a sua senha, entre na sua conta no Compra na Cidade com a nova senha e altere em Meus Dados.' ;
						
						$conteudo = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
						    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
						  </tr>
						  <tr>
						    <td>
						    	<table width="100%" border="0" cellspacing="0" cellpadding="10">
						      		<tr>
						        		<td>
						        			<p><font face="Arial" size="5"><strong>Sua Senha</strong></font></p>
						          			<p>
						          				<font face="Arial" size="3">A nova senha gerada é: <strong>'.$senha.'</strong></font><br/><br/>
						          				<font face="Arial" size="3">'.$msg.'</font>
						          			</p>
										</td>
									</tr>
								</table>
						    </td>
						  </tr>
						</table>';
						
						if(!$this->tipo){
		                  	$this->tbl->update( array(
		                    	'senha' => sha1($senha),
		                            ), array(
		                        'id=?' => $select[0]['id']
							) );
						} else {
		                  	$this->tbl_administrador->update( array(
		                    	'senha' => sha1($senha),
		                            ), array(
		                        'id=?' => $select[0]['id']
							) );
						}
						
						
						$mail = new Model_PHPMailer();
						$mail->IsSMTP(); // mandar via SMTP
						$mail->From = "contato@compranacidade.com.br"; // Remetente
					    $mail->FromName = "Site Compra na Cidade";
						$mail->isHTML(true);
					    $mail->AddAddress($select[0]['email']);
					    $mail->Subject = "Compra na Cidade - Sua Senha";
					   	$mail->Body = $conteudo;
					    $mail->Send();
						
				    	$_SESSION['msg']['content'] = 'A sua senha foi enviada para o seu e-mail!';
				    	$_SESSION['msg']['title'] = 'Sucesso!';						
					} else {
				    	$_SESSION['msg']['content'] = 'N&atilde;o conseguimos localizar os dados de sua conta!';
				    	$_SESSION['msg']['title'] = 'Erro!';
					}
		        		   
	        }            
            
            $this->view->form = $this->form;
    }

}

