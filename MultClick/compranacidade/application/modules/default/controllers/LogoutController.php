<?php

class LogoutController extends Model_Modelo
{

      public function init()
      {
            
      }

      public function indexAction()
      {
            Zend_Auth::getInstance()->clearIdentity();
            $this->redirect( '/' );
      }


}