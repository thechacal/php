<?php

class OfertaController extends Model_Modelo
{

	private $cidades;
	
      public function init()
      {
			$this->cidades = new Model_Cidade_Table();
      }

      public function indexAction()
      {
            $now = time();

            $id_oferta = $this->getRequest()->getParam( 'cidade' );
            
            $cidade = $this->getCidadeByNome( $this->getRequest()->getParam( 'cidade' ) );
            extract($cidade);
            
            $id_oferta = $this->getRequest()->getParam( 'id' );
            
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = $nome;
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() ){
				$id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
				$layout->id_usuario = $id_usuario;
            }
				
			$tbl = new Model_Oferta_Table();

			$oferta = $this->fetchAll( $tbl,
	            				array(
									'id = ?' => $id_oferta,
								)
							);
							
			$tbl_pedido = new Model_Pedido_Table();
			
      		if($id_usuario){
				$pedido_usuario = $this->fetchAll( $tbl_pedido, array(
		            'id_oferta = ?' => $oferta[0]['id'],
					'id_usuario = ?' => $id_usuario,
					'status <> ?' => 3
				));
				$this->view->qtd_cupom = count($pedido_usuario);
			}

            $ofertasBonus = $this->fetchAll( $tbl,
	            				array(
	                            	'D_data_inicio <= ?' => $now,
	                            	'D_data_fim >= ?' => $now,
	                            	'id_cidade = ?' => $id,
									'id <> ?' => $id_oferta,
            						'status <> ?' => 'Inativo'
								),
								'id DESC', 3
							);
							
            if ( $oferta )
            {
                  $oferta = $oferta[0];

				  $oferta['imagens'] = explode(',',$oferta['imagens']);
				  
                  $economia = $oferta['M_preco_normal'] - $oferta['M_preco_oferta'];
                  $off = 100 * $economia / $oferta['M_preco_normal'];
                  $oferta['off'] = $this->getOff( $off ) . '%';

                  $oferta['economia'] = Model_Util::stringToMoney( $this->getMoney( $economia ) );
                  $oferta['M_preco_normal'] = Model_Util::stringToMoney( $oferta['M_preco_normal'], false );
                  $oferta['M_preco_oferta'] = Model_Util::stringToMoney( $oferta['M_preco_oferta'], false );

                  $oferta['horas'] = date( 'H', $oferta['D_data_fim'] );
                  $oferta['minutos'] = date( 'i', $oferta['D_data_fim'] );
                  $oferta['segundos'] = date( 's', $oferta['D_data_fim'] );
                  
                  $parceiro = $this->find( new Model_Parceiro_Table(), $oferta['id_parceiro'] );

                  $this->view->parceiro = $parceiro;
                  $this->view->ofertaDia = $oferta;
                  
                  
                  /* VOTE NA OFERTA: */
                  
				$tbl_votacao = new Model_Votacao_Table();
				$total_participantes = $tbl_votacao->select()
										->from(array('votacao'), array('count(*) as total'))
										->where('id_oferta = '.$oferta['id'])
										->query()
										->fetchAll();
				$qtd_total = $total_participantes[0]['total'];
										
				$qtd = array();
				for($i = 1; $i <= 5; $i++){
					$select = $tbl_votacao->select()
								->from(array('votacao'), array('count(*) as total'))
								->where('id_oferta = '.$oferta['id'])
								->where('categoria = '.$i)
								->query()
								->fetchAll();
								
					$qtd_categoria = $select[0]['total'];
					@$porcentagem = ($qtd_categoria*100) / $qtd_total;
					$qtd[$i] = array('categoria'=>$i, 'qtd_categoria'=> $qtd_categoria, 'porcentagem' => $porcentagem);
				}
				
				// Busca o elemento máximo
    			$arr_ordenado = array();
    			$numero_max = $qtd[0]['qtd_categoria'];
    			for ($i = 1; $i <= 5; $i++)
        			if ($qtd[$i]['qtd_categoria'] > $numero_max){
        				$numero_max = $qtd[$i]['qtd_categoria'];
        				$arr_ordenado = $qtd[$i];
        			}
				
				$this->view->votacao = $arr_ordenado;
				$this->view->votacao_total = $qtd_total;
                  
            }
            	
			$this->view->ofertasBonus = $ofertasBonus;
			$this->view->cidade = $nome;
      }

}