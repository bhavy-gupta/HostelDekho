<?php

include('smtp.php');

//  Creating Connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "hosteldekho";


session_start();

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Failed to Connect " . mysqli_connect_error());
} else {
  //  echo "Connection Established";
}
//  Configuring POST Variables
if (isset($_POST['otp'])) {

  $otp = $_POST['otp'];
  $email = $_POST['email'];
  $sql = "SELECT * FROM `login` WHERE `mail` = '$email' and `otp` = '$otp'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  if ($row == 1) {
    echo "true";
  } else {
    echo "false";
  }
} else {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $ot = mt_rand(100000, 999999);
  $sql = "INSERT INTO `login` (`name`, `phone`, `mail`, `otp`, `time`) VALUES ('$name', '$phone', '$email', '$ot', current_timestamp())";

  // Sending OTP on Successful Insertion

  $result = mysqli_query($conn, $sql);
  if ($result) {

    $mail->IsHTML(true);
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("hosteldekho24x7@gmail.com", "HostelDekho");
    $mail->Subject = "OTP for Booking";
    $content = "<b>$ot</b>";

    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
    } else {
      echo "Email sent successfully";
    }

    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
  } else {
    echo mysqli_error($conn);
  }
}
