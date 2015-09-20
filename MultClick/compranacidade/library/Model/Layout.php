<?php

class Model_Layout extends Zend_Controller_Plugin_Abstract
{

      public function preDispatch( Zend_Controller_Request_Abstract $request )
      {
            $layout = Zend_Layout::startMvc();

            $layout->setLayoutPath( APPLICATION_PATH . '/layouts/' );
            if ( $request->getModuleName() == 'sistema' )
                  $layout->setLayout( 'sistema' );
            else
                  $layout->setLayout( 'site' );
      }

}
