<?php

class Model_Access extends Zend_Controller_Plugin_Abstract
{

      public function preDispatch( Zend_Controller_Request_Abstract $request )
      {
            if ( $request->getModuleName() != 'default' )
            {
                  $this->expelGuestUser()
                            ->checkRoleAccess();
            }
      }

      /**
       * Checa se o usuário tem permissao para acessar o recurso
       */
      private function checkRoleAccess()
      {
            $tipoUsuario = strtolower( Zend_Auth::getInstance()->getStorage()->read()->tipo_usuario );

            if ( $tipoUsuario == 'admin' )
            {
                  $login = Zend_Auth::getInstance()->getStorage()->read()->login;
            }
            elseif ( $tipoUsuario == 'cliente' )
            {
                  $login = Zend_Auth::getInstance()->getStorage()->read()->email;
            }

            $module = $this->_request->getModuleName();
            $controller = $this->_request->getControllerName();
            $action = $this->_request->getActionName();

            $tipoUsuario .= '_role';
            $isUserAllowed = $this->getUserPermissions( $login, $tipoUsuario )
                                ->isAllowed( $login, $module, $action );

            if ( !$isUserAllowed )
            {
                  echo '<div>Voc&ecirc; n&atilde;o tem permiss&atilde;o a acessar essa p&aacute;gina</div>';
                  echo '<div><a href="' . $this->baseUrl('/') . '">Voltar</a></div>';
                  die;
            }

            return $this;
      }

      /**
       * Envia mensagem para os usuarios que nao estao logado
       */
      private function expelGuestUser()
      {
            if ( self::isGuest() )
            {
                  echo 'P&aacute;gina n&atilde;o encontrada';
                  die;
            }

            return $this;
      }

      /**
       * Verifica se esta logado
       */
      public static function isGuest()
      {
            return !isset( Zend_Auth::getInstance()->getStorage()->read()->tipo_usuario );
//            return !Zend_Auth::getInstance()->hasIdentity();
      }

      /**
       * Define as permissões de cada tipo de usuario
       *
       * @return Zend_Acl
       */
      private function getDefinedAccessRoles()
      {
            $acl = new Zend_Acl();

            $acl->addRole( new Zend_Acl_Role( 'parceiro_role' ) )
                      ->addRole( new Zend_Acl_Role( 'admin_role' ) )
                      ->addRole( new Zend_Acl_Role( 'cliente_role' ) );

            $acl->add( new Zend_Acl_Resource( 'parceiro' ) )
                      ->add( new Zend_Acl_Resource( 'sistema' ) )
                      ->add( new Zend_Acl_Resource( 'conta' ) );

            $acl->allow( 'admin_role', 'sistema' )
                      ->allow( 'parceiro_role', 'parceiro' )
                      ->allow( 'cliente_role', 'conta' );

            return $acl;
      }

      /**
       *
       * @param String $login
       * @param String $tipoUsuario
       * @return retorna se o usuario tem permissao para acessar o recurso
       */
      private function getUserPermissions( $login, $tipoUsuario )
      {
            return $this->getDefinedAccessRoles()->addRole( $login, $tipoUsuario );
      }

}