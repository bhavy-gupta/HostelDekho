<?php
//  Creating Connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "hosteldekho";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn)
{
  die("Failed to Connect " . mysqli_connect_error());
} 
else 
{
  //  echo "Connection Established";
}
//  Configuring POST Variables
if(isset($_POST['otp']))
{
  $otp = $_POST['otp'];
  $email = $_POST['email'];
  $sql = "SELECT * FROM `login` WHERE `mail` = '$email' and `otp` = '$otp'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_num_rows($result);
  if($row == 1){
    echo "Access Authorized!!!";
  }
  else{
    echo "Incorrect OTP";
  }
  
  
}
else
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $ot = mt_rand(100000, 999999);
  $sql = "INSERT INTO `login` (`name`, `phone`, `mail`, `otp`, `time`) VALUES ('$name', '$phone', '$email', '$ot', current_timestamp())";

//  Configuring PHP Mailer
/*
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "hosteldekho24x7@gmail.com";
  $mail->Password   = "contact.hostel.dekho";
*/
// Sending OTP on Successful Insertion

  $result = mysqli_query($conn, $sql);
  if ($result) 
  {
    /*
    $mail->IsHTML(true);
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("hosteldekho24x7@gmail.com", "HostelDekho");
    $mail->Subject = "OTP for Booking";
    $content = "<b>$otp</b>";

    $mail->MsgHTML($content);
    if (!$mail->Send()) 
    {
      echo "Error while sending Email.";
      var_dump($mail);
    } 
    else 
    {
      echo "Email sent successfully";
    }
    */
  }
  else 
  {
    echo mysqli_error($conn);
  }
}


?>