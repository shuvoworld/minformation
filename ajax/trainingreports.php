<?php
require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
// storing  request (ie, get/post) global array to a variable  
$sql = "SELECT * FROM training_reports";

$result = $db->query($sql);

$data = array();
while($row = $result->fetch_array(MYSQLI_ASSOC)){

  $data[] = $row;

}

$results = ["sEcho" => 1,

        	"iTotalRecords" => count($data),

        	"iTotalDisplayRecords" => count($data),

        	"aaData" => $data ];


echo json_encode($results);
?>