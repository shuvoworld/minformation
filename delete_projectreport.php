<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $project = find_by_id('project_reports',(int)$_GET['id']);
  if(!$project){
    $session->msg("d","Missing Report id.");
    redirect('projectreports.php');
  }
?>
<?php
  $delete_id = delete_by_id('project_reports',(int)$project['id']);
  if($delete_id){
      $session->msg("s","Report deleted.");
      redirect('projectreports.php');
  } else {
      $session->msg("d","Report deletion failed.");
      redirect('projectreports.php');
  }
?>
