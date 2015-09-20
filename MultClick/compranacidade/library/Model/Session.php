<?php

class Model_Session extends Zend_Controller_Plugin_Abstract
{

      public function preDispatch( Zend_Controller_Request_Abstract $request )
      {
            if ( $request->getModuleName() != 'default' )
            {
                  if ( Zend_Auth::getInstance()->hasIdentity() )
                  {
                        date_default_timezone_set( 'America/Fortaleza' );

                        $auth = Zend_Auth::getInstance();
                        $expire = isset( $auth->getStorage()->read()->expire ) ? $auth->getStorage()->read()->expire : null;
                        $tempo_expiracao = 30 * 60; // 30 minutos

                        $hora_atual = date( 'Y-m-d H:i:s' );
                        
                        if ( is_null( $expire ) )
                        {
                              $auth->getStorage()->read()->expire = $hora_atual;
                              $hora_expira = strtotime( $auth->getStorage()->read()->expire ) + $tempo_expiracao;
                        }
                        else
                        {
                              $hora_expira = strtotime( $auth->getStorage()->read()->expire ) + $tempo_expiracao;
                        }


                        if ( strtotime( $hora_atual ) > $hora_expira )
                        {
                              Zend_Auth::getInstance()->getStorage()->read()->sessionTime = 'timeout';
                              echo 'Sua sess&atilde;o expirou! <a href="/admin/user/logout">Clique aqui</a> para logar de novo.';
                              exit;
//				  				header( "Location: http://".$_SERVER['SERVER_NAME']."/admin/user/logout" );
                        }
                        else
                        {
                              $auth->getStorage()->read()->expire = $hora_atual;
                        }
                  }
            }
      }

}
