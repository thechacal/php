<?php

class IndexController extends Model_Modelo
{

    public function init()
    {
    }

    public function indexAction()
    {
		$this->redirect('/cidade/');
    }
    
    public function sharefacebookAction()
    {
    	$this->_helper->layout()->disableLayout();
    	$id = $this->getRequest()->getParam( 'id' );
    	$cidade = $this->getRequest()->getParam( 'cidade' );
    	
    	$tbl_oferta = new Model_Oferta_Table();
    	
		$oferta = $this->fetchAll( $tbl_oferta,
	    	array(
				'id = ?' => $id,
			)
		);
		
		$dados = $oferta[0];
		$this->view->titulo = 'Compra na Cidade';
		$this->view->descricao = strip_tags($dados['titulo']);
		
		$foto = explode(',',$dados['imagens']);
		$this->view->foto = 'http://' . $_SERVER['SERVER_NAME'] . '/uploads/' . $foto[0];
		
		$this->view->id = $id;
		$this->view->cidade = $cidade;
    }

}

