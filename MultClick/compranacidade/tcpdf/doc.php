<?php
	  	require('mypdf.php');
		date_default_timezone_set( 'America/Fortaleza' );
	  	
	  	extract($_POST);

		##############################################################
		#        CONFIGURAÇÕES DA CONEXÃO COM O BANCO DE DADOS
		##############################################################
		
		$host = 'mysql.multclick.com.br'; // Local da base de dados MySql
		$database = 'multclick04'; // Nome da base de dados MySql
		$usuario = 'multclick04'; // Usuario com acesso a base de dados MySql
		$senha = 'f6f5f9';  // Senha de acesso a base de dados MySql
	  	
		$lnk = mysql_connect($host, $usuario, $senha) or die ('Nao foi possível conectar ao MySql: ' . mysql_error());
		mysql_select_db($database, $lnk) or die ('Nao foi possível ao banco de dados selecionado no MySql: ' . mysql_error());	
	  	
		##############################################################
		#                   COLETANDO INFORMAÇÕES
		##############################################################
		
		$oferta = mysql_query('SELECT `p`.`nome_utilizador`, `u`.`nome`, `u`.`cpf` FROM `pedido` AS `p` INNER JOIN `usuario` AS `u` ON u.id = p.id_usuario WHERE p.id_oferta='.$id_oferta.' AND (p.status = "Completo" OR p.status = "Completa" OR p.status = "Aprovado" OR p.status = "Aprovada") ORDER BY `p`.`id` DESC');
		$data = array();
		while($campo=mysql_fetch_array($oferta)){
			$data[] = $campo; 
		}
		
		##############################################################
		#                   CONFIGURAÇÕES DO PDF
		##############################################################
	  	
		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Multclick - Tecnologia Digital');
		$pdf->SetTitle('Relação de nomes da Oferta: ---');
		
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		//set some language-dependent strings
		$pdf->setLanguageArray($l);
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('helvetica', '', 10);
		
		// add a page
		$pdf->AddPage();
		
		//Column titles
		$header = array('Nome do Utilizador', 'Nome do Usuário', 'CPF');
		
		//Data loading
//		$data = $pdf->LoadData($_SERVER['DOCUMENT_ROOT'] . '/uploads/countries.txt');
		
		// print colored table
		$pdf->ColoredTable($header, $data);
		
		// ---------------------------------------------------------
		
		//Close and output PDF document
		$pdf->Output('lista.pdf', 'D');
		
		//============================================================+
		// END OF FILE                                                
		//============================================================+