<?php
    // echo "we are calling from server";
    $username=$_GET['user'];
    $password= $_GET['pass'];
    // echo $username;
    // echo $password;
	//$username=urldecode($username);
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
       $conn = new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUser,$dbPass);
       $stmt = $conn->prepare("SELECT * FROM users where username=:username");
       //echo $stmt;
       $stmt->execute(array(
         ":username"=>$username
       ));
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $fetchAll = $stmt->fetchAll();
       if ($fetchAll){
         // set the resulting array to associativ
        //  echo "inside fetch column";
         foreach(new RecursiveArrayIterator($fetchAll) as $k=>$v) {
            //  echo "username retireved is:".$v['username']."and password is:".$v['password'];
             if($v["username"]==$username && $v['password']==$password){
             $result = array();
            array_push($result,array("name"=>$v["username"],"password"=>$v['password'],"email"=>$v['email']) );
 		 echo json_encode(array("result"=>$result));
              // echo   $v["id"];
              //  header("Location:./index.php");
             }
             else{
              //  header("Location:./login.php?message=WrongPassword");
               echo "Non AuthenticatedUser";
             }
         }
       }
       else{
         echo "User not found";
          // header("Location:./login.php?message=UserNotFound");
       }
 } catch (Exception $e) {
 //  echo $e->getMessage();
   echo "database not connected";
  //  header("Location:./login.php?message=DbNotConnected");
 }

?>