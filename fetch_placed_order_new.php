<?php
    // echo "we are calling from server";
    $s_id=$_GET['s_id'];
    
   //   echo $s_id;
    
	//$id=urldecode($id);
    //setting the database variable
    // $dbName='test';
    // $dbHost='localhost';
    // $dbUser='root';
    // $dbPass='';

   
    $dbName='esamaadhaan';
    $dbHost='localhost';
    $dbUser='user_esamaadhaan';
    $dbPass='ashesh@123';



 try {
    $con = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$con) {
 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}
 
$sql = "SELECT * FROM new_order WHERE name='".$s_id."'";
 
 $r = mysqli_query($con,$sql);
 
 $res = mysqli_fetch_array($r);
 
 $result = array();
 
 array_push($result,array("name"=>$res['name'],"timestamp"=>$res['timestamp'],"status"=>$res['status']) );
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);
 } catch (Exception $e) {
   echo $e->getMessage();
   echo "database not connected";
  //  header("Location:./login.php?message=DbNotConnected");
 }

?>