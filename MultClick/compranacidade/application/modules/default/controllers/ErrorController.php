<?php

class ErrorController extends Model_Modelo
{

    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable(new Model_Cidade_Table,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
        
        switch ($errors->type) { 
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        
                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->title = 'Oops! Essa página não existe.';
                $this->view->message = 'Para conseguir chegar até o seu destino final, escolha a sua cidade<br/>
                na lista abaixo, ou entre em contato conosco para relatar um possível problema. ';
                
            	$this->view->cidades = $this->getFieldsFromTable(new Model_Cidade_Table,'nome');
                
                break;
            default:
                // application error 
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->title = 'Erro de Aplicação';
                $this->view->message = 'Para conseguir chegar até o seu destino final, escolha a sua cidade<br/>
                na lista abaixo, ou entre em contato conosco para relatar um possível problema. ';
                
            	$this->view->cidades = $this->getFieldsFromTable(new Model_Cidade_Table,'nome');
                
                break;
        }
        
        $this->view->exception = $errors->exception;
        $this->view->request   = $errors->request;
    }


}

