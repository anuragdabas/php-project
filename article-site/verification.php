<?php
include 'bootstrap.php';
include 'layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>email verification</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
<!-- Default form register -->
<div class="alert alert-primary" role="alert" id="alert">
Data has been submitted.check your email for verification link!!!
</div>
<div class="text-center border border-light p-5">
  <img src="http://127.0.0.1/myproject/images/email.png" class="rounded mx-auto d-block" alt="Email"  height="180px" width="280px" /><br>
        <p class="h4 mb-4">Verification Email Has Been Send</p>
        <p class="h4 mb-4">Please Check Your Email</p><br>
        <hr>
        <p><a id='resendlink' style="color: blue;">Resend verification Email</a></p><br>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('#resendlink').click(function(){
            window.location.reload();
        });
    });
</script>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('phpmailer/PHPMailer.php');
require_once('phpmailer/Exception.php');
require_once('phpmailer/SMTP.php');
if(isset($_GET['id'])){
    if(isset($_GET['email'])){
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
    $email=mysqli_real_escape_string($conn,$_GET['email']);
    $etoken='bheuljn7r512kj90asm56532gkahujd';
    $etoken=str_shuffle($etoken);
    $etoken=substr($etoken,0,10);
$query="UPDATE form_info SET emailtoken='$etoken' where email='$email' && verifiedemail=0 ";
$result=mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0){
try{
   $mail=new PHPMailer();
   $mail->SMTPAuth='true';
   $mail->SMTPSecure='tls';
   $mail->Port=547;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
    $mail->addAddress($email);
    $mail->Subject="verify your email";
    $mail->setFrom("clgproject44198@gmail.com","email verification");
    $mail->Port = 587;
                             
                          

    $mail->Username = 'clgproject44198@gmail.com'; // YOUR gmail email
    $mail->Password = 'death44198'; // YOUR gmail password
    $mail->Body="
    Hii!! 
    In order to verify your email click on the link below:

    http://127.0.0.1/myproject/verifyemail.php?email=$email&etoken=$etoken
    
    
    with regards,
    team@localhost";
            $mail->send();
    }catch(Exception $e){
        echo "<script>alert($e->getmessage());</script>";
    }

}else{
    exit("<script>
    document.getElementById('alert').innerText='email already verified';
    </script>");
}
mysqli_close($conn);
}else{
    exit("<script>alert('connection failed');</script>");
}
    }else{
        exit("<script>
        document.getElementById('alert').innerText='something went wrong';
        </script>");
    }
}else{
    header('location: registration.php');
}
include 'layouts/footer.php';
?>