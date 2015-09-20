<?php

class Sistema_EnviacupomController extends Model_Modelo
{

	private $tbl_pedido;
	
    public function init()
    {
		$this->tbl_pedido = new Model_Pedido_Table();
    }

    public function indexAction()
    {
    	$this->_helper->layout()->disableLayout();
    	
    	$ip = $_SERVER['REMOTE_ADDR'];
		$p = $this->getPost();
		extract($p);

	        $select = $this->tbl_pedido->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('p'=>'pedido'), array('count(*) as total'))
	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('minimo_compradores' => 'o.minimo_compradores'))
	        		   ->where('p.id_oferta = '.$id_oferta)
	        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
	        		   ->group('p.id_oferta')
	        		   ->query()
	        		   ->fetchAll();
		
	if($select[0]['total'] >= $select[0]['minimo_compradores']){
		
		
	        $select2 = $this->tbl_pedido->select()
	        		   ->setIntegrityCheck(false)
	        		   ->from(array('p'=>'pedido'), array('nome_utilizador'=>'p.nome_utilizador'))
	        		   ->join(array('o'=>'oferta'),'o.id = p.id_oferta',array('regulamento' => 'o.regras', 'titulo' => 'o.titulo', 'preco'=>'o.M_preco_oferta'))
	        		   ->join(array('u'=>'usuario'),'u.id = p.id_usuario',array('nome' => 'u.nome', 'email' => 'u.email'))
	        		   ->join(array('pa'=>'parceiro'),'pa.id = o.id_parceiro',array('nome_parceiro' => 'pa.nome', 'rua'=>'pa.rua', 'numero'=>'pa.numero', 'complemento'=>'pa.complemento', 'cep'=>'pa.cep', 'bairro'=>'pa.bairro', 'telefone'=>'pa.telefone'))
	        		   ->where('o.id = '.$id_oferta)
	        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
					   ->order(array('p.id DESC'))
	        		   ->query()
	        		   ->fetchAll();
		
			$i = 0;
			foreach($select2 as $value){
				
				$complemento = ($value['complemento']) ? "(".$value['complemento'].") <br/>" : '<br/>' ;
				
				$conteudo = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
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
				                    <p><font face="Arial" size="3"><strong>Estabelecimento:</strong></font> <font face="Arial" size="3">'.utf8_decode($value['nome_parceiro']).'</font></p>
				                    <p><font face="Arial" size="3"><strong>Endereço:</strong></font><br/>
				                    <font face="Arial" size="3">'.$value['rua']. ' - '.$value['numero']. ' '.$complemento.
				                    $value['bairro'].' - '.$value['cep'].'<br/>'.
				                    $value['telefone'].'</font></p>
				                    <p><font face="Arial" size="3"><strong>Produto:</strong> '.utf8_decode(strip_tags($value['titulo'])).'</font><br />
				                      <font face="Arial" size="3"><strong>Valor da Oferta:</strong> '.$value['preco'].'</font>
				                    </p>
				                    <p><font face="Arial" size="3"><strong>Nome Utilizador:</strong> '.utf8_decode($value['nome_utilizador']).'</font><br />
				                    </p>
				                    <p align="center"><font face="Arial" size="3"><strong>Favor levar o seu CPF para concluirmos a compra!</strong></font></p></td>
				                </tr>
				              </table></td>
				            </tr>
				          </table>
				          <p><font face="Arial" size="3">Para utilizar o seu cupom, basta levar o seu CPF e apresentá-lo diretamente ao estabelecimento, observando os regulamentos da promoção:</font></p>
				          <p><font face="Arial" size="3">'.utf8_decode($value['regulamento']).'</font></p>
				          <p><font face="Arial" size="3">A qualquer momento, você pode acessar este e outros cupons que você tenha comprado através do nosso site. Basta fazer o log-in e acessar a sua Conta para visualizar, alterar e imprimir os seus cupons.</font></p>
				          <p><font face="Arial" size="3">Qualquer dúvida ou comentário, por favor entre em contato conosco através do e-mail: contato@compranacidade.com.br.</font></p></td>
				      </tr>
				    </table></td>
				  </tr>
				</table>';
				
				$mail = new Model_PHPMailer();
				$mail->IsSMTP(); // mandar via SMTP
				$mail->From = "contato@compranacidade.com.br"; // Remetente
			    $mail->FromName = "Site Compra na Cidade";
				$mail->isHTML(true);
			    $mail->AddAddress($value['email']);
			    $mail->Subject = "Compra na Cidade - Cupom de compra";
			   	$mail->Body = $conteudo;
			    $mail->Send();
			    
			    		if($i == 9){
			    			$i = 0;
			    			sleep(10);
			    		} else
							$i++;
			    
			}
		
	} else {
		        $select2 = $this->tbl_pedido->select()
        		   ->setIntegrityCheck(false)
        		   ->from(array('p'=>'pedido'), array())
        		   ->join(array('u'=>'usuario'),'u.id = p.id_usuario',array('email' => 'u.email'))
        		   ->where('p.id_oferta = '.$id_oferta)
        		   ->where('p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada"')
				   ->order(array('p.id DESC'))
        		   ->query()
        		   ->fetchAll();
		
				$i = 0;
				foreach($select2 as $value){
					$complemento = ($value['complemento']) ? "(".$value['complemento'].") <br/>" : '<br/>' ;
					
						$conteudo = '
					<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
						    <td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
						  </tr>
						  <tr>
						    <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
						      <tr>
						        <td><p><font face="Arial" size="5"><strong>Prezado usuário!</strong></font></p>
						          <p><font face="Arial" size="3">Informamos através deste e-mail que a compra que foi realizada em nosso Site não foi concretizada por não ter sido alcançada a quantidade mínima de compradores. O valor que foi pago será restituído pelo PagSeguro. Acesse a sua conta no PagSeguro e entre em contato com o mesmo.</font></p>
						          <p><font face="Arial" size="3">Qualquer dúvida ou comentário, por favor entre em contato conosco através do e-mail: contato@compranacidade.com.br.</font></p></td>
						      </tr>
						    </table></td>
						  </tr>
						</table>';
					
					$mail = new Model_PHPMailer();
					$mail->IsSMTP(); // mandar via SMTP
					$mail->From = "contato@compranacidade.com.br"; // Remetente
				    $mail->FromName = "Site Compra na Cidade";
					$mail->isHTML(true);
				    $mail->AddAddress($value['email']);
				    $mail->Subject = "Compra na Cidade - Cupom de compra";
				   	$mail->Body = $conteudo;
				    $mail->Send();
			    
			    		if($i == 9){
			    			$i = 0;
			    			sleep(10);
			    		} else
							$i++;
				}
			
	}
			
    	session_start();
    
    	$_SESSION['msg']['content'] = 'O envio de e-mails com os cupos foram enviados para os usu&aacute;rios com sucesso!';
    	$_SESSION['msg']['title'] = 'Sucesso!'; 
	
    	$this->_redirect('/sistema/relatorios');
    
    }

}

