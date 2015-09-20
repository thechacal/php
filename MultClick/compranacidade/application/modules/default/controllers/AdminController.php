<?php

class AdminController extends Model_Modelo
{
      private $form;
	  private $cidades;
	
      public function init()
      {
            $this->form = new Forms_LoginAdmin();
    		$this->cidades = new Model_Cidade_Table();
      }

      public function indexAction()
      {
            $this->redirect( '/admin/login' );
      }

      public function loginAction()
      {

			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Área Restrita";
      	
            if ( !Model_Access::isGuest() && self::isAdmin() )
            {
                  $this->redirect( '/sistema/' );
            }

            if ( $this->isPost() && $this->form->isValid( $this->getPost() ) )
            {
            	
                  $data = $this->getPost();
                  $auth = Zend_Auth::getInstance();

                  $auth_adapter = new Zend_Auth_Adapter_DbTable(
                                      Zend_Registry::get( 'db' ),
                                      'admin',
                                      'login',
                                      'senha'
                  );

                  $auth_adapter->setIdentity( $data['username'] )
                            ->setCredential( sha1( $data['password'] ) );

                  $result = $auth->authenticate( $auth_adapter );
                  if ( $result->isValid() )
                  {
                        $authData = $auth_adapter->getResultRowObject( null, 'senha' );

                        $auth->getStorage()->write( $authData );

                        $this->_redirect( '/' );
                  }
                  else
                  {
                        $_SESSION['msg']['title'] = 'Erro';
                        $_SESSION['msg']['content'] = 'Login e/ou senha inválidos';
                  }
            }

            $this->view->form = $this->form;
      }

}