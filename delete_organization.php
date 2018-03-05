<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $project = find_by_id('organizations',(int)$_GET['id']);
  if(!$project){
    $session->msg("d","Missing organization id.");
    redirect('organizations.php');
  }
?>
<?php
  $delete_id = delete_by_id('organizations',(int)$project['id']);
  if($delete_id){
      $session->msg("s","organization deleted.");
      redirect('organizations.php');
  } else {
      $session->msg("d","organization deletion failed.");
      redirect('organizations.php');
  }
?>
