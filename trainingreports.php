<?php
  $page_title = 'All Reports';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_training_report.php" class="btn btn-primary">প্রশিক্ষণার্থী'র তথ্য যোগ করুন</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="projectreport">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">মন্ত্রণালয়/দপ্তর/সংস্থা</th>
                <th class="text-center">মাস</th>
                <th class="text-center">বছর</th>
                <th class="text-center">উন্নয়ন প্রকল্পের আওতায় প্রশিক্ষণার্থী</th>
                <th class="text-center">কর্মসুচীর আওতায় প্রশিক্ষণার্থীর সংখ্যা</th>
                <th class="text-center">রাজস্ব বাজেটের আওতায় প্রশিক্ষণার্থী</th>                
                <th class="text-center">কর্মকর্তা/কর্মচারী প্রশিক্ষণার্থী</th>
                <th class="text-center">পরিবর্তন</th>
              </tr>
            </thead>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#projectreport').dataTable({
        "bProcessing": true,
        "sAjaxSource": "ajax/trainingreports.php",
        "deferRender": true,

    "columnDefs": [ 
        {
            "targets": 8,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_trainingreport.php?id='+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_trainingreport.php?id='+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'agency_name' } ,
              { mData: 'month_name' } ,
              { mData: 'year_name' } ,
              { mData: 'training_development' },
              { mData: 'training_program' },
              { mData: 'training_revenue_budget' },
              { mData: 'training_staff' }
            ]
          });  
    });
  </script>
