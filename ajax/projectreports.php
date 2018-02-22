<?php
require_once('../includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
// storing  request (ie, get/post) global array to a variable  


$sql = "SELECT * FROM project_reports WHERE 1";

if(isset( $_SESSION['user_id'])){
  $user  = find_by_id('users', $_SESSION['user_id']);
}

if(isset($user['agency_id'])){
  $sql .= " AND agency_id = ".$user['agency_id'];
}
else 
$sql .= "";

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