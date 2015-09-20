<?
require('init.php');
?>

<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
 <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>
<body>

<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<div align=right class="espacamento-user"><img src="img/user_32x32.png"><b>&nbsp;<?print_r ($_SESSION['login']['FullName']);?></b></div>
</body>
</html>
