<?
include("inc/lib.inc.php");
$page = new Smarty();
$page->assign("msg", $_GET["msg"]);

$page->display("msg.html");
?>
