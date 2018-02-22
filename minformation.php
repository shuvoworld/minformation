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
           <a href="add_minformation.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="minformation">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Month</th>
                <th class="text-center">Year</th>
                <th class="text-center">Agency</th>
                <th class="text-center">Action</th>
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
      $('#minformation').dataTable({
        "bProcessing": true,
        "sAjaxSource": "ajax/minformations.php",
        "deferRender": true,

    "columnDefs": [ 
        {
            "targets": 4,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_minformation.php?id='+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_minformation.php?id='+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'month_name' },
              { mData: 'year_name' },
              { mData: 'agency_name' }
            ]
          });  
    });
  </script>
