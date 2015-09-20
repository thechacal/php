<?
if(PHP_OS == "WINNT")
 ini_set("include_path",".;../inc/;inc/;..");
else
 ini_set("include_path",".:../inc/:inc/:..");


require_once("inc/config.php");
require_once("inc/classes.inc.php");

session_start();

function Redirect($url)
{
  Header("Location:$url");
}

function showMessage($msg)
{
   logger('SYSTEM LOG',$msg);
   $msg = urlencode($msg);
   Redirect("msg.php?msg=$msg");
   exit();
}

function isopen() {
  $self = $_SERVER["PHP_SELF"];
  $base = basename($self);
  $base = basename($base,".php");
  $open_pages = split(",", OPEN_PAGES);
  return in_array($base, $open_pages);
}

function logger($op, $msg) {
$usuario = (isset($_SESSION["s_usuario"]))?$_SESSION["s_usuario"]->login:"SYSTEM USER";
$ip = $_SERVER["REMOTE_ADDR"];

/* Safe logs */
unset($_POST["senha"]);
unset($_POST["confirmacao"]);


$post_data = serialize($_POST);
$get_data = serialize($_GET);

$l = new log();
$l->usuario = $usuario;
$l->ip = $ip;
$l->descricao = $msg;
$l->operacao = $op;
$l->get_data = $get_data;
$l->post_data = $post_data;
$l->add();

}

function isauth() {
  if(!isset($_SESSION["logged"])) {
   Redirect("index.php");
   exit();
   }
}

function logoff() {
  session_destroy();
  Redirect("index.php");
}

function checkPermission($operacao) {
  return;
   $u = $_SESSION["s_usuario"];
   if(!$u->hasPermission($operacao)) {
        showMessage("Permissão negada.");
    }
  }


function getUFS() 
{
  return array("PB", "PE", "RN", "CE");

}

function fillObject($method, $object, $readonly = "") {
   $method = "_" . strtoupper($method);
   global $$method;
   $src = $$method;
   if(!is_array($readonly)) $readonly = array($readonly);

   $vars_name = get_class_vars($object);
   $vars = array_keys($vars_name);
   $obj = new $object();
   foreach($vars as $var) {
     if(!in_array($var,$readonly)) $obj->$var = $src[$var];
   }
   return $obj;
 }


?>
