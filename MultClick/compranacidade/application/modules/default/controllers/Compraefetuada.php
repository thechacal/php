<?php

class CompraefetuadaController extends Model_Modelo
{

    public function init()
    {
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer->setNoRender();

        // Skipping the templates
        Zend_Layout::getMvcInstance()->disableLayout();
    }

    public function indexAction()
    {
    }

}