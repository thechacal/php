<?php

class Sistema_RelatoriosController extends Model_Modelo
{

	  private $tbl_pedido;
	
      public function init()
      {
      		$this->tbl_pedido = new Model_Pedido_Table();
      }

      public function indexAction(){
			$this->view->content = array('page_title' => 'Administrando Relat&oacute;rios');

	        $select = $this->tbl_pedido->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('p'=>'pedido'), array('count(*) as total','id_oferta'))
	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('titulo' => 'o.titulo', 'id_cidade' => 'o.id_cidade', 'status' => 'o.status', 'id' => 'o.id'))
		       		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
	        		   ->group('p.id_oferta')
					   ->order(array('p.id_oferta DESC'))
	        		   ->query()
	        		   ->fetchAll();

			$dados = array();
			foreach($select as $value){
				
				if($value['id_cidade'])
					$cidade = $this->getCidadeById($value['id_cidade']);
					
				$dados2 = array(
					'id' => $value['id'],
					'titulo' => strip_tags($value['titulo']),
					'cidade' => $cidade['nome'],
					'total' => $value['total'],
					'status' => $value['status'],
					'id_oferta' => $value['id_oferta']
				);

				$dados[] = $dados2;
			}
			
			$this->view->dados = $dados;
        
      }
      
}