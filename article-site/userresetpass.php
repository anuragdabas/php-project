<?php
session_name("authenication");
session_start();
include 'bootstrap.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <div class="container">
    <div style="margin-left: 12.5%;margin-right: 12.5%;">
    <form class="text-center border border-light p-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="reg" onsubmit="return validation()">
    <p class="h4 mb-4">Reset Password</p>
    <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
    </div>
    <label for="oldpassword" class="lbl">Old Password:</label>
    <input type="password" class="form-control mb-4" name="oldpassword" autocomplete="off" placeholder="enter your old password"  required/>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>
    <label for="password" class="lbl">New Password:</label>
    <input type="password" class="form-control mb-4" name="password" autocomplete="off" placeholder="enter your new password"  required/>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>
    <label for="password" class="lbl">Enter Password Again:</label>
    <input type="password" class="form-control mb-4" name="repassword" autocomplete="off" placeholder="again enter your new password again"  required/>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>

    <input class="btn btn-info my-4 btn-block" type="submit" value="Change Password" name="submit"/>
    </form>
</div>
</div>
<script>
    function validation(){
    var password=document.forms['reg']['password'].value;
    var repassword=document.forms['reg']['repassword'].value;
    var oldpassword=document.forms['reg']['oldpassword'].value;
    if(password!==repassword)
         {
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password not mached!!!!";
             return false;
         }else if(password.length<6 || oldpassword.length<6){  
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password must be at least 6 characters long"; 
            return false;  
         }
        }
</script>
</body>
</html>
<?php
if(isset($_SESSION['user']) && $_SESSION['user']==true){
if(isset($_POST['submit'])){
if(isset($_SESSION['username']))
{
  $username=$_SESSION['username'];
}
  $conn=mysqli_connect('localhost','root','','myform');
  $oldpassword=$_POST['oldpassword'];
  $oldpassword=mysqli_real_escape_string($conn,$oldpassword);
  $salt="$2y$10$";
  $hash="fuck./bruteforce./5874";
  $oldpassword=crypt($oldpassword,$salt.$hash);
if($conn){
$query="SELECT username,password FROM form_info WHERE username='$username' && password='$oldpassword' ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($conn,$password);
    $password=crypt($password,$salt.$hash);
    $query="UPDATE form_info SET password='$password' WHERE username='$username' && password='$oldpassword'";
    $result=mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn) && $result){ 
       echo "<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='Password sucessfully updated';
        </script>";
    }else{
        exit("<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='something went wrong!!!!';
        </script>");
        header('location: login.php');
    }
}else{
    die("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='Incorrect Old Password!!!!';
    </script>");    
}
mysqli_close($conn);
}else{
    die("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='Connection To Db Failed';
    </script>");
}   
}
}else{
    header('location: login.php');
}
session_write_close();
?>