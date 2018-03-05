<?php
$page_title = 'প্রতিষ্ঠানের তথ্য যোগ করুন';
require_once 'includes/load.php';
// Checkin What level user has permission to view this page
page_require_level(2);
$organization_types = find_all('organization_types');
$organization_levels = find_all('organization_levels');
$divisions = find_all('divisions');
$districts = find_all('districts');
$upazilas = find_all('upazilas');
$agencies = find_all('agencies');
$error = false;
$errors = array();
$errmsg = '';
if (isset($_POST['add_organization'])) {
    if (empty($_POST['name'])) {
        $error = true;
        $errors['name'] = "প্রতিষ্ঠানের নাম লিখুন";
    }
    
    if (empty($_POST['name'])) {
        $error = true;
        $errors['name_BN'] = "প্রতিষ্ঠানের বাংলা নাম লিখুন";
    }

    if ($error == false) {

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

        $query = "INSERT INTO organizations (";
        $query .= " name, name_BN, agency_id, agency_name, organization_type_id, organization_type_name, organization_level_id, organization_level_name, organization_head_name, organization_head_designation, organization_head_phone,
        organization_head_email, address, division_id, division_name, district_id, district_name, upazila_id, upazila_name, contact_no, web_url, facebook_url, contact_email,latitude,longitude,online_id,online_id_type, is_active, created_at";
        $query .= ") VALUES (";
        $query .= " '{$name}', '{$name_BN}', '{$agency_id}', '{$agency['name_BN']}','{$organization_type_id}', '{$organization_type['name_BN']}', '{$organization_level_id}', '{$organization_level['name_BN']}', '{$organization_head_name}','{$organization_head_designation}', '{$organization_head_phone}',
        '{$organization_head_email}', '{$address}', '{$division_id}', '{$division['name_BN']}', '{$district_id}', '{$district['name_BN']}', '{$upazila_id}', '{$upazila['name_BN']}', '{$contact_no}', '{$web_url}', '{$facebook_url}', '{$contact_email}', '{$latitude}', '{$longitude}', '{$online_id}', '{$online_id_type}', 1, now()";
        $query .= ")";
        if ($db->query($query)) {
            $session->msg('s', "প্রকল্পের তথ্য যোগ করা হয়েছে ");
            redirect('organizations.php', false);
        } else {
            $session->msg('d', ' Sorry failed to added!');
            redirect('add_organization.php', false);
        }

    } else {
        foreach ($errors as $error) {
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
          <form method="POST" action="add_organization.php" class="clearfix">
          <?php if ($user['agency_id'] == null) {?>
            <div class="form-group">
               <div class="row">
                <div class="col-md-4">
                <label for="agency_id">সংস্থা</label>
                <select class="form-control" name="agency_id" id="agency_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($agencies as $agency): ?>
                   <option value="<?php echo $agency['id']; ?>"><?php echo $agency['name_BN']; ?></option>
                <?php endforeach;?>
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
                  <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"  placeholder="ইংরেজি নাম লিখুন">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control"  name="name_BN" value="<?php if(isset($_POST['name_BN'])) echo $_POST['name_BN']; ?>" placeholder="বাংলা নাম লিখুন">
               </div>
              </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="organization_type_id">প্রতিষ্ঠানের ধরন/ক্যাটাগরী</label>
                <select class="form-control" name="organization_type_id" id="organization_type_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($organization_types as $organization_type): ?>
                   <option value="<?php echo $organization_type['id']; ?>"><?php echo $organization_type['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
                </div>

                  <div class="col-md-4">
                    <label for="organization_level_id">প্রতিষ্ঠানটি'র লেভেল</label>
                    <select class="form-control" name="organization_level_id" id="organization_level_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($organization_levels as $organization_level): ?>
                        <option value="<?php echo $organization_level['id']; ?>"><?php echo $organization_level['name_BN']; ?></option>
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
                   <option value="<?php echo $division['id']; ?>"><?php echo $division['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="district_id">জেলা</label>
                <select class="form-control" name="district_id" id="district_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($districts as $district): ?>
                   <option value="<?php echo $district['id']; ?>"><?php echo $district['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="upazila_id">উপজেলা</label>
                <select class="form-control" name="upazila_id" id="upazila_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($upazilas as $upazila): ?>
                   <option value="<?php echo $upazila['id']; ?>"><?php echo "জেলাঃ ". $upazila['district_name_BN'] . " >> উপজেলাঃ " . $upazila['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>

            </div>
            </div>
            <div class="form-group">
               <div class="row">
                <div class="col-md-2">      
                     <input type="text" class="form-control" name="latitude" placeholder="Latitude">                  
                 </div>
                 <div class="col-md-2">
                     <input type="text" class="form-control" name="longitude" placeholder="Longitude">                  
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
                     <input type="text" class="form-control" name="online_id" value="<?php if(isset($_POST['online_id'])) echo $_POST['online_id']; ?>">                  
                 </div>
                 <div class="col-md-4">  
                 <label for="online_id_type">আইডি'র সংশ্লিষ্ট প্ল্যাটফর্মঃ skype/imo/viber</label>    
                     <input type="text" class="form-control" name="online_id_type" value="<?php if(isset($_POST['online_id_type'])) echo $_POST['online_id_type']; ?>">                  
                 </div>
                 <div class="col-md-2">  
                 <label for="organization_head_name">ওয়েবসাইট</label>    
                     <input type="text" class="form-control" name="web_url" value="<?php if(isset($_POST['organization_head_name'])) echo $_POST['organization_head_name']; ?>">                  
                 </div>
                 <div class="col-md-4"> 
                 <label for="facebook_url">ফেসবুক পেজ</label>     
                     <input type="text" class="form-control" name="facebook_url"  value="<?php if(isset($_POST['facebook_url'])) echo $_POST['facebook_url']; ?>">                  
                 </div>
                 </div>
                 </div>

                 <div class="form-group">
               <div class="row">
                 <div class="col-md-2"> 
                 <label for="contact_no">যোগাযোগের নম্বর</label>     
                     <input type="text" class="form-control" name="contact_no" value="<?php if(isset($_POST['contact_no'])) echo $_POST['contact_no']; ?>">                  
                 </div>
                 <div class="col-md-2">
                 <label for="contact_email">ইমেইল</label>      
                     <input type="text" class="form-control" name="contact_email" value="<?php if(isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>">                  
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
                     <input type="text" class="form-control" name="organization_head_name" value="<?php if(isset($_POST['organization_head_name'])) echo $_POST['organization_head_name']; ?>">                  
                 </div>
                 <div class="col-md-2">
                 <label for="organization_head_designation">পদবী</label>
                     <input type="text" class="form-control" name="organization_head_designation" value="<?php if(isset($_POST['organization_head_designation'])) echo $_POST['organization_head_designation']; ?>">                  
                 </div>
                  <div class="col-md-2">
                  <label for="organization_head_phone">মোবাইল</label>
                      <input type="text" class="form-control" name="organization_head_phone">                
                  </div>                            
                  <div class="col-md-2">
                  <label for="organization_head_email">ইমেইল</label>
              <input type="text" class="form-control" name="organization_head_email" value="<?php if(isset($_POST['organization_head_designation'])) echo $_POST['organization_head_designation']; ?>">  
              </div>
               </div>
              </div>             
        </fieldset>  
        
        
        <div class="form-group">
            <div class="row">
              <div class="col-md-8">
              <label for="address">ঠিকানা</label>
              <textarea class="form-control" name="address"> <?php if(isset($_POST['address'])) echo $_POST['address']; ?> </textarea>
              </div>
            </div>                 
        </div>


              <div class="form-group">
              <div class="row">
              <div class="col-md-4">
              <button type="submit" name="add_organization" class="btn btn-success">সাবমিট করুন</button>
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








