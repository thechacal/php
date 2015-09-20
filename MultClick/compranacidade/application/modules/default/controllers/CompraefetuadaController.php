<?php

class CompraefetuadaController extends Model_Modelo
{

    public function init()
    {
        Zend_Layout::getMvcInstance()->disableLayout();
    }

    public function indexAction()
    {
    	
		if ($_POST) {
		  $this->pgs_log('Recebendo dados via POST, estes dados serão verificados pelo PagSeguro: '.print_r($_POST, true));
		}
		// Aqui vai seu Token
		define('TOKEN','327A0D8C3CF44AFC893FC418B59C2326');
		 
		// Incluindo o arquivo da biblioteca
		$retorno = new Model_RetornoPagSeguro();
		 
		// Função que captura os dados do retorno
		function retorno_automatico ( $VendedorEmail, $TransacaoID, 
		  $Referencia, $TipoFrete, $ValorFrete, $Anotacao, $DataTransacao,
		  $TipoPagamento, $StatusTransacao, $CliNome, $CliEmail, 
		  $CliEndereco, $CliNumero, $CliComplemento, $CliBairro, $CliCidade,
		  $CliEstado, $CliCEP, $CliTelefone, $produtos, $NumItens)
		{
		    $data = func_get_args();
		    $this->pgs_log('Dados verificados com sucesso! Dados formatados no retorno: '.print_r($data, true));
		 
		    // AQUI VOCÊ TEM OS DADOS RECEBIDOS DO PAGSEGURO, JÁ VERIFICADOS.
		    // CONFIRA A LISTA DE PRODUTOS E O VALOR COM O QUE VOCÊ TEM NO
		    // BANCO DE DADOS E, SE ESTIVER TUDO CERTO, ATUALIZE O STATUS
		    // DO PEDIDO.
		}		    	
    }
    
	public function pgs_log($msg){
		  $msg = date('[d/m/Y H:i:s] ') . $msg . "\n\n---\n";
		  file_put_contents ('/uploads/pagseguro.log', $msg);
	}

}