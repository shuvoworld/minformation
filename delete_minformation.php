<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $project = find_by_id('minformations',(int)$_GET['id']);
  if(!$project){
    $session->msg("d","Missing Report id.");
    redirect('minformation.php');
  }
?>
<?php
  $delete_id = delete_by_id('minformations',(int)$project['id']);
  if($delete_id){
      $session->msg("s","Report deleted.");
      redirect('minformation.php');
  } else {
      $session->msg("d","Report deletion failed.");
      redirect('minformation.php');
  }
?>
