<?php

class Sistema_UsuarioController extends Model_Modelo
{
	
	  private $tbl_usuario;
	  private $tbl_newsletter;
	  private $tbl_oferta;
	  
      public function init()
      {
      		$this->tbl_usuario = new Model_Usuario_Table();
      }

      public function indexAction()
      {
			$this->view->content = array('page_title' => 'Usu&aacute;rios');

	   		$select = $this->tbl_usuario->select()
	    				->setIntegrityCheck(false)
		       		   ->from(array('u'=>'usuario'), array('nome'=>'u.nome','email'=>'u.email','credito'=>'u.credito'))
		       		   ->join(array('c'=>'cidade'),'u.id_cidade = c.id',array('cidade'=>'nome'))
		       		   ->query()
		       		   ->fetchAll();
			
			$this->view->dados = $select;
      }

}