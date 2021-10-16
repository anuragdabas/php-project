<?php
session_name("authenication");
session_start();
session_regenerate_id(true);
ob_start();
$session_id=session_id();
$_SESSION['id']=$session_id;
if(isset($_COOKIE['2r3ka'])){
    echo "<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='admin password changed';
    </script>";
    setcookie('2r3ka','',time() - 3600);
}
if(isset($_COOKIE['a_member_login'])){
    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
    $encryption_key=base64_encode($key);
    $cipher="aes-128-gcm";
}
include '../bootstrap.php';
include '../layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin SignIn</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="form.css">
    <style>
    .lbl{
      float: left;
      font-weight: bold;
    }
  </style>
</head>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
<!-- Default form register -->
<form class="text-center border border-light p-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="reg" onsubmit="return validation()">

    <p class="h4 mb-4">Admin SignIn</p>
    <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <!-- User name -->
            <label for="username" class="lbl">Username:</label>
<input type="text" name="username" autocomplete="off"  class="form-control mb-4" placeholder="enter your username" value="<?php if(isset($_COOKIE['a_member_login'])){ echo /*openssl_decrypt($_COOKIE['member_login'], $cipher, $encryption_key, $options=0, $_COOKIE['53e0'],$_COOKIE['2e5nc']);*/base64_decode(base64_decode($_COOKIE['a_member_login'])); }?>" required />
        </div>
    </div>

    <!-- Password -->
    <label for="password" class="lbl">Password:</label>
    <input type="password" class="form-control mb-4" name="password" placeholder="enter your password" value="<?php if(isset($_COOKIE['E25#tc6a'])){ echo openssl_decrypt($_COOKIE['E25#tc6a'], $cipher, $encryption_key, $options=0, $_COOKIE['53e0a'],$_COOKIE['2e5nca']); }?>" required />
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>
     <div>
    <!-- Remember me -->
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme">
    <label class="custom-control-label" for="rememberme">Remember me</label>
    </div>
    </div>
    <br />
    <!-- Sign up button -->
    <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Sign in" />

    <!-- Social register -->
    <hr>

<p>Forgot your password?
        <a href="http://127.0.0.1/myproject/admin/forgotpass.php">Click Here</a>
    </p>

</form>
</div>
</div>
<script>
   function validation(){
         var name=document.forms['reg']['username'].value;
         var password=document.forms['reg']['password'].value;
         if(name.length<3){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="name must be at least 3 characters long";
            return false;
         }if(password.length<6){  
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password must be at least 6 characters long";
            return false;  
         }
         }
</script>
</body>
</html>


<?php
$username=$password="";
if(isset($_POST['submit'])){
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);
$connection= new mysqli('localhost','root','','myform');
$_SESSION['username']=$username;

if(!$connection->connect_error){
    mysqli_autocommit($connection,false);
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    $salt="$2y$10$";
    $hash="fuck./bruteforce./5874";
    $password=crypt($password,$salt.$hash);
    
    //remember me
    if(isset($_POST['rememberme'])){
    if(!isset($_COOKIE['a_member_login'])){
    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
    $encryption_key=base64_encode($key);
    $cipher="aes-128-gcm";
    if(in_array($cipher,openssl_get_cipher_methods())){
        $ivlen=openssl_cipher_iv_length($cipher);
        $iv=openssl_random_pseudo_bytes($ivlen);
    }
    setcookie ("53e0a",$iv,time()+ (10 * 365 * 24 * 60 * 60));
    setcookie("a_member_login",base64_encode(base64_encode($_POST["username"])),time()+ (10 * 365 * 24 * 60 * 60));
    //setcookie ("member_login",openssl_encrypt($_POST["username"],$cipher,$encryption_key,$options=0,$iv,$tag),time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("E25#tc6a",openssl_encrypt($_POST["password"],$cipher,$encryption_key,$options=0,$iv,$tag),time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("2e5nca",$tag,time()+ (10 * 365 * 24 * 60 * 60));
    }
    }
    $query= "SELECT username,password,permissions from  admin_info
    WHERE username='$username' && password='$password'";
    if(mysqli_commit($connection)){
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['admin']=true;
    if($row['permissions']==1){
    $_SESSION['2e59p']="r52E9";
    }
    if($row["username"]===$username && $row["password"]===$password){
    $_SERVER['PHP_AUTH_USER']===$row['username'];
    $_SERVER['PHP_AUTH_PW']===$row['password'];
    //$session_id=session_id();
    //setcookie('sid',$session_id,time() + (86400 * 30));
    header("location: adminwelcome.php?".$_SESSION['id']);
    }else{
    header('WWW-Authenticate: Basic realm="\authenticate\"');
    header('HTTP/1.0 401 Unauthorized');
    exit ("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='authentication failed';
        </script>");
      }

    }else{
        echo "<script>
        document.getElementById('alert').style.visibility='visible';
        document.getElementById('alert').innerText='user not found';
        </script>";
    }
}
else{
    mysqli_rollback($connection);
    exit("connection rollbacked");
}   
}
else{

    die("error: ".mysqli_connect_error());
}

$connection->close();

}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
    }
ob_end_flush();
session_write_close();
include '../layouts/footer.php';
?>