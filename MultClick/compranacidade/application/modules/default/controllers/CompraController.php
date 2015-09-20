<?php

class CompraController extends Model_Modelo
{

	private $cidades;
	private $pedido;
	private $oferta;
	private $convite;
	private $usuario;
	private $credito;
	private $id_usuario;
	
    public function init()
    {
    	$this->cidades = new Model_Cidade_Table();
		$this->pedido = new Model_Pedido_Table();
		$this->oferta = new Model_Oferta_Table();
		$this->convite = new Model_Convite_Table();
		$this->usuario = new Model_Usuario_Table();
		$this->credito = new Model_Credito_Table();

		$this->id_usuario = new Zend_Session_Namespace();
		
		if (!isset($this->id_usuario->id)){
			$this->id_usuario->id = Zend_Auth::getInstance()->getIdentity()->id;
		}
		
//		session_start();
		
		//if(!$_SESSION['1dus3r']){
			//$_SESSION['1dus3r'] = Zend_Auth::getInstance()->getIdentity()->id;
		//}
		

    }

    public function indexAction()
    {
		$layout = Zend_Layout::getMvcInstance();
		$layout->cidade = 'Outras Cidades';
        $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
        $layout->form = new Forms_Login();
        $layout->form_newsletter = new Forms_Newsletter();

		if(Model_Access::isGuest())
			$this->redirect('/');
    	
		$id = base64_decode(base64_decode($this->getRequest()->getParam('id')));
		$id_encode = base64_encode($id);

		$oferta = $this->fetchAll( $this->oferta,
			array(
				'id = ?' => $id
			)
		);
		$this->view->oferta = $oferta[0];
		
		$id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
		$layout->id_usuario = $id_usuario;
		

		
		$pedido_usuario = $this->fetchAll( $this->pedido, array(
					'id_oferta = ?' => $id,
					'id_usuario = ?' => $id_usuario,
					'status <> ?' => 3
		));
		$this->view->qtd_cupom = count($pedido_usuario);

        $usuario = $this->usuario->select()
        		   ->from(array('u'=>'usuario'), array('creditos'=>'u.credito'))
        		   ->where('u.id = '.$id_usuario)
        		   ->query()
        		   ->fetch();		
        		   
		$this->view->titulo = "Sua Compra";


		
			if ( $this->isPost() ){
			
		
				$data = $this->getPost();
				
				if(count($data['utilizador']) >= 1){
					
					$id_oferta = $oferta[0]['id'];
					$data_pedido = time();
					$servico_pagamento = 2;
					$forma_pagamento = '';
					$status = 3;
					$pago = 0;
					$data_pagamento = NULL;
					$presente = 1;
					
					$qtd = 1;
					$existe = false;
					
					$itens = '';
					foreach($data['utilizador'] as $value){
						
						if(!empty($value)){
							$nome_utilizador = $value;
	
							$this->pedido->insert( array(
								'id_oferta' => $id_oferta,
								'id_usuario' => $id_usuario,
								'data_pedido' => $data_pedido,
								'nome_utilizador' => $nome_utilizador,
								'servico_pagamento' => $servico_pagamento,
								'forma_pagamento' => $forma_pagamento,
								'presente' => $presente,
								'status' => $status,
								'pago' => $pago,
								'data_pagamento' => $data_pagamento,
								)
							);
							
							$existe = true;

							$d = $data['descricao'];
							$descricao = (strlen($d) > 97) ? substr($d,0,97) . '...' : $d;
							
							$itens .= 	'
											<input type="hidden" name="item_id_'.$qtd.'" value="2">
											<input type="hidden" name="item_descr_'.$qtd.'" value="'.$descricao.'">
											<input type="hidden" name="item_quant_'.$qtd.'" value="1">
											<input type="hidden" name="item_valor_'.$qtd.'" value="'.$data['preco'].'">						
										';
							
							$qtd++;
							
						}
						
					}
					
					if($existe){
						$formulario = '
							<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml" id="form-go-to-pagseguro" method="post">
								<input type="hidden" name="email_cobranca" value="edluisecosta@hotmail.com">
								<input type="hidden" name="tipo" value="CP">
								<input type="hidden" name="moeda" value="BRL">
						
								'.$itens.'
								
								<input type="hidden" name="ref_transacao" value="'.$id_usuario.'-'.$id_oferta.'-'.$data_pedido.'">
								<input type="hidden" name="encoding" value="utf-8" />
								<input type="hidden" name="extras" value="-'.$usuario['creditos'].'" />
								
						      <script type="text/javascript">
						            document.getElementById("form-go-to-pagseguro").submit();
						      </script>
						';
						
						$layout->envio_formulario = $formulario ;
					}
					
				}
				
			}
			
    }
    
    public function finalizadaAction()
    {
		Zend_Layout::getMvcInstance()->disableLayout();

		$id_usuario = $this->id_usuario->id;
		unset($this->id_usuario->id);
		
	    	$user = $this->pedido->select()
		       		   ->from(array('p'=>'pedido'), array('COUNT(*) as total'))
		       		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
		       		   ->where('p.id_usuario = '.$id_usuario)
		       		   ->group('p.id_oferta')
		       		   ->query()
		       		   ->fetch();
			if($user['total'] != 0){
				$this->usuario->update( array( 'credito' => 0 ), array( 'id=?' => $id_usuario ) );				
			}
		
	    	$pedidos = $this->pedido->select()
		       		   ->from(array('p'=>'pedido'), array('id_oferta'=>'p.id_oferta','COUNT(*) as total'))
		       		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
		       		   ->group('p.id_oferta')
		       		   ->query()
		       		   ->fetchAll();
		       		   
			foreach($pedidos as $value){
				$this->oferta->update( array( 'numero_atual_compradores' => $value['total'] ), array( 'id=?' => $value['id_oferta'] ) );
			}
			
	    	$usuario_convidado = $this->pedido->select()
		       		   ->from(array('p'=>'pedido'), array('id_usuario_convidado'=>'p.id_usuario','id_pedido'=>'p.id'))
		       		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
		       		   ->group('p.id_usuario')
		       		   ->query()
		       		   ->fetchAll();
			
			foreach($usuario_convidado as $v){
				
				$convite = $this->convite->select()
			       		   ->from(array('c'=>'convite'), array('id_usuario'=>'c.id_usuario'))
			       		   ->where('c.id_usuario_convidado = '.$v['id_usuario_convidado'])
			       		   ->where('c.pago = 0')
			       		   ->query()
			       		   ->fetch();

				if($convite['id_usuario']){
					
					$this->convite->update( array(
							'id_pedido' => $v['id_pedido'],
							'pago' => 1
						), array(
	                		"id_usuario_convidado = ?" => $v['id_usuario_convidado']
					) );
					
			    	$usuario = $this->usuario->select()
				       		   ->from(array('u'=>'usuario'), array('credito'=>'u.credito'))
				       		   ->where('u.id = '.$convite['id_usuario'])
				       		   ->query()
				       		   ->fetch();
				       		   
			    	$credito = $this->credito->select()
				       		   ->from(array('c'=>'credito'), array('valor'=>'c.M_valor'))
				       		   ->where('c.id = 0')
				       		   ->query()
				       		   ->fetch();
				       		   
					$this->usuario->update( array('credito' => $usuario['credito']+$credito['valor']), array(
	                	"id = ?" => $convite['id_usuario']
					) );
					
				}

			}
		
    }
    
	public function confirmadaAction()
    {
		Zend_Layout::getMvcInstance()->disableLayout();
		
		$id_oferta = $this->getRequest()->getParam('id_oferta');
		
		$tbl = new Model_Oferta_Table();
		$oferta = $this->fetchAll( $tbl, array( 'id = ?' => $id_oferta ));
		
		$cont = $oferta[0]['numero_atual_compradores']+1;
		$tbl->update( array( 'numero_atual_compradores' => $cont ), array( 'id=?' => $id_oferta ) );
		
    }
}

