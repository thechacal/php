<?
  require('init.php');
  
foreach($_POST AS $key => $value)
{
  	${$key} = $value;
}

  if (isset($_REQUEST['login'])) {
    $password = (strlen($_REQUEST['hash']) > 0)
      ? $_REQUEST['hash']
      : sha1(sha1($_REQUEST['password']).$_SESSION['salt']); //protecao contra snifers

    /* recolher informações sobre o endereço IP */

    $query = "SELECT *, UNIX_TIMESTAMP(changes) as `uts` FROM `ban` WHERE `ip` = '${_SERVER[REMOTE_ADDR]}'";
    $result = mysql_query($query) or die('login(0): '.mysql_error());

    $banlist = array('ip' => $_SERVER['REMOTE_ADDR'], 'attempts' => 0, 'state' => 'auto');
    if (mysql_num_rows($result) > 0) {
      $banlist = mysql_fetch_array($result);
      $banlist['timeleft'] = $config['bantime'] - (time() - $banlist['uts']);
      if ($banlist['timeleft'] < 0) {
        $banlist['attempts'] = 0;
      }
    }
    $banlist['account'] = $_REQUEST['login'];

    /* verifica se o ip esta na lista negra */

    if ( ($banlist['state'] == 'disable') ||
         (($banlist['state'] == 'auto') && ($banlist['attempts'] < $config['banattempts']) )
       ) {

      /* pega informacao do login */
  
      $query = "SELECT * FROM `users` WHERE `login` = '".$_REQUEST['login']."' LIMIT 1";
      $result = mysql_query($query) or die('login(2) '.mysql_error());
      $row = mysql_fetch_array($result);
      if ($password == sha1($row['pass'].$_SESSION['salt'])) {
  
        $query = "SELECT * FROM `perms` ORDER BY `id` ASC";
        $result = mysql_query($query) or die('login(3) '.mysql_error());

        $_SESSION['login']['ip']       = $_SERVER['REMOTE_ADDR'];        
        $_SESSION['login']['login']    = $row['login'];
        $_SESSION['login']['FullName'] = $row['FullName'];
        $_SESSION['login']['email']    = $row['email'];
	$_SESSION['login']['user_agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
        while ($perms = mysql_fetch_array($result)) {
          $_SESSION['login']['perms'][$perms['name']] = ((int)$row['perms'] & (int)$perms['id']) == $perms['id'];
        }
  		
        header('location: '. $_SESSION['back_url'] .((strlen(SID) > 0) ? '?'.SID : ''));
        exit();
      } else {
        /* atualizando lista negra*/

        $banlist['attempts']++;
        if (!isset($banlist['uts'])) {
          $query = "INSERT INTO `ban` (`ip`, `attempts`, `account`, `changes`, `state`) VALUES "
            ."('${banlist[ip]}', '${banlist[attempts]}', '${banlist[account]}', NOW(), '${banlist[state]}')";
          mysql_query($query) or die('login(4): '.mysql_error());
        } else if ($banlist['state'] == 'auto') {
          $query = "UPDATE `ban` set `account` = '${banlist[account]}', `attempts` = "
            ."'${banlist[attempts]}',`changes` = NOW() WHERE `ip` = '${banlist[ip]}'";
          mysql_query($query) or die('login(5): '.mysql_error());
        }
      }
    }
  }

  function randstr($minlen = 3, $maxlen = 10) {
    $min =  96;
    $max = 122;
    $str = '';
    for ($i = rand($minlen, $maxlen); $i > 0; $i--) {
      $str .= chr(rand($min,$max));
    } 
    return $str;
  }

  $_SESSION['salt'] = randstr(4,5).time();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />

 <script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.boxy.js'></script>
<link rel="stylesheet" href="css/boxy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />


</head>
<body>

 <script type="text/javascript" src="js/sha1.js" ></script>
 <script type="text/javascript">
   function secure_form(myform) {
       myform.hash.value = hex_sha1(hex_sha1(myform.password.value) + '<? echo $_SESSION['salt']; ?>');
       myform.password.value = '';

   }
 </script>
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<b>Vers&atilde;o 1.3</b>
<div class="espacamento-topo">
	<form action="login.php" method="post" onsubmit="secure_form(this);">

	<table align="center" class="login">
	<tr>
		<th colspan="2">Autentica&ccedil;&atilde;o</th>
	  </tr>
	  <tr>
		<td>Usu&aacute;rio</td>  
		<td> <input type="text" name="login" /> </td>
	  </tr>
	  <tr>
		<td>Senha</td>
		<td> <input type="password" name="password" /> </td>
	  </tr>
 
	  <tr>
		<td colspan="2" class="submit">
		<input type="submit" value="Entrar" /><center><a href="./create_user.php">N&atilde;o tenho senha</a>
		</td>
	  </tr>
	</table>
	 <input type="hidden" name="hash" />
	 <input type="hidden" name="<? echo session_name(); ?>" value="<? echo session_id(); ?>"/>
	</form>
</div>
<?
  if (isset($_REQUEST['login'])) {
    if (($banlist['state'] == 'auto') && ($banlist['timeleft'] > 0) && ($banlist['attempts'] >= $config['banattempts'])) {
      echo "<div style=\"color: red;\"> Banido por ".date('i:s', $banlist['timeleft'])." </div>\n";
    } else if ($banlist['state'] == 'persistent') {
      echo "<div style=\"color: red;\"> Endere&ccedil;o IP ${_SERVER[REMOTE_ADDR]} banido! </div>\n";
    } else {
    	echo "<script>Boxy.alert('Usu&aacute;rio ou Senha Incorreta !!');</script>";
    }
  }
?>
<div id="rodapeempresa">
<hr>
<br>SETOR DE TI - CABO TELECOM</br>
<br>Sistema Melhor Visualizado no Navegador <a target=_blank href=http://br.mozdev.org/firefox/download.html>Mozilla Firefox.</a>
<br>Copyright 2009 -Edluise Costa
</div>
</body>
</html>
