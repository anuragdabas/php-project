<?php
include 'bootstrap.php';
include 'layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
  <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
  </div>
<!-- Default form register -->
<div class="text-center border border-light p-5">
  <img src="http://127.0.0.1/myproject/images/emailtick.png" class="rounded mx-auto d-block" alt="Verified Email"  height="180px" width="280px" /><br>
        <p class="h4 mb-4">Email Has Been Verified</p>
        <p class="h4 mb-4">To SignIn: <a href="http://127.0.0.1/myproject/login.php">Click Here</a></p><br>
</div>
</div>
</div>
</body>
</html>
<?php

if(isset($_GET['email']) && isset($_GET['etoken'])){
$conn=mysqli_connect('localhost','root','','myform');
$email=mysqli_real_escape_string($conn,$_GET['email']);
$etoken=mysqli_real_escape_string($conn,$_GET['etoken']);
if($conn){
$query="SELECT username from form_info WHERE email='$email' && verifiedemail=0";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
$query="UPDATE form_info SET verifiedemail='1',emailtoken='' WHERE email='$email' && emailtoken='$etoken' ";
$result=mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)){
    echo "<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='email sucessfully verified';
    </script>";
    
}else{
    exit("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='email not verified';
    </script>");
}
}else{
    exit("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='email already verified!!!!';
    </script>");
}
}
mysqli_close($conn);
}else{
    header('location: registration.php');
}
include 'layouts/footer.php';
?>