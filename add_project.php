<?php
  $page_title = 'Add Project';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $agencies = find_all('agencies');
  $partners = find_all('partners');
  $types = find_all('project_types');
  $months = find_all('months');
  $years = find_all('years');
  $maintypes = find_all('project_maintypes');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';
 if(isset($_POST['add_project'])){
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
     $project_director_name   = remove_junk($db->escape($_POST['project_director_name']));
     $project_director_designation   = remove_junk($db->escape($_POST['project_director_designation']));
     $project_director_phone_no  = remove_junk($db->escape($_POST['project_director_phone_no']));
     $project_director_email  = remove_junk($db->escape($_POST['project_director_email']));
     $agency_id = (int)$db->escape($_POST['agency_id']);
     $agency = find_by_id('agencies', $agency_id);
     $partner_id = (int)$db->escape($_POST['partner_id']);
     $partner = find_by_id('partners', $partner_id);
     $start_month_id      = (int)$db->escape($_POST['start_month_id']);
     $start_month = find_by_id('years', $start_month_id);
     $start_year_id      = (int)$db->escape($_POST['start_year_id']);
     $start_year = find_by_id('years', $start_year_id);
     $end_month_id      = (int)$db->escape($_POST['end_month_id']);
     $end_month = find_by_id('years', $end_month_id);
     $end_year_id      = (int)$db->escape($_POST['end_year_id']);
     $end_year = find_by_id('years', $end_year_id);
     $type_id = (int)$db->escape($_POST['type_id']);
     $type = find_by_id('project_types', $type_id);
     $main_type_id = (int)$db->escape($_POST['main_type_id']);
     $maintype = find_by_id('project_maintypes', $main_type_id);


     $query  = "INSERT INTO projects (";
     $query .=" name,name_BN,type_id,type_BN,main_type_id, main_type_BN,agency_id,agency_name,partner_id,partner_name,project_director_name, project_director_designation, project_director_phone_no, project_director_email, start_month_id, end_month_id, start_year_id, end_year_id,start_month_name, end_month_name, start_year_name, end_year_name, is_active";
     $query .=") VALUES (";
     $query .=" '{$name}', '{$name_BN}', '{$type_id}','{$type['name_BN']}', '{$main_type_id}','{$maintype['name_BN']}', '{$agency_id}','{$agency['name_BN']}','{$partner_id}','{$partner['name_BN']}','{$project_director_name}', '{$project_director_designation}', '{$project_director_phone_no}', '{$project_director_email}', '{$start_month_id}', '{$end_month_id}', '{$start_year_id}', '{$end_year_id}',  '{$start_month['name_BN']}', '{$end_month['name_BN']}', '{$start_year['name_BN']}', '{$end_year['name_BN']}', 1";
     $query .=")";
     if($db->query($query)){
       $session->msg('s',"Project added ");
       redirect('project.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('project.php', false);
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
            <span>Add New Project</span>
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
                  <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"  placeholder="Name">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control"  name="name_BN" placeholder="Name (Bengali)">
               </div>
              </div>

               <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="agency_id">মন্ত্রনালয়/দপ্তর/সংস্থা</label>
                <select class="form-control" name="agency_id">
                  <?php foreach ($agencies as $agency ):?>
                   <option value="<?php echo $agency['id'];?>"><?php echo $agency['name_BN'];?></option>
                <?php endforeach;?>
                </select>
            </div>
            </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="partner_id">বাস্তবায়নকারী কতৃপক্ষ</label>
                <select class="form-control" name="partner_id">
                  <?php foreach ($partners as $partner ):?>
                   <option value="<?php echo $partner['id'];?>"><?php echo $partner['name_BN'];?></option>
                <?php endforeach;?>
                </select>
            </div>
            </div>
            </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                  <label for="type_id">রাজস্ব/উন্নয়ন</label>
                    <select class="form-control" name="type_id">
                      <option value="">নির্বাচন করুন</option>
                      <?php foreach ($types as $type ):?>
                   <option value="<?php echo $type['id'];?>"><?php echo $type['name_BN'];?></option>
                <?php endforeach;?>
                </select>
                  </div></div></div>
                  <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                  <label for="main_type_id">প্রকল্প/কর্মসুচি</label>
                    <select class="form-control" name="main_type_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($maintypes as $maintype ):?>
                   <option value="<?php echo $maintype['id'];?>"><?php echo $maintype['name_BN'];?></option>
                <?php endforeach;?>
                    </select>
                  </div>
                </div>
              </div>
            <fieldset>
              <legend>প্রকল্প/কর্মসুচি'র মেয়াদকাল</legend>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">  
                 <select class="form-control" name="start_month_id">
                    <option value="">শুরু'র মাস নির্বাচন করুন</option>
                      <?php foreach ($months as $month ):?>
                   <option value="<?php echo $month['id'];?>"><?php echo $month['name_BN'];?></option>
                <?php endforeach;?>
                    </select>               
                 </div>
                 <div class="col-md-4">    
                 <select class="form-control" name="start_year_id">
                    <option value="">শুরু'র বছর নির্বাচন করুন</option>
                      <?php foreach ($years as $year ):?>
                   <option value="<?php echo $year['id'];?>"><?php echo $year['name_BN'];?></option>
                <?php endforeach;?>
                    </select>                    
                 </div>                
               </div>
              </div>    

               <div class="form-group">
               <div class="row">
                 <div class="col-md-4">  
                 <select class="form-control" name="end_month_id">
                    <option value="">শেষ হওয়ার মাস নির্বাচন করুন</option>
                      <?php foreach ($months as $month ):?>
                   <option value="<?php echo $month['id'];?>"><?php echo $month['name_BN'];?></option>
                <?php endforeach;?>
                    </select>               
                 </div>
                 <div class="col-md-4">    
                 <select class="form-control" name="end_year_id">
                    <option value="">শেষ হওয়ার বছর নির্বাচন করুন</option>
                      <?php foreach ($years as $year ):?>
                   <option value="<?php echo $year['id'];?>"><?php echo $year['name_BN'];?></option>
                <?php endforeach;?>
                    </select>                    
                 </div>                
               </div>
              </div>    

            </fieldset>
              <fieldset>
                <legend>প্রকল্প/কর্মসুচি পরিচালকের তথ্য</legend>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">      
                     <input type="text" class="form-control" name="project_director_name" placeholder="নাম">                  
                 </div>
                 <div class="col-md-4">
                     <input type="text" class="form-control" name="project_director_designation" placeholder="পদবী">                  
                 </div>
                  <div class="col-md-4">
                      <input type="text" class="form-control" name="project_director_phone_no" placeholder="মোবাইল">                
                  </div>                 
               </div>
              </div>             
          <div class="form-group">
               <div class="row">
              <div class="col-md-4">
                      <input type="text" class="form-control" name="project_director_email" placeholder="ইমেইল">
              </div>
               </div>                 
               </div>
              </div>
              </fieldset>  
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">  
              <button type="submit" name="add_project" class="btn btn-success">Add Project</button>
              </div>
               </div>                 
               </div>
          </form>


<?php include_once('layouts/footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
        $('[name="agency_id"]').select2();
        $('[name="partner_id"]').select2();
        $('[name="main_type_id"]').select2();
        $('[name="type_id"]').select2();
        $('[name="start_month_id"]').select2();
        $('[name="start_year_id"]').select2();
        $('[name="end_month_id"]').select2();
        $('[name="end_year_id"]').select2();
});
</script>
