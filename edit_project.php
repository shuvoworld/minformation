<?php
  $page_title = 'Edit Project';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$project = find_by_id('projects',(int)$_GET['id']);
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
    

       $query   = "UPDATE projects SET";
       $query  .=" name ='{$name}', 
                   name_BN ='{$name_BN}',
                   type_id ='{$type_id}',                   
                   type_BN ='{$type['name_BN']}',
                   main_type_id ='{$main_type_id}',
                   main_type_BN ='{$maintype['name_BN']}',
                   project_director_name ='{$project_director_name}',
                   project_director_designation ='{$project_director_designation}',
                   project_director_phone_no ='{$project_director_phone_no}',
                   project_director_email ='{$project_director_email}',
                   agency_id ='{$agency_id}',
                   agency_name ='{$agency['name_BN']}',
                   partner_id ='{$partner_id}',
                   partner_name ='{$partner['name_BN']}',
                   start_month_id ='{$start_month_id}',
                   end_month_id ='{$end_month_id}',
                   start_year_id ='{$start_year_id}',
                   start_year_id ='{$start_year_id}',
                   start_month_name ='{$start_month['name_BN']}',
                   end_month_name ='{$end_month['name_BN']}',
                   start_year_name ='{$start_year['name_BN']}',
                   end_year_name ='{$end_year['name_BN']}'
                   ";

       $query  .=" WHERE id = ". (int)$_GET['id'];
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"project updated ");
                 redirect('project.php', false);
               } else {
                 $session->msg('d',' Sorry failed to update!');
                 redirect('edit_project.php?id='.$project['id'], false);
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
            <span>Add New Project</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
         <form method="post" action="edit_project.php?id=<?php echo (int)$project['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name" value="<?php echo remove_junk($project['name']);?>">
                </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="name_BN" value="<?php echo remove_junk($project['name_BN']);?>">
               </div>
              </div>

               <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="agency_id">মন্ত্রনালয়/দপ্তর/সংস্থা</label>
                <select class="form-control" name="agency_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($agencies as $agency ):?>
                  <option value="<?php echo (int)$agency['id']; ?>" <?php if($project['agency_id'] === $agency['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($agency['name_BN']); ?></option>
                <?php endforeach;?>
                </select>
            </div>
            </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="agency_id">বাস্তবায়নকারী কতৃপক্ষ</label>                
                <select class="form-control" name="partner_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($partners as $partner ):?>
                  <option value="<?php echo (int)$partner['id']; ?>" <?php if($project['partner_id'] === $partner['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($partner['name_BN']); ?></option>
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
                      <option value="<?php echo (int)$type['id']; ?>" <?php if($project['type_id'] === $type['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($type['name_BN']); ?></option>
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
                      <option value="<?php echo (int)$maintype['id']; ?>" <?php if($project['main_type_id'] === $maintype['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($maintype['name_BN']); ?></option>
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
                  <option value="<?php echo (int)$month['id']; ?>" <?php if($project['start_month_id'] === $month['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($month['name_BN']); ?></option>
                <?php endforeach;?>
                </select>              
                 </div>
                 <div class="col-md-4">    
                 <select class="form-control" name="start_year_id">
                    <option value="">শুরু'র বছর নির্বাচন করুন</option>
                    <?php foreach ($years as $year ):?>
                  <option value="<?php echo (int)$year['id']; ?>" <?php if($project['start_year_id'] === $year['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($year['name_BN']); ?></option>
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
                    <option value="<?php echo (int)$month['id']; ?>" <?php if($project['end_month_id'] === $month['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($month['name_BN']); ?></option>
                <?php endforeach;?>
                </select>              
                 </div>
                 <div class="col-md-4">    
                 <select class="form-control" name="end_year_id">
                    <option value="">শেষ হওয়ার বছর নির্বাচন করুন</option>
                    <?php foreach ($years as $year ):?>
                  <option value="<?php echo (int)$year['id']; ?>" <?php if($project['end_year_id'] === $year['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($year['name_BN']); ?></option>
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
                     <input type="text" class="form-control" name="project_director_name" value="<?php echo remove_junk($project['project_director_name']);?>">                  
                 </div>
                 <div class="col-md-4">
                     <input type="text" class="form-control" name="project_director_designation" value="<?php echo remove_junk($project['project_director_designation']);?>">                  
                 </div>
                  <div class="col-md-4">
                      <input type="text" class="form-control" name="project_director_phone_no" value="<?php echo remove_junk($project['project_director_phone_no']);?>">                
                  </div>                 
               </div>
              </div>             
          <div class="form-group">
               <div class="row">
              <div class="col-md-4">
                      <input type="text" class="form-control" name="project_director_email" value="<?php echo remove_junk($project['project_director_email']);?>">
              </div>
               </div>                 
               </div>
              </div>
              </fieldset>  
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">  
              <button type="submit" name="update_project" class="btn btn-success">Update</button>
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
