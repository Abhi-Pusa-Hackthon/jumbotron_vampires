<?php include 'dbconfig.php';?>
<?php
session_start();
require './PHPMailer_5.2.4/PHPMailer_5.2.4/class.phpmailer.php';
ob_start();
echo "we are here in the  data";
$username=$_SESSION['username'];
$p_name= $_POST['name'];
$p_id=$_POST['id'];
$status=$_POST['status'];
$seller = $_POST['seller'];
$customer_email=$_POST['customer_email'];
$delivery_person=$_POST['deliveryperson'];
echo $username;
echo $status;
echo $p_name;
echo $seller;
echo $customer_email;
echo $delivery_person;

  try {
    $conn = new PDO("mysql:host={$dbHost};dbname={$dbname}",$dbUser,$dbPass);
    $sql="UPDATE new_order SET status=:status where customer=:username and id=:id;";
    $query= $conn->prepare($sql);
    $result=$query->execute(array(
                                ":status"=>$status,
                                ":username"=>$username,
                                ":id"=> $p_id
                              ));
    if($result){
      echo "Successfully updated the data";
      $mail = new PHPMailer;
     $mail->IsSMTP();
      $mail->SMTPDebug = 1;
      $mail->SMTPAuth = true;                                   // Set mailer to use SMTP
      $mail->SMTPSecure = 'tsl';                            // Enable encryption, 'ssl' also accepted
      $mail->Host = 'localhost';  // Specify main and backup server
      //$mail->Port=465;
      $mail->IsHTML(true);                              // Enable SMTP authentication
      $mail->Username = 'esamaadhaan@manojpusa.club';                            // SMTP username
      $mail->Password = 'Lmurugan@123';                           // SMTP password
      $mail->SetFrom = 'esamaadhaan@manojpusa.club';
      $mail->Subject = 'New User has been created';
      $mail->Body    =     '<p>
                                  Hi ' .$p_customer. ',</p>
                              <p>
                                  The status of the product with name '. $p_name .' has been changed to '.$status.'
                              </p>
                              <p>
                                  Thanks for ordering
                              </p>
                              <p>
                                  Regards,<br>
                                  A_Kart Team<br>
                                  Bangalore India<br>
                              </p>';
        if($status == "Originated"){
         $mail->AddAddress($customer_email );               // Name is optional   
         $mail->addCC($seller);                  
        }else if($status == "Packed and Shipped"){
         $mail->AddAddress($delivery_person );               // Name is optional
         $mail->addCC($customer_email);   
        }else if($status =="Delivered")
        {
          $mail->AddAddress($seller);
           $mail->addCC($customer_email);
        }else if($status=="Confirmed"){
          $mail->AddAddress($customer_email);
           $mail->addCC($seller);
        }

      if(!$mail->Send()) {
         echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
         exit;
      }

    }
  } catch (PDOException $e) {
    echo "Some error happened in connecting to the database";
  }
?>