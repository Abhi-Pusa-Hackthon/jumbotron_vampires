<?php include 'dbconfig.php';?>
<?php
    $user= $_GET['s_id'];
   // echo $user;
    $order = array();
    $count=0;
    //echo $_SESSION['username'];
    try {
      $conn = new PDO("mysql:host={$dbHost};dbname={$dbname}",$dbUser,$dbPass);
      
        $select_stmt= "SELECT * FROM new_order WHERE customer='".$user."';";
    
      foreach($conn->query($select_stmt) as $row){
        $order[$count]["name"]=$row['name'];
        $order[$count]["company"]=$row['company'];
        $order[$count]["marketprice"]=$row['price'];
        $order[$count]["customer_email"]=$row['customer_email'];
        $order[$count]["seller"]=$row['seller'];
        $order[$count]["deliveryperson"]=$row['delivery_person'];
        $order[$count]['status']=$row['status'];
        $order[$count]['id']=$row['id'];
        //echo $order[$count]["name"];
        $count++;
      }
      $json =json_encode($order);
      echo $json;
    } catch (PDOException $e) {
      echo "error in adding data into database";
      echo $e->getMessage();
    }
?>