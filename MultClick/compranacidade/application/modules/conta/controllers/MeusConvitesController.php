<?php

class Conta_MeusConvitesController extends Model_Modelo
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
            
            $this->view->titulo = "Meus Convites";
      	
            $idUsuario = $this->getStorage()->id;
            $convites = $this->fetchAll( new Model_Convite_Table(), array( 'id_usuario = ? ' => $idUsuario ) );
            $this->view->convites = $convites;
      }

}