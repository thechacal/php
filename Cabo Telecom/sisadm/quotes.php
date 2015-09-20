<?

function arrayStripSlashes(&$array) {
  foreach($array as &$value) {
    if (is_array($value)) {
      arrayStripSlashes($value);
    } else {
      $value = stripslashes($value);
    }
  }
}

function arrayAddSlashes(&$array) {
  foreach($array as &$value) {
    if (is_array($value)) {
      arrayAddSlashes($value);
    } else {
      $value = addslashes($value);
    }
  }
}

if (!get_magic_quotes_gpc()) {
  arrayAddSlashes($_POST);
  arrayAddSlashes($_GET);
  arrayAddSlashes($_COOKIE);
  arrayAddSlashes($_REQUEST);
}

?>