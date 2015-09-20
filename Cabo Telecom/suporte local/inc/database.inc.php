<?
class DB {
  var $db;
  var $debug;
  var $lastid;
  var $lasterror;

  function DB($debug = false) {
    $this->debug = $debug;
  	$this->db = ADONewConnection(DB_TYPE);
  }
  
  function execQuery($query) {
    $this->db->debug = $this->debug;
    $this->db->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  	$rs = $this->db->Execute($query);

  	if(!$rs) {
          $this->lasterror = $this->db->ErrorMsg();
          return false;
        }
    return $rs->GetRows();
  }
  
  function execUpdate($query) {
    $this->db->debug = $this->debug;
    $this->db->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->db->Execute($query);
    $this->lasterror = $this->db->ErrorMsg();

  	if(eregi("^insert", $query)) {
     	$er = preg_split("/\s+/", $query);
        $nf = $er[2];
        $er = preg_split("/\(/", $nf);
        if(DB_TYPE == "postgres")
          $this->lastid = (int)$this->db->pg_insert_id($er[0], "id$er[0]" );
        else
          $this->lastid = (int)$this->db->_insertid();
    }

    return $this->db->Affected_Rows();
  }
  

  function close() {
    $this->db->Close();
  }

 function getLastError()
 {
   return $this->lasterror;
 } 

}
?>
