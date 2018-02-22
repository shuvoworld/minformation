<?php
  $page_title = 'প্রশিক্ষণের তথ্য আপডেট করুন';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$minformation = find_by_id('minformations',(int)$_GET['id']);
$agencies = find_all('agencies');
$months = find_all('months');
$years = find_all('years');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';
if(isset($_POST['update_report'])){
  if(empty($_POST['month_id'])){
    $error = true;
    $errors['month_id'] = "মাস উল্লেখ করুন";
  }
  if(empty($_POST['year_id'])){
    $error = true;
    $errors['year_id'] = "বছর উল্লেখ করুন";
  }

 if($error == false){
  if(isset( $_SESSION['user_id'])){
    $user  = find_by_id('users', $_SESSION['user_id']);
  }
  if(isset($user['agency_id'])){
    $agency_id = $user['agency_id'];
  }
  else {
    $agency_id = (int)$db->escape($_POST['agency_id']);
  }
     $agency = find_by_id('agencies',  $agency_id);
     $month_id   = remove_junk($db->escape($_POST['month_id']));
     $month = find_by_id('months', $month_id);
     $year_id   = remove_junk($db->escape($_POST['year_id']));
     $year = find_by_id('years', $year_id);

     $training_development = (int)$db->escape($_POST['training_development']);
     $training_program = (int)$db->escape($_POST['training_program']);
     $training_revenue_budget = (int)$db->escape($_POST['training_revenue_budget']);
     $training_staff = (int)$db->escape($_POST['training_staff']);
     $note   = remove_junk($db->escape($_POST['note']));
       
       $query   = "UPDATE minformations SET";
       $query  .=" agency_id ='$agency_id', 
                   agency_name ='{$agency['name_BN']}',
                   month_id ='{$month_id}',
                   month_name ='{$month['name']}',
                   year_id ='{ $year_id}',
                   year_name ='{$year['name']}',
                   training_development = '{$training_development}',
                   training_program = '{$training_program}',
                   training_revenue_budget = '{$training_revenue_budget}',
                   training_staff = '{$training_staff}',
                   note = '{$note}'
                   ";

       $query  .=" WHERE id = ". $minformation['id'];
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"প্রতিবেদন আপডেট করা হয়েছে");
                 redirect('minformation.php', false);
               } else {
                 $session->msg('d',' প্রতিবেদন আপডেট ব্যর্থ হয়েছে!');
                 redirect('edit_minformation.php?id='.$minformation['id'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Edit Report Information</span>
         </strong>
        </div>
        <div class="panel-body">

         <div class="col-md-7">
           <form method="post" action="edit_minformation.php?id=<?php echo (int)$minformation['id'] ?>">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                  <label for="month_id">প্রতিবেদনাধিন সংস্থা</label>
                    <select class="form-control" name="agency_id">
                    <option value="">Select</option>
                   <?php  foreach ($all_agencies as $agency): ?>
                     <option value="<?php echo (int)$agency['id']; ?>" <?php if($minformation['agency_id'] === $agency['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($agency['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                 </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                  <label for="month_id">প্রতিবেদনাধিন মাস</label>
                    <select class="form-control" name="month_id">
                    <option value="">Select</option>
                   <?php  foreach ($months as $month): ?>
                     <option value="<?php echo (int)$month['id']; ?>" <?php if($minformation['month_id'] === $month['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($month['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="month_id">প্রতিবেদনাধিন বছর</label>
                    <select class="form-control" name="year_id">
                    <option value="">Select</option>
                   <?php  foreach ($years as $year): ?>
                     <option value="<?php echo (int)$year['id']; ?>" <?php if($minformation['year_id'] === $year['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($year['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                
                 </div>
              </div>

            <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                <label for="status">প্রতিবেদনের অবস্থান</label>
                    <select class="form-control" name="status">
                    <?php  
                    $maintypes = array(""=>"Select", "Draft"=>"Draft", "Submitted"=>"Submitted", "Accepted"=>"Accepted");
                    foreach ($maintypes as $maintype): 
                    ?>
                      <option value="<?php echo $maintype; ?>" <?php if($minformation['status'] == $maintype): echo "selected"; endif; ?> >
                        <?php echo remove_junk($maintype) ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>

              </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="report_date">প্রতিবেদনের তারিখ</label>
                    <div class="input-group">
                      <input type="date" class="form-control" name="report_date" value="<?php echo remove_junk($minformation['report_date']);?>">
                   </div>
                  </div>
                 </div>

               </div>
              </div>
              <button type="submit" name="update_report" class="btn btn-success">Update Report</button>
          </form>
         </div>
        </div>

 <div class="row">
            <div class="col-md-12">
              <strong>
              <span class="glyphicon glyphicon-th"></span>
            <span>উন্নয়ন প্রকল্প</span>
            </strong>
            <br/>


  <div class="container-fluid">
		<a href="add_project_report.php?minformation_id=<?php echo $_GET['id'] ?>" style="color: #FFFFFF;"><button type="button" style="padding:10px; margin:0 50px 15px 0;" class="btn btn-primary btn-sm pull-right">উন্নয়ন প্রকল্পের তথ্য যোগ করুন</button></a>
		<div class="row">
<div class="col-md-12 marginT20">

		<div class="table-responsive demo-x content">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>#</th>
					<th>উন্নয়ন প্রকল্পের নাম</th>
					<th>উপকারভোগীর সংখ্যা</th>
					<th>অগ্রগতি/হ্রাস/বৃদ্ধি/বিয়োজন/সংযোজন/মন্তব্য</th>
					<th style="background-image: none">পরিবর্তন</th>
				</tr>
			</thead>
		</table>
		</div>

		</div>
		</div>


      </div>

      
  </div>

<?php include_once('layouts/footer.php'); ?>
