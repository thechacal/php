<?
class mantis_bug_table extends persistence {
var $id;
var $project_id;
var $reporter_id;
var $handler_id;
var $duplicate_id;
var $priority;
var $severity;
var $reproducibility;
var $status;
var $resolution;
var $projection;
var $category;
var $date_submitted;
var $last_updated;
var $eta;
var $bug_text_id;
var $os;
var $os_build;
var $platform;
var $version;
var $fixed_in_version;
var $build;
var $profile_id;
var $view_state;
var $summary;
var $sponsorship_total;
var $sticky;

  function mantis_bug_table() {
    parent::persistence();
    $this->setAutoIncrement('id');
  }


}
?>
