<?php
$page_title = 'মাসিক ছকে রিপোর্ট';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $months = find_all('months');
   $years = find_all('years');
   $agencies = find_all('agencies');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">

      </div>
      <div class="panel-body">
          <form class="clearfix" method="post" action="report_process.php" target="_blank">
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
                <div class="col-md-4">
                    <label for="year_id">মন্ত্রণালয়/দপ্তর/সংস্থা *</label>
                    <select class="form-control" name="agency_id">
                    <option value="">নির্বাচন করুন</option>
                      <?php foreach ($agencies as $agency ):?>
                        <option value="<?php echo $agency['id'];?>"><?php echo $agency['name_BN'];?></option>
                      <?php endforeach;?>
                    </select>
                </div>

              </div>
              </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">রিপোর্ট দেখুন</button>
            </div>
          </form>
      </div>

    </div>
  </div>

</div>
<?php include_once('layouts/footer.php'); ?>
