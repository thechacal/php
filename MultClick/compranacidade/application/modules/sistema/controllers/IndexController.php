<?php

class Sistema_IndexController extends Model_Modelo
{
	
	private $tbl_pedido;

      public function init()
      {
      		$this->tbl_pedido = new Model_Pedido_Table();
      }

      public function indexAction()
      {

      }

}