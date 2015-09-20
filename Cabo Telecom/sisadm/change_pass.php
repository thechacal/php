<?
require('init.php');
require_once("class.phpmailer.php");
 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$login=$_SESSION['login']['login'];
$fullname=$_SESSION['login']['FullName'];
$email=$_SESSION['login']['email'];
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
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<?
	if (isset($_REQUEST['login']))
	{
		if ($_REQUEST['password'] != $_REQUEST['password2'])
		{
			echo "<script>jQuery(document).ready(function(){";
		        echo "Boxy.alert('Senha e Confirma&ccedil;&atilde;o de senha n&atilde;o s&atilde;o iguais!', function(){location.href='change_pass.php';})";
		        echo "});</script>";
		}
    		else
		{
			$query = "UPDATE `users` SET pass=sha1('${_REQUEST[password]}') where login='${_REQUEST[login]}'";
		      	if (!mysql_query($query))
      				$error = mysql_error();
	      		else
			{
				$conteudo = "Ol&aacute; $fullname,<br><br>";
                                $conteudo .="Esta &eacute; uma mensagem de e-mail autom&aacute;tica para inform&aacute;-lo que seu cadastro no SISADM - Sistema Administrativo Cabo Telecom foi alterado com sucesso. Segue dados da sua conta:<br><br>";
                                $conteudo .="Usu&aacute;rio: $login<br>";
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
                                $mail->AddAddress("$email");
                                $mail->Subject = "Cadastro Alterado";
                                $mail->Body = $conteudo;
                                if(!$mail->Send()){
                                        echo "Erro enviando e-mail.";
                                        exit;
                                }
				echo "<script>jQuery(document).ready(function(){";
	                        echo "Boxy.alert('Senha alterada com sucesso!', function(){location.href='secured_page.php';})";
        	                echo "});</script>";
			}
	    	}
	}
?>
<center>
<div class="espacamento-senha"</div>
<form action="change_pass.php" method="post" onsubmit="return validar_senha2();">
  <table border=1px;>
    <tr>
      <td>Usu&aacute;rio</td>
      <td><input readonly type="text" name="login" value="<?echo $_SESSION['login']['login'];?>" /></td>
    </tr>
    <tr>
      <td>Nova Senha</td>
      <td> <input type="password" id="password" name="password" /></td>
    </tr>
    <tr>
      <td>Confirma&ccedil;&atilde;o de Senha</td>
      <td> <input type="password" id="password2" name="password2" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type='image' src='img/save_32x32.png' title="Salvar Usu&aacute;rio" value='create'></td>
    </tr>
</form>
</table>

<?
if (isset($error)) {
 echo "<span style=\"color: red\" >$error</span>";
}

?>

</body>
</html>
