<?php
$page_title = 'উন্নয়ন প্রকল্পের তথ্য যোগ করুন';

require_once 'includes/load.php';
// Checkin What level user has permission to view this page
page_require_level(2);
$projects = find_all('projects');
$months = find_all('months');
$years = find_all('years');
$agencies = find_all('agencies');
$error = false;
$errors = array();
$errmsg = '';
if (isset($_POST['add_project_report'])) {
    if (empty($_POST['project_id']) && empty($_POST['other_name'])) {
        $error = true;
        $errors['project_id'] = "প্রকল্প সিলেক্ট করুন";
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
      <?php if ($errmsg != '') {?>
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
            <span>প্রকল্প/কর্মসুচি/কার্যক্রম</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="POST" action="add_project_report.php" class="clearfix">
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
               <div class="row">
                  <div class="col-md-4">
                <label for="month_id">প্রতিবেদনাধিন মাস *</label>
                <select class="form-control" name="month_id" id="month_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($months as $month): ?>
                   <option value="<?php echo $month['id']; ?>"><?php echo $month['name_BN']; ?></option>
                <?php endforeach;?>
                </select>
                </div>

                  <div class="col-md-4">
                    <label for="year_id">প্রতিবেদনাধিন বছর *</label>
                    <select class="form-control" name="year_id" id="year_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($years as $year): ?>
                        <option value="<?php echo $year['id']; ?>"><?php echo $year['name_BN']; ?></option>
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
              </div>
               <div class="form-group">
               <div class="row">
               <div class="col-md-8">
                <label for="project_id">প্রকল্প/কর্মসুচি/কার্যক্রম *</label>
                <select class="form-control" name="project_id" id="project_id">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($projects as $project): ?>
                   <option value="<?php echo $project['id']; ?>"><?php echo $project['type_BN'] . " >> " . $project['name_BN']; ?></option>
                <?php endforeach;?>
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
                    0 => "না",
                    );
                ?>
                <select class="form-control" name="is_training">
                <option value="">নির্বাচন করুন</option>
                  <?php foreach ($trainings as $key => $value): ?>
                   <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php endforeach;?>
                </select>
            </div>
            </div>
            </div> -->
            <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="other_name">(অথবা)অন্যান্য কার্যক্রম</label>
                <input type="text" class="form-control"  name="other_name" placeholder="নাম লিখুন">
            </div>
          </div>
          </div>
          <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="beneficiaries">উপকারভোগীর সংখ্যা *</label>
                <input type="number" class="form-control"  name="beneficiaries">
            </div>
          </div>
          </div>

           <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                <label for="implementing_body">উদ্যোগী সংস্থা/এজেন্সী (যদি থেকে থাকে)</label>
                <input type="text" class="form-control"  name="implementing_body">
            </div>
          </div>
          </div>

          <div class="form-group">
               <div class="row">
               <div class="col-md-12">
                <label for="note">মন্তব্য</label>
                <textarea name="note" class="form-control"></textarea>
            </div>
          </div>
          </div>

              <button type="submit" name="add_project_report" class="btn btn-success">সাবমিট করুন</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once 'layouts/footer.php';?>
  <script type="text/javascript">
			CKEDITOR.replace( 'note' );
      $(document).ready(function() {
          $('#agency_id,#month_id,#year_id,#project_id').select2();
});
  </script>
