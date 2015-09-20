<?
  $config = array();
  $config['dbserver']      = 'localhost';
  $config['dbuser']        = 'root';
  $config['dbpass']        = 'senha';
  $config['dbname']        = 'sisadm';

  $dbconn = mysql_connect($config['dbserver'], $config['dbuser'], $config['dbpass']) or die ('init(0): '. mysql_error());
  mysql_select_db($config['dbname']) or die('init(1) '.mysql_error());

  $q = "SET CHARACTER SET cp1250";
  mysql_query($q, $dbconn) or die('init(2)'.mysql_error());

?>
