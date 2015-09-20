<?
require_once("inc/smarty/Smarty.class.php");
require_once("inc/adodb/adodb.inc.php");
require_once("inc/phpmailer/class.phpmailer.php");

require_once("inc/database.inc.php");
require_once("inc/persistence.inc.php");


# Entidades

# Include Scan
$incs = scandir("inc/entity/");
foreach($incs as $inc) {
  if($inc == "." || $inc == "..") continue;
  if(strstr($inc, ".inc.php")) {
   require_once("inc/entity/$inc");
  }
}
?>
