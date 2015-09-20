<?php

class Sistema_MudarsenhaController extends Model_Modelo
{
	
	  private $form_mudarsenha;
	  private $tbl_administrador;
	
      public function init()
      {
      		$this->form_mudarsenha = new Model_Administrador_Mudarsenha();
      		$this->tbl_administrador = new Model_Administrador_Table();
      }

      public function indexAction()
      {
			$this->view->content = array('page_title' => 'Mudar Senha');
			
      		$usuario = Zend_Auth::getInstance()->getIdentity();
			$this->view->usuario = $usuario;
			
			$data = $this->_request->getPost();
	
	        if ( $this->_request->isPost() && $this->form_mudarsenha->isValid( $data ) )
	        {
                  	$this->tbl_administrador->update( array(
                    	'senha' => sha1($data['senha']),
                            ), array(
                        'id=?' => $usuario->id
					) );
					
			    	session_start();
			    
			    	$_SESSION['msg']['content'] = 'A senha foi alterada com sucesso! No pr&oacute;ximo login entre com a senha nova.';
			    	$_SESSION['msg']['title'] = 'Sucesso!';
	        }

	        $this->view->form = $this->form_mudarsenha;
	        
      }

}