<?php

class VotacaoController extends Model_Modelo
{

	private $tbl_votacao;
	
    public function init()
    {
		$this->tbl_votacao = new Model_Votacao_Table();
    }

    public function indexAction()
    {
    	$this->_helper->layout()->disableLayout();
    	
    	$ip = $_SERVER['REMOTE_ADDR'];
		$p = $this->getPost();
		extract($p);

		$select = $this->tbl_votacao->select()
					->from(array('votacao'), array('count(*) as total'))
					->where('ip = "'.$ip.'"')
					->where('id_oferta = '.$id_oferta)
					->query()
					->fetchAll();

		if($select[0]['total'] == 0){
			$this->tbl_votacao->insert( array(
	        	'id_oferta' => $id_oferta,
	            'categoria' => $categoria,
	            'ip' => $ip
			) );			
		} else {
			echo 'Seu voto j&aacute; foi computado para esta oferta!';
		}
		
    }

}

