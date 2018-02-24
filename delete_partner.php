<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $partner = find_by_id('partners',(int)$_GET['id']);
  if(!$partner){
    $session->msg("d","Missing Partner id.");
    redirect('partner.php');
  }
?>
<?php
  $delete_id = delete_by_id('partners',(int)$partner['id']);
  if($delete_id){
      $session->msg("s","Partner deleted.");
      redirect('partner.php');
  } else {
      $session->msg("d","Partner deletion failed.");
      redirect('partner.php');
  }
?>
