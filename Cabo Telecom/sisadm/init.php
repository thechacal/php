<?
  session_start();
  session_regenerate_id();
  require('config.php');
  require('quotes.php');

  $dbconn = mysql_connect($config['dbserver'], $config['dbuser'], $config['dbpass']) or die ('init(0): '. mysql_error());
  mysql_select_db($config['dbname']) or die('init(1) '.mysql_error());

  $q = "SET CHARACTER SET cp1250";
  mysql_query($q, $dbconn) or die('init(2)'.mysql_error());

  /* Se nao estiver autenticado */
  
  if (strpos($_SERVER['SCRIPT_NAME'], 'login.php') === false) {

    $_SESSION['back_url'] = $_SERVER['SCRIPT_NAME'];

    if ((!isset($_SESSION['login'])) || ($_SESSION['login']['user_agent'] != sha1($_SERVER['HTTP_USER_AGENT']) )) {
      header('location: login.php'.((strlen(SID) > 0) ? '?'.SID : ''));
      exit();
    }

  }

  /* protecao adicional*/

  if ($_SESSION['login']['ip'] != $_SERVER['REMOTE_ADDR']) {
    unset($_SESSION['login']);
  }
  
?>
