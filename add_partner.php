<?php
  $page_title = 'Add Partner';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $agencies = find_all('agencies');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';
 if(isset($_POST['add_partner'])){
   // $req_fields = array('name','name_BN','start_date','end_date');
   // validate_fields($req_fields);

    if(empty($_POST['name'])){
      $error = true;
      $errors['name'] = "Name is missing";
    }
    if(empty($_POST['name_BN'])){
      $error = true;
      $errors['name_BN'] = "name_BN is missing";
    }

   if($error == false){
     $name  = remove_junk($db->escape($_POST['name']));
     $name_BN   = remove_junk($db->escape($_POST['name_BN']));
     $partner_head_name   = remove_junk($db->escape($_POST['partner_head_name']));
     $partner_head_phone   = remove_junk($db->escape($_POST['partner_head_phone']));
     $partner_head_email  = remove_junk($db->escape($_POST['partner_head_email']));
     $address  = remove_junk($db->escape($_POST['address']));


     $query  = "INSERT INTO partners (";
     $query .=" name,name_BN,partner_head_name,partner_head_phone,partner_head_email,address, is_active";
     $query .=") VALUES (";
     $query .=" '{$name}', '{$name_BN}','{$partner_head_name}','{$partner_head_phone}','{$partner_head_email}','{$address}',  1";
     $query .=")";
     if($db->query($query)){
       $session->msg('s',"Partner added ");
       redirect('partner.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('partner.php', false);
     }

   } else{
     foreach($errors as $error) {
            $errmsg .= $error . '<br />';
        }
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
      <?php if ($errmsg != '') { ?>
          <div class="alert alert-danger">
              <?php 
      echo $errmsg; 
        }
        else
          echo display_msg($msg);
        ?>
          </div>
      
  </div>
</div>
  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>বাস্তবায়নকারী সংস্থা যোগ করুন</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"  placeholder="বাস্তবায়নকারী সংস্থা'র নাম">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control"  name="name_BN" placeholder="বাস্তবায়নকারী সংস্থা'র নাম (বাংলায়)">
               </div>
              </div>

           <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_name">প্রধান ব্যক্তি'র নাম</label>
                <input type="text" class="form-control" name="partner_head_name">
              </div>
               </div>                 
               </div>

              <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_phone">প্রধান ব্যক্তি'র ফোন</label>
                <input type="text" class="form-control" name="partner_head_phone">
              </div>
               </div>                 
               </div>

              <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_email">প্রধান ব্যক্তি'র ইমেইল</label>
                <input type="text" class="form-control" name="partner_head_email">
              </div>
               </div>                 
               </div>

            <div class="form-group">
               <div class="row">
               <div class="col-md-8">
                <label for="address">ঠিকানা</label>
                <input type="text" class="form-control"  name="address">
            </div>
          </div>
          </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-8">  
              <button type="submit" name="add_partner" class="btn btn-success">সাবমিট করুন</button>
              </div>
               </div>                 
               </div>
          </form>


<?php include_once('layouts/footer.php'); ?>
