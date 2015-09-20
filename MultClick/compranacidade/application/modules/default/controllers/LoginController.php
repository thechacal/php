<?php

class LoginController extends Model_Modelo
{

      public function init()
      {
      }

      public function indexAction()
      {
            if ( !Model_Access::isGuest() && self::isUsuarioComum() )
            {
                  $this->redirect( '/' );
            }
            if ( $this->isPost() )
            {
                  $data = $this->getPost();
                  
                  $auth = Zend_Auth::getInstance();

                  $auth_adapter = new Zend_Auth_Adapter_DbTable(
                                      Zend_Registry::get( 'db' ),
                                      'usuario',
                                      'email',
                                      'senha'
                  );

                  $auth_adapter->setIdentity( $data['mail'] )
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
                        $_SESSION['msg']['content'] = 'Login e/ou senha inv&aacute;lidos!';
                  		$this->redirect( '/' );
                  		
                  }
            }

      }

}