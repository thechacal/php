<?
require('init.php');

foreach($_POST AS $key => $value) {
${$key} = $value;
}

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
if (!$_SESSION['login']['perms']['admin']) {
        echo "<script>jQuery(document).ready(function(){";
        echo "Boxy.alert('Somente para Administradores do Sistema!', function(){location.href='secured_page.php';})";
        echo "});</script>";
}
?>
<div class="espacamento-senha"></div>

<?
/* PROTECAO CONTRA ATAQUES DO TIPO BRUTAL FORCE*/
if ($_SESSION['login']['perms']['admin']) {

  if (isset($_REQUEST['banlist'])) {
    foreach($_REQUEST['banlist'] as $ip => $state) {
      if ($state == 'apagar') {
        $query = "DELETE FROM `ban` WHERE `ip` = '$ip' ";
      } else {
        $query = "UPDATE `ban` set `state` = '$state', `attempts` = '0' WHERE `ip` = '$ip'";
      }
      mysql_query($query) or die('banlist(0): '.mysql_error());
    }
  }

  if (isset($_REQUEST['addip'])) {
    $query = "INSERT INTO `ban` (`ip`) VALUES ('${_REQUEST[addip]}')";
    mysql_query($query) or die('banlist(1): '. mysql_error());
  }


function write_select($name, &$options, $selected) {
  $cnt = "<select name=\"$name\">\n";
  foreach ($options as $value) {
    if ($value == $selected) {
      $cnt .= "<option value=\"$value\" selected=\"selected\">$value</option>\n";
    } else {
      $cnt .= "<option value=\"$value\">$value</option>\n";
    }
  }
  $cnt .= "</select>\n";
  return $cnt;
}

$opts = array ('auto', 'desabilitar', 'persistentes', 'apagar');

$query = "SELECT *, UNIX_TIMESTAMP(`changes`) as uts FROM `ban` ORDER BY `changes` DESC";
$result = mysql_query($query) or die('banlist(2): '.mysql_error());
echo "<form method=\"post\" action=\"banlist.php\">";
echo "<input type=\"hidden\" name=\"".session_name()."\" value=\"".session_id()."\" /><table>\n";
echo "<tr> <th> ip  </th> <th> tentativas </th> <th> conta </th> <th> data/hora </th> <th> contagem regressiva </th> <th> op&ccedil;&atilde;o </th> </tr>\n";

while ($row = mysql_fetch_array($result)) {
  $ban_left = $config['bantime'] - (time() - $row['uts']);
  echo "<tr>\n";
  echo "<td> ${row[ip]} </td>\n";
  echo "<td> ${row[attempts]} </td>\n";
  echo "<td> ${row[account]} </td>\n";
  echo "<td> ${row[changes]} </td>\n";
  echo "<td> ". ((($row['state'] == 'auto') && ($ban_left > 0)) ? date('i:s', $ban_left) : '')."</td>\n";
  echo "<td> ".write_select("banlist[".$row['ip']."]", $opts, $row['state'])." <a href='javascript:show_help()'><img border=0 src='img/help_32x32.png' title='Ajuda'</a></td>\n";
  echo "</tr>\n";
}
}
?>
</table>
<td colspan="2"><input type='image' src='img/save_32x32.png' title="Salvar" value='save'></td>

</form>

<br/>

<form action="banlist.php" method="post">
<input type="text" name="addip" />
<input type="submit" value="Adicionar IP" />
</form>

<div id="depen" style="display:none"><br>
<table width="80%">
<b>1)</b> auto - ativa&ccedil;&atilde;o e desativa&ccedil;&atilde;o autom&aacute;tica de acordo com o &ecirc;xito ou tentativas sem sucesso<br>
<b>2)</b> desabilitar - ip sempre poder&aacute; fazer login no sistema<br>
<b>3)</b> persistentes - ip banido para sempre<br>
<b>4)</b> apagar - remover ip da lista negra<br>
</table>
</div>
</body>
</html>
