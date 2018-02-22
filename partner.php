<?php
  $page_title = 'All Projects';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $products = join_product_table();
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
           <a href="add_project.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="project">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Revenue/Development</th>
                <th class="text-center">Project/Program</th>
                <th class="text-center">Agency</th>
                <th class="text-center">Start Date</th>
                <th class="text-center">End Date</th>
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

      $('#project').dataTable({
        "bProcessing": true,
        "sAjaxSource": "ajax/projects.php",
        "deferRender": true,

    "columnDefs": [ 
        {
            "targets": 7,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_project.php?id= '+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_project.php?id= '+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'name' },
              { mData: 'type' },
              { mData: 'main_type' },
              { mData: 'agency_id' },
              { mData: 'start_date' },
              { mData: 'end_date' }
            ]
          });  
    });
  </script>
