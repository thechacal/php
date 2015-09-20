<?php

class Conta_MeusCuponsController extends Model_Modelo
{

	  private $tbl_pedido;
	  private $id_usuario;
	
      public function init()
      {
			$this->tbl_pedido = new Model_Pedido_Table();
			
      		$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable(new Model_Cidade_Table(),'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() ){
            	$this->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
				$layout->id_usuario = $this->id_usuario;
            }
            
            $this->view->titulo = "Meus Cupons";			
      }

      public function indexAction()
      {
            
	        $cupons = $this->tbl_pedido->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('p'=>'pedido'), array())
	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('titulo' => 'o.titulo', 'id_cidade' => 'o.id_cidade', 'cupom_expira' => 'o.D_cupom_expira', 'id_oferta'=>'o.id', 'data_fim'=>'o.D_data_fim'))
	        		   ->where('p.id_usuario = '.$this->id_usuario)
	        		   ->where('o.D_data_fim < '.time())
	        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
	        		   ->where('o.numero_atual_compradores >= o.minimo_compradores')
	        		   ->group('p.id_oferta')
					   ->order(array('p.id DESC'))
	        		   ->query()
	        		   ->fetchAll();
	        		   
            $this->view->cupons = $cupons;
      }

      public function naoconcretizadosAction()
      {
	        $cupons = $this->tbl_pedido->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('p'=>'pedido'), array())
	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('titulo' => 'o.titulo'))
	        		   ->where('p.id_usuario = '.$this->id_usuario)
	        		   ->where('o.D_data_fim < '.time())
	        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
	        		   ->where('o.numero_atual_compradores < o.minimo_compradores')
	        		   ->group('p.id_oferta')
					   ->order(array('p.id DESC'))
	        		   ->query()
	        		   ->fetchAll();

            $this->view->cupons = $cupons;
      }
      
      public function imprimirAction(){
    		$this->_helper->layout()->disableLayout();
    		
    		extract($this->getPost());
    		
		        $select2 = $this->tbl_pedido->select()
		        		   ->setIntegrityCheck(false)
		        		   ->from(array('p'=>'pedido'), array('nome_utilizador'=>'p.nome_utilizador'))
		        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('regulamento' => 'o.regras', 'titulo' => 'o.titulo', 'preco'=>'o.M_preco_oferta'))
		        		   ->join(array('u'=>'usuario'),'u.id = p.id_usuario',array('nome' => 'u.nome', 'email' => 'u.email'))
		        		   ->join(array('pa'=>'parceiro'),'pa.id = o.id_parceiro',array('nome_parceiro' => 'pa.nome', 'rua'=>'pa.rua', 'numero'=>'pa.numero', 'complemento'=>'pa.complemento', 'cep'=>'pa.cep', 'bairro'=>'pa.bairro', 'telefone'=>'pa.telefone'))
		        		   ->where('o.id = '.$id_oferta)
		        		   ->where('p.id_usuario = '.$this->id_usuario)
		        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
						   ->order(array('p.id DESC'))
		        		   ->query()
		        		   ->fetchAll();

				$complemento = ($select2[0]['complemento']) ? "(".$select2[0]['complemento'].") <br/>" : '<br/>' ;
		        		   
				echo '
				<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR">
				<head>
					<title>Compra na Cidade - Cupom</title>
					<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
					<script type="text/javascript">
						window.print();
					</script>
				</head>
				<body>
				
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
				    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
				  </tr>
				  <tr>
				    <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
				      <tr>
				        <td><p><font face="Arial" size="5"><strong>Obrigado!</strong></font></p>
				          <p><font face="Arial" size="3">Graças a você e aos outros membros da Compra na Cidade, conseguimos ultrapassar a quantidade mínima de compras para ativar a oferta de hoje!</font></p>
				          <p><font face="Arial" size="3">Segue o seu comprovante de compra: o seu cupom &quot;Compra na Cidade&quot;!</font></p>
				          <table width="100%" border="0" cellspacing="0" cellpadding="0">
				            <tr>
				              <td bgcolor="#000000"><table width="100%" border="0" cellspacing="1" cellpadding="10">
				                <tr>
				                  <td bgcolor="#FFFFFF"><p><font face="Arial" size="5"><strong>Compra na Cidade</strong></font></p>
				                    <p><font face="Arial" size="3"><strong>Estabelecimento:</strong></font> <font face="Arial" size="3">'.utf8_decode($select2[0]['nome_parceiro']).'</font></p>
				                    <p><font face="Arial" size="3"><strong>Endereço:</strong></font><br/>
				                    <font face="Arial" size="3">'.$select2[0]['rua']. ' - '.$select2[0]['numero']. ' '.$complemento.
				                    $select2[0]['bairro'].' - '.$select2[0]['cep'].'<br/>'.
				                    $select2[0]['telefone'].'</font></p>
				                    <p><font face="Arial" size="3"><strong>Produto:</strong> '.utf8_decode(strip_tags($select2[0]['titulo'])).'</font><br />
				                      <font face="Arial" size="3"><strong>Valor da Oferta:</strong> '.$select2[0]['preco'].'</font>
				                    </p>
				                    <p><font face="Arial" size="3"><strong>Nome Utilizador:</strong> '.utf8_decode($select2[0]['nome_utilizador']).'</font><br />
				                    </p>
				                    <p align="center"><font face="Arial" size="3"><strong>Favor levar o seu CPF para concluirmos a compra!</strong></font></p></td>
				                </tr>
				              </table></td>
				            </tr>
				          </table>
				          <p><font face="Arial" size="3">Para utilizar o seu cupom, basta levar o seu CPF e apresentá-lo diretamente ao estabelecimento, observando os regulamentos da promoção:</font></p>
				          <p><font face="Arial" size="3">'.utf8_decode($select2[0]['regulamento']).'</font></p>
				          <p><font face="Arial" size="3">A qualquer momento, você pode acessar este e outros cupons que você tenha comprado através do nosso site. Basta fazer o log-in e acessar a sua Conta para visualizar, alterar e imprimir os seus cupons.</font></p>
				          <p><font face="Arial" size="3">Qualquer dúvida ou comentário, por favor entre em contato conosco através do e-mail: <a href="contato@compranacidade.com.br">contato@compranacidade.com.br</a>.</font></p></td>
				      </tr>
				    </table></td>
				  </tr>
				</table>
				
				</body>
				</html>
				';
      }

}