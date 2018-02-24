<?php
  $page_title = 'প্রশিক্ষণের তথ্য যোগ করুন';
  require_once('includes/load.php');
  page_require_level(2);
  $months = find_all('months');
  $years = find_all('years');
  $agencies = find_all('agencies');
?>
<?php
$error = false;
$errors  = array();
$errmsg  = '';
 if(isset($_POST['add_training_report'])){
   // $req_fields = array('name','name_BN','start_date','end_date');
   // validate_fields($req_fields);

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


     $query  = "INSERT INTO training_reports (";
     $query .=" agency_id,agency_name,month_id,month_name,year_id,year_name,training_development,training_program,training_revenue_budget,training_staff,note,is_active,created_at";
     $query .=") VALUES (";
     $query .=" '{$agency_id}', '{$agency['name_BN']}', '{$month_id}', '{$month['name_BN']}', '{$year_id}', '{$year['name_BN']}', '{$training_development}', '{$training_program}', '{$training_revenue_budget}', '{$training_staff}', '{$note}',1, now()";
     $query .=")";
     if($db->query($query)){
       $session->msg('s',"Report added ");
       redirect('trainings.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('trainings.php', false);
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
            <span>প্রকল্প/কর্মসুচি/কার্যক্রম</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="POST" action="add_training_report.php" class="clearfix">
          <?php if($user['agency_id'] == NULL){ ?>
            <div class="form-group">
               <div class="row">
                <div class="col-md-4">                  
                <label for="agency_id">প্রতিবেদনাধিন সংস্থা</label>              
                <select class="form-control" name="agency_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($agencies as $agency ):?>
                   <option value="<?php echo $agency['id'];?>"><?php echo $agency['name_BN'];?></option>
                <?php endforeach;?>
                </select>
                </div>
                </div>
                </div>
<?php } ?>            

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                <label for="month_id">প্রতিবেদনাধিন মাস *</label>
                <select class="form-control" name="month_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($months as $month ):?>
                   <option value="<?php echo $month['id'];?>"><?php echo $month['name_BN'];?></option>
                <?php endforeach;?>
                </select>
                </div>
                
                  <div class="col-md-4">
                    <label for="year_id">প্রতিবেদনাধিন বছর *</label>
                    <select class="form-control" name="year_id">
                    <option value="">নির্বাচন করুন</option>
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
                <label for="training_development">উন্নয়ন প্রকল্পের আওতায় প্রশিক্ষণার্থীর সংখ্যা</label>
                <input type="number" class="form-control"  name="training_development" />
            </div>
          </div>
          </div>
          
          <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="training_program">কর্মসুচীর আওতায় প্রশিক্ষণার্থীর সংখ্যা</label>
                <input type="number" class="form-control"  name="training_program" />
            </div>
          </div>
          </div>

          <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="training_revenue_budget">রাজস্ব বাজেটের আওতায় প্রশিক্ষণার্থীর সংখ্যা</label>
                <input type="number" class="form-control"  name="training_revenue_budget" />
            </div>
          </div>
          </div>

          <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="training_staff">কর্মকর্তা/কর্মচারী প্রশিক্ষণার্থীর সংখ্যা</label>
                <input type="number" class="form-control"  name="training_staff" />
            </div>
          </div>
          </div>


          <div class="form-group">
               <div class="row">
               <div class="col-md-12">
                <label for="note">মন্তব্য</label>
                <input type="text" class="form-control"  name="note">
            </div>
          </div>
          </div>

              <button type="submit" name="add_training_report" class="btn btn-success">প্রশিক্ষণার্থীর তথ্য যোগ করুন</button>
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
          $('[name="month_id"]').select2();
          $('[name="year_id"]').select2();
});
  </script>
