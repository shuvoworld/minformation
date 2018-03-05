<?php
  $page_title = 'প্রকল্পের তথ্য সংশোধন করুন';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$project_report = find_by_id('project_reports',(int)$_GET['id']);
$projects = find_all('projects');
$all_agencies = find_all('agencies');
$months = find_all('months');
$years = find_all('years');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';
if(isset($_POST['update_project_report'])){
  if(empty($_POST['month_id'])){
  $error = true;
  $errors['month_id'] = "Month is missing";
  }
if(empty($_POST['year_id'])){
  $error = true;
  $errors['year_id'] = "Year is missing";
}

if($error == false){
  if(isset( $_SESSION['user_id']))
    $users  = find_by_id('users', $_SESSION['user_id']);

    $agency_id = (int)$db->escape($_POST['agency_id']);
    $agency = find_by_id('agencies', $agency_id);
    $project_id = (int)$db->escape($_POST['project_id']);
    $project = find_by_id('projects', $project_id);
    $report_date   = remove_junk($db->escape($_POST['report_date']));
    $other_name   = remove_junk($db->escape($_POST['other_name']));
    $month_id   = remove_junk($db->escape($_POST['month_id']));
    $month = find_by_id('months', $month_id);
    $year_id   = remove_junk($db->escape($_POST['year_id']));
    $year = find_by_id('years', $year_id);
    $note  = remove_junk($db->escape($_POST['note']));
    $other_name  = remove_junk($db->escape($_POST['other_name']));
    $beneficiaries  = remove_junk($db->escape($_POST['beneficiaries']));
    $is_training = (int)$db->escape($_POST['is_training']);
    $implementing_body  = remove_junk($db->escape($_POST['implementing_body']));
       
       $query   = "UPDATE project_reports SET";
       $query  .=" agency_id ='{$agency_id}', 
                   agency_name ='{$agency['name_BN']}',
                   project_id ='{$project_id}',
                   project_name ='{$project['name']}',
                   other_name ='{$other_name}',
                   beneficiaries ='{$beneficiaries}',
                   month_id ='{$month_id}',
                   month_name ='{$month['name_BN']}',
                   year_id ='{$year_id}',
                   year_name ='{$year['name_BN']}',
                   is_training ='{$is_training}',
                   implementing_body ='{$implementing_body}',
                   note = '{$note}'
                   ";

       $query  .=" WHERE id = ". $project_report['id'];
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"প্রকল্পের তথ্য আপডেট করা হয়েছে");
                 redirect('projectreports.php', false);
               } else {
                 $session->msg('d', $_POST['note']);
                 redirect('edit_projectreport.php?id='.$project_report['id'], false);
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
            <span>প্রকল্পের তথ্য পরিবর্তন করুন</span>
         </strong>
        </div>
        <div class="panel-body">

         <div class="col-md-7">
           <form method="post" action="edit_projectreport.php?id=<?php echo (int)$project_report['id'] ?>">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                  <label for="agency_id">প্রতিবেদনাধিন সংস্থা</label>
                    <select class="form-control" name="agency_id">
                    <option value="">Select</option>
                   <?php  foreach ($all_agencies as $agency): ?>
                     <option value="<?php echo (int)$agency['id']; ?>" <?php if($project_report['agency_id'] === $agency['id']): echo "selected"; endif; ?> >
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
                     <option value="<?php echo (int)$month['id']; ?>" <?php if($project_report['month_id'] === $month['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($month['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="month_id">প্রতিবেদনাধিন বছর</label>
                    <select class="form-control" name="year_id">
                    <option value="">Select</option>
                   <?php  foreach ($years as $year): ?>
                     <option value="<?php echo (int)$year['id']; ?>" <?php if($project_report['year_id'] === $year['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($year['name_BN']); ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                
                 </div>
              </div>

              <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="project_id">প্রকল্প/কর্মসুচি/কার্যক্রম</label>
                <select class="form-control" name="project_id">
                <option value="">সিলেক্ট করুন</option>
                  <?php foreach ($projects as $project ):?>
                  <option value="<?php echo (int)$project['id']; ?>" <?php if($project_report['project_id'] === $project['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($project['name_BN']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          </div>
          </div>

          <!-- <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                <label for="project_id">ইহা কি প্রশিক্ষণ প্রকল্প/কর্মসুচি/কার্যক্রম?</label>
                <?php
                $trainings = array(
                  1 => "হ্যাঁ",
                  0 => "না"
               );
                ?>
                <select class="form-control" name="is_training">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($trainings as $key => $value ):?>
                   <option value="<?php echo $key;?>" <?php if($project_report['is_training'] == $key): echo "selected"; endif; ?>><?php echo $value;?></option>
                <?php endforeach;?>
                </select>
            </div>
          </div>
        </div> -->

          <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="other_name">(অথবা)অন্যান্য কার্যক্রম</label>
                <input type="text" class="form-control"  name="other_name" value="<?php echo remove_junk($project_report['other_name']); ?>">
            </div>
          </div>
          </div>
          
          
        <div class="form-group">
          <div class="row">
            <div class="col-md-4">
                <label for="beneficiaries">উপকারভোগীর সংখ্যা</label>
                <input type="number" class="form-control"  name="beneficiaries" value="<?php echo remove_junk($project_report['beneficiaries']); ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="implementing_body">উদ্যোগী সংস্থা/এজেন্সী (যদি থেকে থাকে)</label>
                <input type="text" class="form-control"  name="implementing_body" value="<?php echo remove_junk($project_report['implementing_body']); ?>">
            </div>
          </div>
          </div>

          <div class="form-group">
               <div class="row">
               <div class="col-md-12">
                <label for="note">মন্তব্য</label>
                <textarea name="note" class="form-control"><?php echo remove_junk($project_report['note']); ?></textarea>
            </div>
          </div>
          </div>

              <button type="submit" name="update_project_report" class="btn btn-success">আপডেট করুন</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

  <script type="text/javascript">
			CKEDITOR.replace( 'note' );
      $(document).ready(function() {
        $('[name="agency_id"]').select2();
        $('[name="partner_id"]').select2();
        $('[name="project_id"]').select2();
        $('[name="month_id"]').select2();
        $('[name="year_id"]').select2();
});
		</script>

