<?
include("inc/adodb/adodb.inc.php");
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','senha','dbbugtracker');
$tables = $db->MetaTables('TABLES');

foreach($tables as $table) {
  $fields = $db->MetaColumns($table);

  $class_template = <<<INIT
class ##TABLE## extends persistence {
var $##PRIMARYKEY##;
##FIELDS##
  function ##TABLE##() {
    parent::persistence();
    \$this->setAutoIncrement('##PRIMARYKEY##');
  }


}
INIT;

  $class_fields = "";
  echo "CLASSE:$table<br>";
  echo "<pre>";

  foreach($fields as $field) {
   if($field->primary_key == 1)
     $primary_key = "$field->name";
   else {
     $class_fields .= "var \$$field->name;\n";
    }
  }
  $class_template = str_replace("##TABLE##", $table, $class_template);
  $class_template = str_replace("##PRIMARYKEY##", $primary_key, $class_template);
  $class_template = str_replace("##FIELDS##", $class_fields, $class_template);

  echo $class_template;
  echo "</pre><br>";
}

/*

  echo "<pre>";
  system("ping -c 10 192.168.0.3");
  echo "</pre>";

*/

?>
