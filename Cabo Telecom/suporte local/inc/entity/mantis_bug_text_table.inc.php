<?
class mantis_bug_text_table extends persistence {
var $id;
var $description;
var $steps_to_reproduce;
var $additional_information;

  function mantis_bug_text_table() {
    parent::persistence();
    $this->setAutoIncrement('id');
  }


}
?>