<?php
  $page_title = 'Edit Project';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);

  $partner = find_by_id('partners',(int)$_GET['id']);
  $agencies = find_all('agencies');

  $error = false;
  $errors  = array();
  $errmsg  = '';

 if(isset($_POST['update_project'])){
   if(empty($_POST['name'])){
      $error = true;
      $errors['name'] = "Name is missing";
    }
    if(empty($_POST['name_BN'])){
      $error = true;
      $errors['name_BN'] = "name_BN is missing";
    }

   if(empty($errors)){
    $name  = remove_junk($db->escape($_POST['name']));
    $name_BN   = remove_junk($db->escape($_POST['name_BN']));
    $partner_head_name   = remove_junk($db->escape($_POST['partner_head_name']));
    $partner_head_phone   = remove_junk($db->escape($_POST['partner_head_phone']));
    $partner_head_email  = remove_junk($db->escape($_POST['partner_head_email']));
    $address  = remove_junk($db->escape($_POST['address']));
    

       $query   = "UPDATE partners SET";
       $query  .=" name ='{$name}', 
                   name_BN ='{$name_BN}',
                   partner_head_name ='{$partner_head_name}',                                      
                   partner_head_phone ='{$partner_head_phone}',
                   partner_head_email ='{$partner_head_email}',
                   address ='{$address}'
                   ";

       $query  .=" WHERE id = ". (int)$_GET['id'];
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"partners updated ");
                 redirect('partner.php', false);
               } else {
                 $session->msg('d',' Sorry failed to update!');
                 redirect('edit_partner.php?id='.$partner['id'], false);
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
         <form method="post" action="edit_partner.php?id=<?php echo (int)$partner['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name" value="<?php echo remove_junk($partner['name']);?>">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name_BN" value="<?php echo remove_junk($partner['name_BN']);?>">
               </div>
              </div>

               <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_name">প্রধান ব্যক্তি'র নাম</label>
                <input type="text" class="form-control" name="partner_head_name" value="<?php echo remove_junk($partner['partner_head_name']);?>">
              </div>
               </div>                 
               </div>

              <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_phone">প্রধান ব্যক্তি'র ফোন</label>
                <input type="text" class="form-control" name="partner_head_phone" value="<?php echo remove_junk($partner['partner_head_phone']);?>">
              </div>
               </div>                 
               </div>

              <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <label for="partner_head_email">প্রধান ব্যক্তি'র ইমেইল</label>
                <input type="text" class="form-control" name="partner_head_email" value="<?php echo remove_junk($partner['partner_head_email']);?>">
              </div>
               </div>                 
               </div>

            <div class="form-group">
               <div class="row">
               <div class="col-md-8">
                <label for="address">ঠিকানা</label>
                <input type="text" class="form-control"  name="address" value="<?php echo remove_junk($partner['address']);?>">
            </div>
          </div>
          </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">  
              <button type="submit" name="update_project" class="btn btn-success">Update</button>
              </div>
               </div>                 
               </div>
          </form>


<?php include_once('layouts/footer.php'); ?>
