<?php
$page_title = 'কার্যক্রম সংক্রান্ত তথ্যাদির প্রতিবেদন ছক';
$project_results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
  if(isset($_POST['submit'])){
    $req_dates = array('month_id','year_id', 'agency_id');
    validate_fields($req_dates);

    if(empty($errors)):
      $month_id   = remove_junk($db->escape($_POST['month_id']));
      $month = find_by_id('months', $month_id);
      $year_id     = remove_junk($db->escape($_POST['year_id']));
      $year = find_by_id('years', $year_id);
      $agency_id     = remove_junk($db->escape($_POST['agency_id']));
      $agency = find_by_id('agencies',  $agency_id);
      $project_results      = find_projects_by_dates($month_id,$year_id,$agency_id);
      $training_results      = find_trainings_by_dates($month_id,$year_id,$agency_id);
      $other_results      = find_other_programs_by_dates($month_id,$year_id,$agency_id);
    else:
      $session->msg("d", $errors);
      redirect('report.php', false);
    endif;

  } else {
    $session->msg("d", "Select dates");
    redirect('report.php', false);
  }
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Default Page Title</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
       white-space: normal !important;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
   <link rel="stylesheet" type="text/css" media="print" href="libs/css/print.css" />
</head>
<body>

    <div class="page-break">   
    <!-- <button onclick="myFunction()" class="btn btn-info pull left printButtonClass" style="margin: 10px 0 0 5px;">Print this page</button> -->
       <div class="sale-head">           
           <h3>মহিলা ও শিশু বিষয়ক মন্ত্রনালয়ের কার্যক্রম সংক্রান্ত তথ্যাদির প্রতিবেদন ছক</h3>           
           <strong>প্রতিবেদনাধীন মাসঃ <?php if(isset($month_id)){ echo $month['name_BN'];}?>,<?php if(isset($year_id)){echo $year['name_BN'];}?> </strong>
           <strong>দপ্তর/সংস্থাঃ <?php echo $agency['name_BN']?></strong>
       </div>
       <div style="font-size: 16px; font-weight: bold; margin-bottom: 10px; text-align: center">প্রকল্প/কর্মসূচী/কার্যক্রম</div>
    <?php $i = 1;?>
      <table class="table table-border" >
        <thead>
          <tr>
              <th>ক্রমিক নং</th>
              <th>ধরন</th>
              <th>নাম</th>
              <th>প্রকল্প পরিচালক</th>
              <th>উপকারভোগীর সংখ্যা</th>
              <th>মন্তব্য</th>
          </tr>
        </thead>
        <tbody>
        <?php if($project_results): ?>
          <?php foreach($project_results as $result): ?>
           <tr style="font-size:12px;">
             <td class="text-center"><?php echo convertEnglishDigitToBengali($i); ?></td>
             <td class="text-center"><?php echo remove_junk($result['type_BN']);?></td>
              <td class="text-left"><?php echo remove_junk($result['project_name']);?></td>
              <td class="text-center"><?php echo remove_junk($result['project_director_name']);?></td>
              <td class="text-center"><?php echo convertEnglishDigitToBengali($result['beneficiaries']);?></td>
              <td class="text-left"><?php echo remove_junk($result['note']);?></td>
          </tr>
        <?php $i++ ; endforeach; ?>
        <?php
    else:
    ?>
    <tr style="font-size:14px;">
             <td class="text-center" colspan=6 style="color: red"><?php echo "তথ্য খুঁজে পাওয়া যাইনি" ?></td>           
    </tr>
    <?php
     endif;
    ?>
    </tbody>
  </table>
  
  
  <div style="font-size: 16px; font-weight: bold; margin-bottom: 10px; text-align: center">প্রশিক্ষণ</div>
  
  <table class="table table-border">
        
        <thead>
          <tr>
          <th>নাম</th>
          <th>উপকারভোগীর সংখ্যা</th>
          </tr>
        </thead>
        
        <tbody>
        <?php if($training_results): ?>
           <tr style="font-size:12px;">
             <td>উন্নয়ন প্রকল্পের আওতায়</td><td class="text-center"><?php echo convertEnglishDigitToBengali($training_results[0]['training_development']);?></td>           
          </tr>
          <tr style="font-size:12px;">
             <td>কর্মসূচীর আওতায়</td><td class="text-center"><?php echo convertEnglishDigitToBengali($training_results[0]['training_program']);?></td>           
          </tr>
          <tr style="font-size:12px;">
             <td>রাজস্ব বাজেটের আওতায়</td><td class="text-center"><?php echo convertEnglishDigitToBengali($training_results[0]['training_revenue_budget']);?></td>           
          </tr>
          <tr style="font-size:12px;">
             <td>কর্মকর্তা/কর্মচারী</td><td class="text-center"><?php echo convertEnglishDigitToBengali($training_results[0]['training_staff']);?></td>           
          </tr>

        <?php
          else:
        ?>
      <tr style="font-size:14px;">
             <td class="text-center" colspan=2 style="color: red"><?php echo "তথ্য খুঁজে পাওয়া যাইনি" ?></td>           
      </tr>
      <?php
        endif;
      ?>
    </tbody>
  </table>
  
  
  <div style="font-size: 16px; font-weight: bold; margin-bottom: 10px; text-align: center">অন্যান্য কার্যক্রম</div>
  <?php $i = 1;?>
      <table class="table table-border">
        <thead>
          <tr>
              <th>ক্রমিক নং</th>
              <th>নাম</th>
              <th>উপকারভোগীর সংখ্যা</th>
              <th>মন্তব্য</th>
          </tr>
        </thead>
        <tbody>
        <?php if($other_results): ?>
          <?php foreach($other_results as $other): ?>
           <tr style="font-size:12px;">
           <td class="text-center"><?php echo convertEnglishDigitToBengali($i); ?></td>
             <td class="text-center"><?php echo remove_junk($other['other_name']);?></td>
             <td class="text-center"><?php echo remove_junk($other['beneficiaries']);?></td>
              <td class="text-left"><?php echo remove_junk($other['note']);?></td>
          </tr>
        <?php $i++ ; endforeach; ?>
        <?php
    else:
    ?>
    <tr style="font-size:14px;">
             <td class="text-center" colspan=6><?php echo "তথ্য খুঁজে পাওয়া যাইনি" ?></td>           
    </tr>
    <?php
     endif;
    ?>
    </tbody>
  </table>

</div>

  <script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
