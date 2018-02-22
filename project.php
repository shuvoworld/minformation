<?php
  $page_title = 'All Projects';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
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
                <th class="text-center">#</th>
                <th class="text-center">প্রকল্প/কর্মসুচি/কার্জক্রমের নাম</th>
                <th class="text-center">রেভিনিউ/ডেভেলপমেন্ট</th>
                <th class="text-center">প্রকল্প/কর্মসুচি</th>
                <th class="text-center">মন্ত্রনালয়/দপ্তর/সংস্থা</th>
                <th class="text-center">শুরু</th>
                <th class="text-center">শেষ</th>
                <th class="text-center">প্রকল্প পরিচালক</th>
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
            "targets": 8,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_project.php?id='+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_project.php?id= '+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'name' },
              { mData: 'type_BN' },
              { mData: 'main_type_BN' },
              { mData: 'agency_name' },
              { mData: 'start_year_name' },
              { mData: 'end_year_name' },
              { mData: 'project_director_name' }
            ]
          });  
    });
  </script>
