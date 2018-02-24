<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors)){
  $user_id = authenticate($username, $password);
  if($user_id){
    //create session with id
     $session->login($user_id);
    //Update Sign in time
     updateLastLogIn($user_id);
     $session->msg("s", "তথ্য হালনাগাদকরন সফটওয়্যারে আপনাকে স্বাগতম");
     redirect('home.php',false);

  } else {
    $session->msg("d", "দুঃখিত, সঠিক লগইন আইডি এবং পাসওয়ার্ড প্রদান করুন!");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}

?>
