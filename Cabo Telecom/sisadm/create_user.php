<?
require('base.php');
require_once("class.phpmailer.php");
?>
<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.boxy.js'></script>
<script type='text/javascript' src='js/sisadm.js'></script>
<link rel="stylesheet" href="css/boxy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<body>
<?
  	if (isset($_REQUEST['login']))
  	{
  		if ($_REQUEST['password'] != $_REQUEST['password2'])
  		{
			echo "<script>jQuery(document).ready(function(){";
        	        echo "Boxy.alert('Senha e Confirma&ccedil;&atilde;o de Senha n&atilde;o s&atilde;o Iguais!', function(){location.href='create_user.php';})";
                	echo "});</script>";
    		}
    		else
    		{
    			$query = "INSERT INTO `users` (`login`, `pass`, `FullName`, `email`)"." VALUES ('${_REQUEST[login]}', sha1('${_REQUEST[password]}'), '${_REQUEST[FullName]}', '${_REQUEST[email]}')";
	      		if (!mysql_query($query))
      				$error = mysql_error();
	      		else
			{
				$conteudo = "Ol&aacute; ${_REQUEST[FullName]},<br><br>";
	                        $conteudo .="Esta &eacute; uma mensagem de e-mail autom&aacute;tica para inform&aacute;-lo que seu cadastro no SISADM - Sistema Administrativo Cabo Telecom foi efetuado com sucesso. Segue dados da sua conta:<br><br>";
        	                $conteudo .="Usu&aacute;rio: ${_REQUEST[login]}<br>";
        	                $conteudo .="Senha: ${_REQUEST[password]}<br><br>";
        	                $conteudo .="Atenciosamente,<br><br>";
                	        $conteudo .="Setor de TI<br>";
                        	$conteudo .="Cabo Telecom";
	                        $mail = new PHPMailer();
        	                $mail->From = "adm-l@cabonatal.com.br";
                	        $mail->FromName = strtoupper("SISADM - Sistema Administrativo Cabo Telecom");
	                        $mail->Host = "mx.cabonatal.com.br";
        	                $mail->Mailer = "smtp";
                	        $mail->isHTML(true);
	                        $mail->AddAddress("${_REQUEST[email]}");
        	                $mail->Subject = "Bem-vindo ao SISADM";
                	        $mail->Body = $conteudo;
	                        if(!$mail->Send()){
        	                        echo "Erro enviando e-mail.";
                	                exit;
                        	}
				echo "<script>jQuery(document).ready(function(){";
		                echo "Boxy.alert('Usu&aacute;rio cadastrado com sucesso, voc&ecirc; j&aacute; pode fazer login!', function(){location.href='index.php';})";
        		        echo "});</script>";
			}
	    	}
  	}
?>
<div class="espacamento-senha"</div>
<form action="create_user.php" method="post" onsubmit="return validar_senha();">
  <table border=1px; align=center>
    <tr>
      <td>Usu&aacute;rio</td>
      <td> <input type="text" id="login" name="login" /> </td>
    </tr>
    <tr>
      <td>Senha</td>
      <td> <input type="password" id="password" name="password" /></td>
    </tr>
    <tr>
      <td>Confirma&ccedil;&atilde;o de Senha</td>
      <td> <input type="password" id="password2" name="password2" /></td>
    </tr>
    <tr>
      <td>Nome/Sobrenome</td>
      <td> <input type="text" id="fullname" name="FullName" /> </td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td> <input type="text" id="email" name="email" /> </td>
    </tr>
    <tr>
      <td colspan="2"><input type='image' src='img/save_32x32.png' title="Salvar Usu&aacute;rio" value='create'></td>
      
    </tr>
  
</form>
</div>
</table>

<?
if (isset($error)) {
 echo "<span style=\"color: red\" >$error</span>";
}

?>
</body>
</html>
