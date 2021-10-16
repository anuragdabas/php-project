<?php if(!isset($_SESSION['contact']) && $_SESSION['contact']!=true){
header('location: errorpage.php');
}    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .lbl{
      float: left;
      font-weight: bold;
    }
  </style>
</head>
<body>
<!-- Default form contact -->
<div class="container">
<div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
<form class="text-center border border-light p-5" action="<?php $_SERVER['PHP_SELF']?>" method="POST" name="reg" onsubmit="return validation()">
    <p class="h4 mb-4">Contact us</p>
    <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
    </div>
    <!-- Name -->
    <label for="name" class="lbl">Name:</label>
    <input type="text" id="username" name="name" class="form-control mb-4" placeholder="Enter your Name" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?>" require>

    <!-- Email -->
    <label for="email" class="lbl">Email:</label>
    <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Enter your Email" required/>

    <!-- Subject -->
    <label for="subject" class="lbl">Subject</label>
    <select class="browser-default custom-select mb-4" name="subject">
        <option value="" disabled>Choose option</option>
        <option value="Feedback" selected>Feedback</option>
        <option value="Report a bug">Report a bug</option>
        <option value="Feature request">Feature request</option>
    </select>

    <!-- Message -->
    <label for="Message" class="lbl">Message:</label>
    <div class="form-group">
        <textarea class="form-control rounded-0" name="message" id="message" rows="3" placeholder="Enter Your Message" required></textarea>
    </div>

    <!-- Copy -->
    <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="copy" name="copy">
        <label class="custom-control-label" for="copy">Send me a copy of this message</label>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit" name="submit">Send</button>

</form>
</div>
</div>
<script>
     function validation(){
         var name=document.forms['reg']['name'].value;
         var email=document.forms['reg']['email'].value;
         var message=document.forms['reg']['message'].value;
         if(name.length<3){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="name must be at least 3 characters long";
            return false;
         }
         var atposition=email.indexOf("@");  
         var dotposition=email.lastIndexOf(".");
	    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Please enter a valid e-mail address";  
            return false;  
        }
        if(message==null || message==''){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Please enter a message"; 
        }
         }
</script>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('phpmailer/PHPMailer.php');
require_once('phpmailer/Exception.php');
require_once('phpmailer/SMTP.php');
if(isset($_POST['submit'])){
$name=$email=$subject=$message='';
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$name=test_input($_POST['name']);
$email=test_input($_POST['email']);
$subject=test_input($_POST['subject']);
$message=test_input($_POST['message']);
$query="INSERT INTO contact_us(name,email,subject,message,date)
VALUES ('$name','$email','$subject','$message',CURRENT_TIMESTAMP)";
$result=mysqli_query($conn,$query);
if($result){
echo "<script>
document.getElementById('alert').style.visibility='visible';
document.getElementById('alert').innerText='your response has been recorded';
</script>";
}
}else{
die("<script>
document.getElementById('alert').style.visibility='visible';
document.getElementById('alert').innerText='Not Connected To DataBase';
</script>");
    }
mysqli_close($conn);
}
if(isset($_POST['copy'])){
    try{
        $mail=new PHPMailer();
        $mail->SMTPAuth='true';
        $mail->SMTPSecure='tls';
        $mail->Port=547;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
         $mail->addAddress($email);
         $mail->Subject="copy of response of your feedback";
         $mail->setFrom("clgproject44198@gmail.com","copy of response of your feedback");
         $mail->Port = 587;
                                  
                               
     
         $mail->Username = 'clgproject44198@gmail.com'; // YOUR gmail email
         $mail->Password = 'death44198'; // YOUR gmail password
         $mail->Body="
         Hii!! 
         Thanks for your feedback.
         we will keep you updated with our services.

         Here is the copy of your response:-
         subject=$subject
         message=$message


         with regards,
         team@localhost";
                 $mail->send();
        if($mail->send()){
        echo "<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='Check Your Inbox';
        </script>";
        }
         }catch(Exception $e){
             echo "<script>alert($e->getmessage());</script>";
         }
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
    }
?>