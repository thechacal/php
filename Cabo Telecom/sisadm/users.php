<?
require('init.php');

foreach($_POST AS $key => $value) {
${$key} = $value;
}

if ($_SESSION['login']['perms']['admin']) {
  if (isset($_REQUEST['users'])) {
    foreach ($_REQUEST['users'] as $key => $value) {
      $this_perm = 0;
      foreach($value as $id => $state) {
        if ($state == 'on') {
          $this_perm += $id;
        }
      }
      $query = "UPDATE `users` set `perms` = '$this_perm' WHERE `login` = '$key'";
      mysql_query($query) or die('users(0): '.mysql_error());
    }
  }

  if (isset($_REQUEST['delete'])) {
    $query = "DELETE FROM `users` WHERE `login` = '${_REQUEST[delete]}'";
    mysql_query($query) or die('users(1): '.mysql_error());
  }
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
<div class="espacamento-senha"</div>
<form action="users.php" method="post">

<?

 {

  $query = "SELECT * FROM `perms` ORDER BY `id` ASC";
  $result = mysql_query($query) or die('users(2): '.mysql_error());
  while($row = mysql_fetch_array($result)) {
    $perms[$row['id']] = $row['name'];
  }
  

  $query = "SELECT * FROM `users`";
  $result = mysql_query($query) or die('users(3): '.mysql_error());

  echo "<table>";
  echo "<tr>\n <th>usu&aacute;rio</th>\n <th>nome completo</th>\n <th>e-mail</th>\n";
  
  foreach($perms as $id => $name) {
    echo " <th>$name</th>\n";
  }
  echo "<th>&nbsp;</th></tr>\n";

  while ($row = mysql_fetch_array($result)) {
    echo "<tr>\n";
    echo "  <td> ${row[login]}</td>\n";
    echo "  <td> ${row[FullName]}</td>\n";
    echo "  <td> ${row[email]} ";
    echo "<input type=\"hidden\" name=\"users[${row[login]}][0]\" />";
    echo "</td>\n";
    foreach($perms as $id => $name) {
      echo "  <td> <input type=\"checkbox\" name=\"users[${row[login]}][$id]\" ".((($id & $row['perms']) == $id) ?'checked="checked"' : '')."/></td>\n";
    }
    echo "<td><a href=\"users.php?delete=${row[login]}".((strlen(SID) > 0) ? '&amp;'.SID : '')."\"><img border=0 src='img/del_32x32.png' title='Apagar'</a></td>";
    echo "</tr>\n";
    
  }
  echo "</table>";

?>
<input type="hidden" name="<? echo session_name(); ?>" value="<? echo session_id(); ?>" />
<input type='image' src='img/save_32x32.png' title="Salvar Modificac&otilde;es" value='save'>
<?
} ?>
</form>

</body>
</html>
