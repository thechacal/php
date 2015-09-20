<?php

class Conta_MeusCreditosController extends Model_Modelo
{

      public function init()
      {
            
      }

      public function indexAction()
      {
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable(new Model_Cidade_Table(),'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Meus Cr&eacute;ditos";
      	
            $usuario = $this->find( new Model_Usuario_Table(), $this->getStorage()->id );

            $this->view->creditos = 'R$ '.Model_Util::stringToMoney( $usuario['credito'], true );
            
      }

}