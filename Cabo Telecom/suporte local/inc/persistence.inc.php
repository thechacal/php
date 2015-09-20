<?
class persistence {
  var $_key;
  var $_name;
  var $_auto;
  var $_debug;
  var $_onetomany;
  var $_manytomany;
  var $_relationtable;
  var $_lastid;
  var $_lasterror;

/*********************************************************/
  function persistence() {

    $this->_name = get_class($this);
//    $this->_key = array("id" . $this->_name);
    $this->_onetomany = array();
    $this->_manytomany = array();
    $this->_relationtable = array();
  }

/*********************************************************/

  function addOneToMany($table, $field) {
   $this->_onetomany[$table] = $field;
  }

/*********************************************************/
  function addManyToMany($table, $field, $relation = "") {
    $this->_manytomany[$table] = $field;
    if($relation != "")
      $this->_relationtable[$table] = $relation;
  }

/*********************************************************/

  function setAutoIncrement($ai) {
    $this->_auto = $ai;
    $this->_key = array($ai);
  }

/*********************************************************/
  function setDebug($debug = false) {
   $this->_debug = $debug;
  }

/*********************************************************/

  function setKey($k) {
   if(!is_array($k))
      $this->_key = array($k);
   else
      $this->_key[] = $k;
  }

/*********************************************************/

  function save() {
   $key = "$this->_auto";
   if(!empty($this->$key))
      return $this->update();
   else
      return $this->insert();
  }

/*********************************************************/
  function del() {
    return $this->delete();
  }
  
/*********************************************************/
  function insert() {
   $insert_string = "INSERT INTO $this->_name (#F#) VALUES (#V#)";
   $vars = get_object_vars($this);

   $f = array();
   $v = array();

   foreach($vars as $var => $value) {
     if($var[0] == "_") continue;
     if($var == $this->_auto) continue;

     if(array_key_exists($var,$this->_manytomany)) continue;
     if(array_key_exists($var,$this->_onetomany)) continue;

     $f[] = $var;
     $v[] = "'$value'";
   }
   $insert_string = str_replace("#F#", implode(",", $f), $insert_string);
   $insert_string = str_replace("#V#", implode(",", $v), $insert_string);
   $db  = new DB($this->_debug);
   $ret = $db->execUpdate($insert_string);
   $this->_lastid = $db->lastid;
   return $ret;
  }
/*********************************************************/

  
  function delete() {

   $delete_string = "DELETE FROM  $this->_name WHERE #K#";

   $vars = get_object_vars($this);
   $k = array();
   foreach($vars as $var => $value) {
     if(in_array($var, $this->_key)) {
       $k[] = "$var = '$value'";
     }
   }
   $delete_string = str_replace("#K#", implode(" AND ", $k), $delete_string);

   $db  = new DB($this->_debug);
   return $db->execUpdate($delete_string);

  }
/*********************************************************/
  function load() {
   $select_string = "SELECT * FROM $this->_name WHERE #K#";

   $vars = get_object_vars($this);
   $k = array();
   foreach($vars as $var => $value) {
     if(in_array($var, $this->_key)) {
       $k[] = "$var = '$value'";
     }
   }
   $select_string = str_replace("#K#", implode(" AND ", $k), $select_string);
   $db = new DB($this->_debug);
   $ret = $db->execQuery($select_string);
   $this->fillobject($this, $ret[0]);
   $this->loadOneToMany(implode(" AND ", $k));
   $this->loadManyToMany(implode(" AND ", $k));
  }

  function loadOneToMany($key) {
   foreach($this->_onetomany as $table => $field) {
      $on_clause = array();
      foreach($this->_key as $k) {
        $on_clause[] = " $this->_name.$k = $table.$k ";
       }
       $select_relation_string = "SELECT $table.* FROM $this->_name INNER JOIN $table ON "
                                 . implode(" AND ", $on_clause) . " WHERE $this->_name.$key";

       $db = new DB($this->_debug);
       $rows = $db->execQuery($select_relation_string);
       $f = array();
       foreach($rows as $row) {
         $obj = new $table;
         $f[] = $this->fillobject($obj, $row);
       }
       $this->$field = $f;
     }

  }

  

  function loadManyToMany($key) {
   foreach($this->_manytomany as $table => $field) {

      if(isset($this->_relationtable[$table]))
        $relationtable = $this->_relationtable[$table];
      else
        $relationtable =  $table.$this->_name;
        
   /*      $on_clause = array();
      foreach($this->_key as $k) {
        $on_clause[] = " $this->_name.$k = $relationtable.$k ";
       }*/

       $select_relation_string = "SELECT $table.* FROM $this->_name " .
                                 " INNER JOIN $relationtable ON $relationtable.id$this->_name = $this->_name.id$this->_name ".
                                 " INNER JOIN $table ON $relationtable.id$table = $table.id$table " .
                                 " WHERE $this->_name.$key";

       $db = new DB($this->_debug);
       $rows = $db->execQuery($select_relation_string);
       $f = array();

         foreach($rows as $row) {
            $obj = new $table;
            $f[] = $this->fillobject($obj, $row);
         }

         $this->$field = $f;
     }

  }




  function fillobject(&$obj, $data) {

    $vars = get_class_vars(get_class($obj));

    foreach($vars as $var => $value) {
     if($var[0] == "_") continue;
     $obj->$var = $data[$var];
    }
    return $obj;
  }
/*********************************************************/
  function update() {
   $update_string = "UPDATE $this->_name SET #F# WHERE #K#";

   $vars = get_object_vars($this);
   $f = array();
   $k = array();

   foreach($vars as $var => $value) {

    if($var[0] == "_") continue;
    if(array_key_exists($var,$this->_manytomany)) continue;
    if(array_key_exists($var,$this->_onetomany)) continue;

    if(in_array($var, $this->_key)) {
        $k[] = "$var = '$value'";
     } else {
        $f[] = "$var = '$value'";
     }
   }

   $update_string = str_replace("#F#", implode(",", $f), $update_string);
   $update_string = str_replace("#K#", implode(" AND ", $k), $update_string);

   $db  = new DB($this->_debug);
   return $db->execUpdate($update_string);

  }

/*********************************************************/
  function select($criteria = "", $order = "") {
   if($order == "")
      $orderby = " ORDER BY $this->_auto";
   else
      $orderby = " ORDER BY $order";
   if($criteria == "")
     $select_string = "SELECT * FROM $this->_name $orderby";
   else
     $select_string = "SELECT * FROM $this->_name WHERE $criteria $orderby";

   $db = new DB($this->_debug);
   $rows = $db->execQuery($select_string);
   $obj_arr = array();
   foreach($rows as $row) {
    $obj = new $this->_name;
    foreach($this->_key as $k) {
      $obj->$k = $row[$k];
    }
    $obj->load();
    $obj_arr[] = $obj;
   }
   return $obj_arr;
  }
  
  function execUpdate($query) {
     $db  = new DB($this->_debug);
     $ret = $db->execUpdate($query);
     $this->_lasterror = $db->getLastError();
     return $ret;
  }
  
  function execQuery($query) {
     $db = new DB($this->_debug);
     $ret = $db->execQuery($query);
     $this->_lasterror = $db->getLastError();
     return $ret;

  }
  
  function getLastId(){
    return $this->_lastid;
  }
  function getLastError() 
  {
    return $this->_lasterror;
  }
}

?>
