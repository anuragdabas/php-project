<?php
include '../bootstrap.php';
include '../layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>password recovery</title>
    <meta charset="UTF-8">
<style>
    .lbl{
      float: left;
      font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
<!-- Default form register -->
<form class="text-center border border-light p-5" name="reg" method="POST" onsubmit="return validation();">
    <img src="http://127.0.0.1/myproject/images/pass.png" class="rounded mx-auto d-block" alt="Email"  height="180px" width="280px" /><br>
    <p class="h4 mb-4">Password Recovery</p><br>
    <label for="email" class="lbl">Email:   </label>
    <input type="text" name="email" id="email" class="form-control mb-4" placeholder="enter your email" value="<?php if(isset($email)){echo $email;} ?>" required />
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit" name="submit" id="sub">Send Recovery Link</button>
    <!-- Social register -->

</form>
</div>
</div>
<!--<script src="http://127.0.0.1/ajax/jquery-3.5.1.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function(){
    var email=$('#email');
$("#sub").on({
    click: function(){
        $.ajax({
            url:'forgotpass.php',
            method: 'POST',
            dataType:'text',
            data: {
            email: email.val()
            },success:function(response){
            console.log(response);
            }
        });
    }
});

    
});
function validation(){
var email=document.forms['reg']['email'].value;
var atposition=email.indexOf("@");  
var dotposition=email.lastIndexOf(".");
	    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Please enter a valid e-mail address";
            return false;  
        }
}
</script>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../phpmailer/PHPMailer.php');
require_once('../phpmailer/Exception.php');
require_once('../phpmailer/SMTP.php');
if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $conn= mysqli_connect('localhost','root','','myform');
   if($conn){
    $email=mysqli_real_escape_string($conn,$email);
$query="SELECT id,username from admin_info WHERE email='$email'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
$token='bheuljn7r512kj90asm56532gkahujd';
$token=str_shuffle($token);
$token=substr($token,0,10);
$query="UPDATE admin_info SET token='$token',tokenexpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email='$email'";
$res=mysqli_query($conn,$query);
if($res){
    try{
    $mail=new PHPMailer(true); 
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = 'smtp.gmail.com';
    $mail->addAddress($email);
    $mail->Subject="reset your Admin password";
    $mail->setFrom("clgproject44198@gmail.com","reset Admin password");
    $mail->Port = 587;
                             
                          

    $mail->Username = 'clgproject44198@gmail.com'; // YOUR gmail email
    $mail->Password = 'death44198'; // YOUR gmail password
    $mail->Body="
    Hii!! 
    In order to reset your Admin password click on the link below:

    http://127.0.0.1/myproject/admin/resetpass.php?email=$email&token=$token
    
    
    with regards,
    nina williams";
            $mail->send();
            echo "<script>
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText='check your email';
            </script>";
        }catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

    }
}else{
    exit("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='email not found!!!';
    </script>");
}
}else{
    die("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='connection to database failed';
    </script>");
    
}
   }
include '../layouts/footer.php';
?>