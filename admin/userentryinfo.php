<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['keyofuser']) && isset($_SESSION['k1e9y7u5'])){
$username=$email=$mobilenumber=$gender='';
$idu=$_SESSION['k1e9y7u5'];

$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$query="SELECT username,password,email,mobilenumber,gender,verifiedemail FROM form_info WHERE ID='$idu' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
$row=mysqli_fetch_assoc($res);
$username=$row['username'];
$password=$row['password'];
$email=$row['email'];
$mobilenumber=$row['mobilenumber'];
$gender=$row['gender'];
$verifiedemail=$row['verifiedemail'];
if($verifiedemail==1){
  $_SESSION['verified']="yes";
}else{
  $_SESSION['verified']="no";
}
}
}else{
    die();
}
mysqli_close($conn);
session_write_close();
}else{
  header('location: adminlogin.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .lbl{
      float: left;
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; ">
<!-- Default form register -->
<form class="text-center border border-light p-5">
<?php if(isset($gender) && $gender==='male'){ ?>
<?php echo "
<img src='http://127.0.0.1/myproject/images/maleuser.jpg' class='rounded mx-auto d-block' alt='Email'  height='180px' width='240px' /><br>
";}elseif(isset($gender) && $gender==='female'){ ?>
<?php echo "
<img src='http://127.0.0.1/myproject/images/femaleuser.jpg' class='rounded mx-auto d-block' alt='Email'  height='180px' width='240px' /><br>
";}else{ ?>
<?php echo "
<img src='http://127.0.0.1/myproject/images/otheruser.jpg' class='rounded mx-auto d-block' alt='Email'  height='180px' width='240px' /><br>
";} ?>    

  <div class="form-row mb-4">
        <div class="col">
            <!-- User name -->
            <label for="username" class="lbl">Username:   </label>
            <input type="text" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" disabled />
        </div>
    </div>

    <label for="password" class="lbl">Password:   </label>
    <input type="text" class="form-control" value="<?php if(isset($password)){echo $password;} ?>" disabled />

    <!-- E-mail -->
    <label for="email" class="lbl">Email:   </label>
    <input type="text" class="form-control mb-4" value="<?php if(isset($email)){echo $email;} ?>" disabled />

    <!-- Phone number -->
    <label for="mobilenumber" class="lbl">Phone Number:   </label>
    <input type="text" class="form-control" value="<?php if(isset($mobilenumber)){echo $mobilenumber;} ?>" disabled /><br>
    <!-- Default inline 1-->
    <label class="lbl">Gender:</label>
    <input type="text" class="form-control" value="<?php if(isset($gender)){echo $gender;} ?>" disabled /><br>

    
    <label for="emailverified" class="lbl">Verified Email:   </label>
    <input type="text" class="form-control" value="<?php if(isset($_SESSION['verified'])){echo $_SESSION['verified']; } ?>" disabled />
    <br />
</form>
</div>
</div>
</body>
</html>