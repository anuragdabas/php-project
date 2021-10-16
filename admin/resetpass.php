<?php
include '../bootstrap.php';
include '../layouts/navbar.php';
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Password Recovery</title>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
    <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
    <form class="text-center border border-light p-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="reg" onsubmit="return validation()">
    <p class="h4 mb-4">Reset Password</p>
    <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
    </div>
    <label for="password" class="lbl">New Password:</label>
    <input type="password" class="form-control mb-4" name="password" autocomplete="off" placeholder="enter your password"  required/>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>
    <label for="password" class="lbl">Enter Password Again:</label>
    <input type="password" class="form-control mb-4" name="repassword" autocomplete="off" placeholder="enter your password again"  required/>
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
    if(password!==repassword)
         {
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password not mached!!!!";
             return false;
         }else if(password.length<6){  
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password must be at least 6 characters long"; 
            return false;  
         }
        }
</script>
</body>
</html>
<?php
if(isset($_GET['email']) && isset($_GET['token'])){
if(isset($_POST['submit'])){
$conn=mysqli_connect('localhost','root','','myform');
$email=mysqli_real_escape_string($conn,$_GET['email']);
$token=mysqli_real_escape_string($conn,$_GET['token']);
if($conn){
$query="SELECT id,username FROM admin_info WHERE email='$email' && token='$token'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($conn,$password);
    $salt="$2y$10$";
    $hash="fuck./bruteforce./5874";
    $password=crypt($password,$salt.$hash);
    $query="UPDATE admin_info SET token='',password='$password' WHERE token='$token'";
    $result=mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn) && $result){
        setcookie('2r3ka','',time() + 3600);
        header('location: adminlogin.php');
    }else{
        exit("<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='something went wrong!!!!';
        </script>");
    }
}
mysqli_close($conn);
}else{
    die("<script>alert('connection failed');</script>");
}   
}
}else{
    echo "<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='something went wrong!!!!';
    </script>";
    header('location: ../errorpage.php');
}
include '../layouts/footer.php';
ob_end_flush();
?>