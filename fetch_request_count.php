<?php include "dbconfig.php";?>
<?php
try {
  $conn = new PDO("mysql:host={$dbHost};dbname={$dbname}",$dbUser,$dbPass);
  $orig_count=0;
  $shipped_count=0;
  $deliver_count=0;
  $confirm_count=0;
  $count_list = array();
    $select_stmt= "SELECT * FROM new_order WHERE status='Originated';";
    $select_stmt1= "SELECT * FROM new_order WHERE status='Packed and Shipped';";
    $select_stmt2= "SELECT * FROM new_order WHERE status='Delivered';";
    $select_stmt3= "SELECT * FROM new_order WHERE status='Confirmed';";

  foreach($conn->query($select_stmt) as $row){
    $orig_count++;
  }
  foreach($conn->query($select_stmt1) as $row){
    $shipped_count++;
  }
  foreach($conn->query($select_stmt2) as $row){
    $deliver_count++;
  }
  foreach($conn->query($select_stmt3) as $row){
    $confirm_count++;
  }
   $count_list["orig_count"]=$orig_count;
   $count_list["shipped_count"]=$shipped_count;
   $count_list["deliver_count"]= $deliver_count;
   $count_list["confirm_count"]=$confirm_count;
   $json=json_encode($count_list);
   echo $json;
} catch (PDOException $e) {
  echo "error in adding data into database";
  echo $e->getMessage();
}
?>
