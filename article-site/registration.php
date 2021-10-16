<?php
    session_name("authenication");
    session_start();
    session_regenerate_id(true);
    ob_start();
    $_SESSION['id']=session_id();
include 'bootstrap.php';
include 'layouts/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
<!-- Default form register -->
<form class="text-center border border-light p-5" method="post" name="reg" id="reg" action="<?php $_SERVER['PHP_SELF'] ?>"  onsubmit="return validation()">

    <p class="h4 mb-4">Sign up</p>
    <div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
    </div>

    <div class="form-row mb-4">
        <div class="col">
            <!-- User name -->
            <label for="username" class="lbl">Username:   </label>
            <input type="text" name="username" class="form-control" placeholder="enter your name" value="<?php if(isset($username)){echo $username;} ?>" required />
        </div>
    </div>

    <!-- E-mail -->
    <label for="email" class="lbl">Email:   </label>
    <input type="text" name="email" class="form-control mb-4" placeholder="enter your email" value="<?php if(isset($email)){echo $email;} ?>" required />

    <!-- Password -->
    <label for="password" class="lbl">Password:   </label>
    <input type="password" name="password" class="form-control" placeholder="enter your Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required />
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6 characters
    </small>
    <!-- repass -->
    <label for="repassword" class="lbl">Re-enter Password:   </label>
    <input type="password" name="repassword" class="form-control" placeholder="again enter your password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required />
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        Again Enter Your Password
    </small>

    <!-- Phone number -->
    <label for="mobilenumber" class="lbl">Phone Number:   </label>
    <input type="text" name="mobilenumber" pattern="[5-9]{1}[0-9]{9}" id="defaultRegisterPhonePassword" class="form-control" placeholder="enter your Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php if(isset($mobilenumber)){echo $mobilenumber;} ?>" required />
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        Required- for two step authentication
    </small>
    <!-- Default inline 1-->
<label for="gender" class="lbl">Gender:</label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="male" name="gender" value="male" <?php if(isset($gender)){echo "checked";} ?> />
  <label class="custom-control-label" for="male">Male</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="female" name="gender" value="female" <?php if(isset($gender)){echo "checked";} ?> />
  <label class="custom-control-label" for="female">Female</label>
</div>

<!-- Default inline 3-->
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="other" class="custom-control-input" name="gender" value="other" <?php if(isset($gender)){echo "checked";} ?> />
  <label class="custom-control-label" for="other">Others</label>
</div>
<br />
    <!-- Sign up button -->
    <input class="btn btn-info my-4 btn-block" type="submit" id="submit" name="submit" value="Sign Up" />

    <!-- Social register -->
    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="termsandconditions.php" target="_blank">terms of service</a>
    </p><br>
<p style="color: black;">already have a account?<a href="login.php" >log in here</a></p>
</form>
</div>
</div>
<!-- data validation -->
  <script src="http://127.0.0.1/myproject/js/forms.js" type="text/javascript"></script>
</body>
</html>
<?php

$username=$password=$repassword=$email=$gender=$state="";
if(isset($_POST['submit'])){
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);
$repassword=test_input($_POST['repassword']);
$email=test_input($_POST['email']);
$gender=test_input($_POST['gender']);
$mobilenumber=test_input($_POST['mobilenumber']);

$connection=new mysqli('localhost','root','','myform');
if($connection->connect_error){
    die("error: ".mysqli_connect_error());
}
else{
    $query="SELECT * FROM form_info WHERE email='$email'";
    $result=$connection->query($query);
    if($result->num_rows>0){
    die("<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='Email Already In Use With Another Account.Enter Another Email!!!!!';
    </script>");
    }else{
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    $salt="$2y$10$";
    $hash="fuck./bruteforce./5874";
    $password=crypt($password,$salt.$hash);
    $query="INSERT INTO form_info(username,password,email,mobilenumber,gender,created)
    VALUES ('$username','$password','$email','$mobilenumber','$gender',CURRENT_TIMESTAMP)";
    $result=$connection->query($query);
    //$result=mysqli_query($connection,$query);
    if($result){
        header("location: verification.php?id=".$_SESSION['id']."&email=".$email);
    }
    else{
        echo "error: ".mysqli_error($connection);
    }
}
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
session_unset();
session_destroy();
include 'layouts/footer.php';
?>