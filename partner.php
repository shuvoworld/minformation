<?php
  $page_title = 'বাস্তবায়নকারী সংস্থা';
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
           <a href="add_partner.php" class="btn btn-primary">যোগ করুন</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="partner">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">নাম</th>
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

      $('#partner').dataTable({
        "bProcessing": true,
        "sAjaxSource": "ajax/partners.php",
        "deferRender": true,

    "columnDefs": [ 
        {
            "targets": 2,
            "render": function ( data, type, row, meta ) {
                return '<a href="edit_partner.php?id= '+ row.id + '"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:red" href="delete_partner.php?id= '+ row.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
            }
        },
        { targets: 1, searchable: true },
        { targets: '_all', searchable: false }
    ],
          "aoColumns": [
              { mData: 'id' } ,
              { mData: 'name_BN' }
            ]
          });  
    });
  </script>
