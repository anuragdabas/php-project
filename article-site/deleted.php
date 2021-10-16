<?php
session_name("authenication");
session_start();
session_regenerate_id(true);
include 'bootstrap.php';
include 'layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%;">
<!-- Default form register -->
<div class="text-center border border-light p-5">
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
<img src="http://127.0.0.1/myproject/images/tick.png" class="rounded mx-auto d-block" alt="Email"  height="180px" width="280px" /><br>
<p class="h4 mb-4">Sad To hear That You Are Leaving Us</p>
<p class="h4 mb-4">hope to see you again</p><br>
<hr>
<p>Want to Sign Up again?
        <a href="http://127.0.0.1/myproject/registration.php">Sign Up</a>
    </p>
</div>
</div>
</div>
</body>
</html>

<?php
if(isset($_SESSION['user']) && $_SESSION['user']=true){
    $username="";
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
    }
    $conn=mysqli_connect('localhost','root','','myform');
    if($conn){
$query="DELETE FROM form_info WHERE username='$username' ";
$res=mysqli_query($conn,$query);
if($res){
echo "<script>
document.getElementById('alert').style.visibility='visible';
document.getElementById('alert').innerText='Your Account Has Been Deleted';
    </script>";  
}
    }else{
        die("<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='Database not connected!!!';
            </script>");
    }
}else{
    header('location: errorpage.php');
}
include 'layouts/footer.php';
session_unset();
session_destroy();
?>