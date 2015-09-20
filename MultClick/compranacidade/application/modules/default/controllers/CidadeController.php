<?php

class CidadeController extends Model_Modelo
{

	private $cidades;
	
      public function init()
      {
      		$this->cidades = new Model_Cidade_Table();
      		
            $city = $this->getRequest()->getParam( 'cidade' );
           
            if ( $city && !$this->cidadeExists( $city ) )
            {
                  $this->redirect( "/cidade/natal" );
            }

            if ( !$city )
            {
            	
                  $cidadeUsuario = self::getCity() ? self::getCity() : 'natal';
                  
                  if ( !$this->cidadeExists( $cidadeUsuario ) )
                  {
                        $cidadeUsuario = 'natal';
                  }
                  if ( !Model_Access::isGuest() && self::isUsuarioComum() )
                  {
                        $cidade = $this->find( $this->cidades, $this->getStorage()->id_cidade );
                        $cidadeUsuario = strtolower( $cidade['nome'] );
                  }
                  $this->redirect( "/cidade/$cidadeUsuario" );
            }
      }

      public function indexAction()
      {
            $now = time();

            $cidade = $this->getCidadeByNome( $this->getRequest()->getParam( 'cidade' ) );
            extract($cidade);

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

            $ofertaDoDia = $this->fetchAll( $tbl, array(
                            'D_data_inicio <= ?' => $now,
                            'D_data_fim >= ?' => $now,
                            'id_cidade = ?' => $id,
            				'status <> ?' => 'Inativo'
                                ),
								'id DESC' );

			$tbl_pedido = new Model_Pedido_Table();
			
			if($ofertaDoDia){
				
				if($id_usuario){                     
		            $pedido_usuario = $this->fetchAll( $tbl_pedido, array(
		                            'id_oferta = ?' => $ofertaDoDia[0]['id'],
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
										'id <> ?' => $ofertaDoDia[0]['id'],
	            						'status <> ?' => 'Inativo'
									),
									'id DESC', 3
								);	

                  $ofertaDoDia = $ofertaDoDia[0];

				  $ofertaDoDia['imagens'] = explode(',',$ofertaDoDia['imagens']);
				  
                  $economia = $ofertaDoDia['M_preco_normal'] - $ofertaDoDia['M_preco_oferta'];
                  $off = 100 * $economia / $ofertaDoDia['M_preco_normal'];
                  $ofertaDoDia['off'] = $this->getOff( $off ) . '%';

                  $ofertaDoDia['economia'] = Model_Util::stringToMoney( $this->getMoney( $economia ) );
                  $ofertaDoDia['M_preco_normal'] = Model_Util::stringToMoney( $ofertaDoDia['M_preco_normal'], false );
                  $ofertaDoDia['M_preco_oferta'] = Model_Util::stringToMoney( $ofertaDoDia['M_preco_oferta'], false );

                  $ofertaDoDia['horas'] = date( 'H', $ofertaDoDia['D_data_fim'] );
                  $ofertaDoDia['minutos'] = date( 'i', $ofertaDoDia['D_data_fim'] );
                  $ofertaDoDia['segundos'] = date( 's', $ofertaDoDia['D_data_fim'] );

                  $parceiro = $this->find( new Model_Parceiro_Table(), $ofertaDoDia['id_parceiro'] );

                  $this->view->parceiro = $parceiro;
                  $this->view->ofertaDia = $ofertaDoDia;

                  
                  /* VOTE NA OFERTA: */
                  
				$tbl_votacao = new Model_Votacao_Table();
				$total_participantes = $tbl_votacao->select()
										->from(array('votacao'), array('count(*) as total'))
										->where('id_oferta = '.$ofertaDoDia['id'])
										->query()
										->fetchAll();
				$qtd_total = $total_participantes[0]['total'];
										
				$qtd = array();
				for($i = 1; $i <= 5; $i++){
					$select = $tbl_votacao->select()
								->from(array('votacao'), array('count(*) as total'))
								->where('id_oferta = '.$ofertaDoDia['id'])
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
				

                  
			} else {
				$ofertasBonus = array();
				$pedido = 0;
			}
            	
			$this->view->ofertasBonus = $ofertasBonus;
			$this->view->cidade = $nome;
					
      }

}