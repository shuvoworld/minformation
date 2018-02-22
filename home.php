<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
  $users  = find_by_id('users', $_SESSION['user_id']);
  $agency = find_by_id('agencies', $users['agency_id']);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h2>মাসিক তথ্য হালনাগাদ করার জন্য আপনাকে স্বাগতম <?php echo $agency['name_BN'] ?></h2>
         <p>বাম পাশের মেনু থেকে রিপোর্ট দাখিল করা শুরু করুন।</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
