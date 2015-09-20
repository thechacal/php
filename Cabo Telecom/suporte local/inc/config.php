<?
$prod = false;

$open_pages = "index,msg,login,logoff";

define("OPEN_PAGES", $open_pages);
define("PAGE_SIZE", "20");

if($prod) {
define("DB_USER","root");
define("DB_PASS", "senha");
define("DB_NAME", "dbbugtracker");
define("DB_HOST", "127.0.0.1");
define("DB_TYPE", "mysqli");
} else {
define("DB_USER","root");
define("DB_PASS", "senha");
define("DB_NAME", "dbbugtracker");
define("DB_HOST", "127.0.0.1");
define("DB_TYPE", "mysqli");
}
?>
