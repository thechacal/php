<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
      /**
       * Titulo da pagina atual
       * @var string
       */
      static $title = '';

      protected function _initAutoLoader()
      {
            Zend_Loader_Autoloader::getInstance()
                      ->registerNamespace( 'Forms' )
                      ->registerNamespace( 'Model' );
      }

      protected function _initLayout()
      {
            Zend_Controller_Front::getInstance()
                      ->registerPlugin( new Model_Layout() )
                      ->registerPlugin( new Model_Session() )
                      ->registerPlugin( new Model_Translate() )
                      ->registerPlugin( new Model_Access() );
      }

      /**
       * Função faz a conexão com o banco de dados e registra a variável $db para
       * que ela esteja disponível em toda a aplicação.
       */
      protected function _initConnection()
      {
            /**
             * Obtém os resources(recursos).
             */
            $options = $this->getOption( 'resources' );
            $db_adapter = $options['db']['adapter'];
            $params = $options['db']['params'];

            try
            {
                  /**
                   * Este método carrega dinamicamente a classe adptadora
                   * usando Zend_Loader::loadClass().
                   */
                  $db = Zend_Db::factory( $db_adapter, $params );

                  /**
                   * Este método retorna um objeto para a conexão representada por uma
                   * respectiva extensão de banco de dados.
                   */
                  $db->getConnection();

                  // Registra a $db para que se torne acessível em toda app
                  $registry = Zend_Registry::getInstance();
                  $registry->set( 'db', $db );
                  Zend_Db_Table_Abstract::setDefaultAdapter( $db );
            }
            catch ( Zend_Exception $e )
            {
                  echo "Estamos sem conexão com o banco de dados neste momento. Tente mais tarde por favor.";
                  exit;
            }
      }

      protected function _initRouter()
      {
            $router = new Zend_Controller_Router_Rewrite();


            $router->addRoute(
                      'indexx',
                      new Zend_Controller_Router_Route( '/resgatarsenha/:tipo',
                                array(
                                      'module' => 'default',
                                      'controller' => 'resgatarsenha',
                                      'action' => 'index'
                                ) )
            )->addRoute(
                      'indexv',
                      new Zend_Controller_Router_Route( '/sharefacebook/:cidade/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'index',
                                      'action' => 'sharefacebook'
                                ) )
            )->addRoute(
                      'indexu',
                      new Zend_Controller_Router_Route( '/compra/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'compra',
                                      'action' => 'index'
                                ) )
            )->addRoute(
                      'indext',
                      new Zend_Controller_Router_Route( '/compra/confirmada/:id_oferta',
                                array(
                                      'module' => 'default',
                                      'controller' => 'compra',
                                      'action' => 'confirmada'
                                ) )
            )->addRoute(
                      'indexs',
                      new Zend_Controller_Router_Route( '/compra/finalizada',
                                array(
                                      'module' => 'default',
                                      'controller' => 'compra',
                                      'action' => 'finalizada'
                                ) )
            )->addRoute(
                      'indexr',
                      new Zend_Controller_Router_Route( '/:cidade/oferta/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'oferta',
                                      'action' => 'index'                                
                                ) )
            )->addRoute(
                      'indexq',
                      new Zend_Controller_Router_Route( '/comprasrecentes/:cidade/:page',
                                array(
                                      'module' => 'default',
                                      'controller' => 'comprasrecentes',
                                      'action' => 'index',
                                	  'page' => ':page'
                                ) )
            )->addRoute(
                      'indexp',
                      new Zend_Controller_Router_Route( '/minhaconta/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'minhaconta',
                                      'action' => 'index'
                                ) )
            )->addRoute(
                      'indexo',
                      new Zend_Controller_Router_Route( '/logar/:produto',
                                array(
                                      'module' => 'default',
                                      'controller' => 'logar',
                                      'action' => 'index'
                                ) )
            )->addRoute(
                      'indexn',
                      new Zend_Controller_Router_Route( '/conta/meus-cupons/detalhes/:id_transacao',
                                array(
                                      'module' => 'conta',
                                      'controller' => 'MeusCupons',
                                      'action' => 'detalhes'
                                ) )
            )->addRoute(
                      'indexm',
                      new Zend_Controller_Router_Route( '/convite/:id/cadastro',
                                array(
                                      'module' => 'default',
                                      'controller' => 'convite',
                                      'action' => 'cadastro'
                                ) )
            )->addRoute(
                      'indexl',
                      new Zend_Controller_Router_Route( '/convite/:link',
                                array(
                                      'module' => 'default',
                                      'controller' => 'convite',
                                      'action' => 'index'
                                ) )
            )->addRoute(
                      'indexk',
                      new Zend_Controller_Router_Route( '/newsletter/confirmar/:id/:email/:cidade',
                                array(
                                      'module' => 'default',
                                      'controller' => 'newsletter',
                                      'action' => 'confirmar'
                                ) )
            )->addRoute(
                      'indexj',
                      new Zend_Controller_Router_Route( '/newsletter/nao-confirmado/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'newsletter',
                                      'action' => 'nao-confirmado'
                                ) )
            )->addRoute(
                      'indexi',
                      new Zend_Controller_Router_Route( '/newsletter/email-confirmado/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'newsletter',
                                      'action' => 'email-confirmado'
                                ) )
            )->addRoute(
                      'indexh',
                      new Zend_Controller_Router_Route( '/sistema/oferta/deletar/',
                                array(
                                      'module' => 'sistema',
                                      'controller' => 'oferta',
                                      'action' => 'deletar'
                                ) )
            )->addRoute(
                      'indexg',
                      new Zend_Controller_Router_Route( '/sistema/oferta/editar/',
                                array(
                                      'module' => 'sistema',
                                      'controller' => 'oferta',
                                      'action' => 'editar'
                                ) )
            )->addRoute(
                      'indexf',
                      new Zend_Controller_Router_Route( '/sistema/oferta/cadastrar/',
                                array(
                                      'module' => 'sistema',
                                      'controller' => 'oferta',
                                      'action' => 'cadastrar'
                                ) )
            )->addRoute(
                      'indexe',
                      new Zend_Controller_Router_Route( '/newsletter/visualiza/:id',
                                array(
                                      'module' => 'default',
                                      'controller' => 'newsletter',
                                      'action' => 'visualiza'
                                ) )
            )->addRoute(
                      'indexd',
                      new Zend_Controller_Router_Route( '/newsletter/cancelar/:email',
                                array(
                                      'module' => 'default',
                                      'controller' => 'newsletter',
                                      'action' => 'cancelar'
                                ) )
            )->addRoute(
                      'indexc',
                      new Zend_Controller_Router_Route( '/ofertas/:action/:produto',
                                array(
                                      'module' => 'default',
                                      'controller' => 'ofertas',
                                      'action' => 'comprar'
                                ) )
            )->addRoute(
                      'indexb',
                      new Zend_Controller_Router_Route( '/cidade/:cidade/:controller/:action',
                                array(
                                      'module' => 'default',
                                      'controller' => 'ofertas',
                                      'action' => 'recentes'
                                ) )
            )->addRoute(
                      'indexa',
                      new Zend_Controller_Router_Route( '/cidade/:cidade',
                                array(
                                      'module' => 'default',
                                      'controller' => 'cidade',
                                      'action' => 'index'
                                ) )
            );

            Zend_Controller_Front::getInstance()->setRouter( $router );
      }

}