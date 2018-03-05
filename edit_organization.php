<?php
  $page_title = 'তথ্য পরিবর্তন করুন';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$organization = find_by_id('organizations',(int)$_GET['id']);
$organization_types = find_all('organization_types');
$organization_levels = find_all('organization_levels');
$divisions = find_all('divisions');
$districts = find_all('districts');
$upazilas = find_all('upazilas');
$agencies = find_all('agencies');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';

 if(isset($_POST['update_organization'])){
   if(empty($_POST['name'])){
      $error = true;
      $errors['name'] = "Name is missing";
    }
    if(empty($_POST['name_BN'])){
      $error = true;
      $errors['name_BN'] = "name_BN is missing";
    }

   if(empty($errors)){
    if (isset($_SESSION['user_id'])) {
      $user = find_by_id('users', $_SESSION['user_id']);
  }

  if (isset($user['agency_id'])) {
      $agency_id = $user['agency_id'];
  } else {
      $agency_id = (int) $db->escape($_POST['agency_id']);
  }

  $agency = find_by_id('agencies', $agency_id);
  $name = remove_junk($db->escape($_POST['name']));
  $name_BN = remove_junk($db->escape($_POST['name_BN']));
  $organization_type_id = $_POST['organization_type_id'];
  $organization_type = find_by_id('organization_types', $organization_type_id);
  $organization_level_id = (int)($db->escape($_POST['organization_level_id']));
  $organization_level = find_by_id('organization_levels', $organization_level_id);
  $organization_head_name = remove_junk($db->escape($_POST['organization_head_name']));
  $organization_head_designation = remove_junk($db->escape($_POST['organization_head_designation']));
  $organization_head_phone = remove_junk($db->escape($_POST['organization_head_phone']));
  $organization_head_email = remove_junk($db->escape($_POST['organization_head_email']));
  $address = remove_junk($db->escape($_POST['address']));
  $division_id = (int)($db->escape($_POST['division_id']));
  $division = find_by_id('divisions', $division_id);
  $district_id = (int)($db->escape($_POST['district_id']));
  $district = find_by_id('districts', $district_id);
  $upazila_id = (int)($db->escape($_POST['upazila_id']));
  $upazila = find_by_id('upazilas', $upazila_id);
  $contact_no = remove_junk($db->escape($_POST['contact_no']));
  $web_url = remove_junk($db->escape($_POST['web_url']));
  $facebook_url = remove_junk($db->escape($_POST['facebook_url']));
  $contact_email = remove_junk($db->escape($_POST['contact_email']));
  $address = remove_junk($db->escape($_POST['address']));
    

       $query   = "UPDATE organizations SET";
       $query  .=" name ='{$name}', 
                   name_BN ='{$name_BN}',
                   agency_id ='{$agency_id}',
                   agency_name ='{$agency['name_BN']}',                  
                   organization_type_id ='{$organization_type_id}',
                   organization_type_name ='{$organization_type['name_BN']}',
                   organization_level_id ='{$organization_level_id}',
                   organization_level_name ='{$organization_level['name_BN']}',
                   organization_head_name ='{$organization_head_name}',
                   organization_head_designation ='{$organization_head_designation}',
                   organization_head_phone ='{$organization_head_phone}',
                   organization_head_email ='{$organization_head_email}',                   
                   division_id ='{$division_id}',
                   division_name ='{$division['name_BN']}',
                   district_id ='{$district_id}',
                   district_name ='{$district['name_BN']}',
                   upazila_id ='{$upazila_id}',
                   upazila_name ='{$upazila['name_BN']}',
                   contact_no ='{$contact_no}',
                   contact_email ='{$contact_email}',
                   web_url ='{$web_url}',
                   facebook_url ='{$facebook_url}',
                   contact_email ='{$contact_email}',
                   address ='{$address}'
                   ";

       $query  .=" WHERE id = ". (int)$_GET['id'];
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"project updated ");
                 redirect('organizations.php', false);
               } else {
                 $session->msg('d',' Sorry failed to update!');
                 redirect('edit_organization.php?id='.$organization['id'], false);
               }

   } else{
       foreach($errors as $error) {
            $errmsg .= $error . '<br />';
        }
   }

 }

?>
<?php include_once 'layouts/header.php';?>
<div class="row">
  <div class="col-md-12">
      <?php if ($errmsg != '') { ?>
          <div class="alert alert-danger">
              <?php
echo $errmsg;
} else {
    echo display_msg($msg);
}

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
            <span>প্রতিষ্ঠানের তথ্য</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         <form method="post" action="edit_organization.php?id=<?php echo (int)$organization['id'] ?>">
          <?php if ($user['agency_id'] == null) {?>
            <div class="form-group">
               <div class="row">
                <div class="col-md-4">
                <label for="agency_id">সংস্থা</label>
                    <select class="form-control" name="agency_id">
                    <option value="">Select</option>
                   <?php  foreach ($agencies as $agency): ?>
                     <option value="<?php echo (int)$agency['id']; ?>" <?php if($organization['agency_id'] === $agency['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($agency['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                </div>
                </div>
<?php }?>
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name" value="<?php echo remove_junk($organization['name']);?>">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control"  name="name_BN" value="<?php echo remove_junk($organization['name_BN']);?>">
               </div>
              </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="organization_type_id">প্রতিষ্ঠানের ধরন/ক্যাটাগরী</label>
                <select class="form-control" name="organization_type_id" id="organization_type_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($organization_types as $organization_type): ?>
                   <option value="<?php echo $organization_type['id']; ?>" <?php if($organization['organization_type_id'] === $organization_type['id']): echo "selected"; endif; ?>> <?php echo remove_junk($organization_type['name_BN']); ?></option>
                <?php endforeach;?>
                </select>
                </div>

                  <div class="col-md-4">
                    <label for="organization_level_id">প্রতিষ্ঠানটি'র লেভেল</label>
                    <select class="form-control" name="organization_level_id" id="organization_level_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($organization_levels as $organization_level): ?>
                      <option value="<?php echo $organization_level['id']; ?>" <?php if($organization['organization_level_id'] === $organization_level['id']): echo "selected"; endif; ?>> <?php echo remove_junk($organization_level['name_BN']); ?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
              </div>

           
            <fieldset>
            <legend>প্রতিষ্ঠানের জিও লোকেশন</legend>
            <div class="form-group">
               <div class="row">
               <div class="col-md-2">
                <label for="division_id">বিভাগ</label>
                <select class="form-control" name="division_id" id="division_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($divisions as $division): ?>
                  <option value="<?php echo $division['id']; ?>" <?php if($organization['division_id'] === $division['id']): echo "selected"; endif; ?>> <?php echo remove_junk($division['name_BN']); ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="district_id">জেলা</label>
                <select class="form-control" name="district_id" id="district_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($districts as $district): ?>
                  <option value="<?php echo $district['id']; ?>" <?php if($organization['division_id'] === $district['id']): echo "selected"; endif; ?>> <?php echo remove_junk($district['name_BN']); ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="upazila_id">উপজেলা</label>
                <select class="form-control" name="upazila_id" id="upazila_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($upazilas as $upazila): ?>
                  <option value="<?php echo $upazila['id']; ?>" <?php if($organization['division_id'] === $upazila['id']): echo "selected"; endif; ?>> <?php echo remove_junk($upazila['name_BN']); ?></option>
                <?php endforeach;?>
                </select>
            </div>

            </div>
            </div>
            <div class="form-group">
               <div class="row">
                <div class="col-md-2">      
                     <input type="text" class="form-control" name="latitude" value="<?php echo remove_junk($organization['latitude']);?>">                  
                 </div>
                 <div class="col-md-2">
                     <input type="text" class="form-control" name="longitude" value="<?php echo remove_junk($organization['longitude']);?>">                  
                 </div>
                 </div>
                 </div>
                 </fieldset>
            

            <fieldset>
            <legend>প্রতিষ্ঠানের অনলাইন আইডি</legend>
            <div class="form-group">
               <div class="row">
                <div class="col-md-2">  
                <label for="online_id">অনলাইন আইডি</label>    
                     <input type="text" class="form-control" name="online_id" value="<?php echo remove_junk($organization['online_id']);?>">                  
                 </div>
                 <div class="col-md-4">  
                 <label for="online_id_type">আইডি'র সংশ্লিষ্ট প্ল্যাটফর্মঃ skype/imo/viber</label>    
                     <input type="text" class="form-control" name="online_id_type" value="<?php echo remove_junk($organization['online_id_type']);?>">                  
                 </div>
                 <div class="col-md-2">  
                 <label for="organization_head_name">ওয়েবসাইট</label>    
                     <input type="text" class="form-control" name="web_url" value="<?php echo remove_junk($organization['web_url']);?>">                  
                 </div>
                 <div class="col-md-4"> 
                 <label for="facebook_url">ফেসবুক পেজ</label>     
                     <input type="text" class="form-control" name="facebook_url"  value="<?php echo remove_junk($organization['facebook_url']);?>">                  
                 </div>
                 </div>
                 </div>

                 <div class="form-group">
               <div class="row">
                 <div class="col-md-2"> 
                 <label for="contact_no">যোগাযোগের নম্বর</label>     
                     <input type="text" class="form-control" name="contact_no" value="<?php echo remove_junk($organization['contact_no']);?>">                  
                 </div>
                 <div class="col-md-2">
                 <label for="contact_email">ইমেইল</label>      
                     <input type="text" class="form-control" name="contact_email" value="<?php echo remove_junk($organization['contact_email']);?>">                  
                 </div>
                </div>
            </div>
            </fieldset>


              <fieldset>
                <legend>প্রতিষ্ঠান প্রধানের তথ্য</legend>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                 <label for="organization_head_name">নাম</label>      
                     <input type="text" class="form-control" name="organization_head_name" value="<?php echo remove_junk($organization['organization_head_name']);?>">                  
                 </div>
                 <div class="col-md-2">
                 <label for="organization_head_designation">পদবী</label>
                     <input type="text" class="form-control" name="organization_head_designation" value="<?php echo remove_junk($organization['organization_head_designation']);?>">                  
                 </div>
                  <div class="col-md-2">
                  <label for="organization_head_phone">মোবাইল</label>
                      <input type="text" class="form-control" name="organization_head_phone" value="<?php echo remove_junk($organization['organization_head_phone']);?>">                
                  </div>                            
                  <div class="col-md-2">
                  <label for="organization_head_email">ইমেইল</label>
              <input type="text" class="form-control" name="organization_head_email" value="<?php echo remove_junk($organization['organization_head_email']);?>">  
              </div>
               </div>
              </div>             
        </fieldset>  
        
        
        <div class="form-group">
            <div class="row">
              <div class="col-md-8">
              <label for="address">ঠিকানা</label>
              <textarea class="form-control" name="address"> <?php echo remove_junk($organization['address']);?> </textarea>
              </div>
            </div>                 
        </div>


              <div class="form-group">
              <div class="row">
              <div class="col-md-4">
              <button type="submit" name="update_organization" class="btn btn-success">সাবমিট করুন</button>
              </div>
              </div>
              </div>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once 'layouts/footer.php';?>
  
  <script type="text/javascript">
      $(document).ready(function() {
        $('[name="agency_id"]').select2();
        $('[name="division_id"]').select2();
        $('[name="district_id"]').select2();
        $('[name="upazila_id"]').select2();
        $('[name="organization_type_id"]').select2();
        $('[name="organization_level_id"]').select2();
        CKEDITOR.replace( 'address' );
});
  </script>
