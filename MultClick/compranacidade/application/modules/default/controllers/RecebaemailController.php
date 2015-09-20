<?php

class RecebaemailController extends Model_Modelo
{

	private $cidades;
	
    public function init()
    {
            $this->cidades = new Model_Cidade_Table();
    }

    public function indexAction()
    {
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Receba E-mail Diário";
            
            $this->view->cidades_internas = $this->getFieldsFromTable($this->cidades,'nome');
    }

}
