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
           <a href="add_organization.php" class="btn btn-primary">নতুন যোগ করুন</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="organization">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">নাম</th>
                <th class="text-center">ক্যাটাগরী</th>
                <th class="text-center">দপ্তর/সংস্থা</th>
                <th class="text-center">বিভাগ</th>
                <th class="text-center">জেলা</th>
                <th class="text-center">তথ্য পরিবর্তন</th>
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
      $('#organization').dataTable({
        "bProcessing": true,
        "sAjaxSource": "ajax/organizations.php",
        "deferRender": true,

    "columnDefs": [ 
        {
            "targets": 6,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_organization.php?id='+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_organization.php?id='+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'name_BN' } ,
              { mData: 'organization_type_name' } ,
              { mData: 'agency_name' } ,
              { mData: 'division_name' } ,
              { mData: 'district_name' } 
            ]
          });  
    });
  </script>
