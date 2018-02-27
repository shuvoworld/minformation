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
        $month_id = remove_junk($db->escape($_POST['month_id']));
        $month = find_by_id('months', $month_id);
        $year_id = remove_junk($db->escape($_POST['year_id']));
        $year = find_by_id('years', $year_id);
        $project_id = remove_junk($db->escape($_POST['project_id']));
        $project = find_by_id('projects', $project_id);
        $other_name = remove_junk($db->escape($_POST['other_name']));
        $beneficiaries = (int) $db->escape($_POST['beneficiaries']);
        $is_training = (int) $db->escape($_POST['is_training']);
        $implementing_body = remove_junk($db->escape($_POST['implementing_body']));
        $note = $db->escape($_POST['note']);

        $query = "INSERT INTO project_reports (";
        $query .= " agency_id,agency_name,month_id,month_name,year_id,year_name, project_id, project_name,other_name,is_training,implementing_body, beneficiaries, note, is_active, created_at";
        $query .= ") VALUES (";
        $query .= " '{$agency_id}', '{$agency['name_BN']}','{$month_id}','{$month['name_BN']}','{$year_id}', '{$year['name_BN']}','{$project_id}','{$project['name']}','{$other_name}', '{$is_training}','{$implementing_body}', '{$beneficiaries}', '{$note}', 1, now()";
        $query .= ")";
        if ($db->query($query)) {
            $session->msg('s', "প্রকল্পের তথ্য যোগ করা হয়েছে ");
            redirect('projectreports.php', false);
        } else {
            $session->msg('d', ' Sorry failed to added!');
            redirect('add_project_report.php', false);
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
                <label for="agency_id">প্রতিবেদনাধিন সংস্থা</label>
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
                <label for="month_id">প্রতিষ্ঠানের ধরন/ক্যাটাগরী</label>
                <select class="form-control" name="organization_type_id" id="organization_type_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($organization_types as $organization_type): ?>
                   <option value="<?php echo $organization_type['id']; ?>"><?php echo $organization_type['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
                </div>

                  <div class="col-md-4">
                    <label for="year_id">প্রতিষ্ঠানটি'র লেভেল</label>
                    <select class="form-control" name="organization_level_id" id="organization_level_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($organization_levels as $organization_level): ?>
                        <option value="<?php echo $organization_level['id']; ?>"><?php echo $organization_level['name_BN']; ?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
              </div>

            <div class="form-group">
               <div class="row">
               <div class="col-md-2">
                <label for="project_id">বিভাগ</label>
                <select class="form-control" name="division_id" id="division_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($divisions as $division): ?>
                   <option value="<?php echo $division['id']; ?>"><?php echo $division['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="project_id">জেলা</label>
                <select class="form-control" name="district_id" id="district_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($districts as $district): ?>
                   <option value="<?php echo $district['id']; ?>"><?php echo $district['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="project_id">উপজেলা</label>
                <select class="form-control" name="upazila_id" id="upazila_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($upazilas as $upazila): ?>
                   <option value="<?php echo $upazila['id']; ?>"><?php echo "জেলাঃ ". $upazila['district_name_BN'] . " >> উপজেলাঃ " . $upazila['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
            </div>

            </div>
            </div>

           
              <fieldset>
                <legend>প্রতিষ্ঠান প্রধানের তথ্য</legend>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">      
                     <input type="text" class="form-control" name="organization_head_name" placeholder="নাম">                  
                 </div>
                 <div class="col-md-4">
                     <input type="text" class="form-control" name="organization_head_designation" placeholder="পদবী">                  
                 </div>
                  <div class="col-md-4">
                      <input type="text" class="form-control" name="organization_head_phone_no" placeholder="মোবাইল">                
                  </div>                            
               </div>
              </div>             
          <div class="form-group">
               <div class="row">
              <div class="col-md-4">
              <input type="text" class="form-control" name="organization_head_email" placeholder="ইমেইল">  
              </div>
               </div>                 
               </div>
              </div>
              </fieldset>  

              <button type="submit" name="add_organization" class="btn btn-success">সাবমিট করুন</button>
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
});
  </script>








