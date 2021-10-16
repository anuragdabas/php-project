<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
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
    }
    }else{
        die();
    }
    mysqli_close($conn);
    }else{
    echo "<script>location.parent.replace('http://127.0.0.1/myproject/errorpage.php');</script>";    
    }
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
  <div style="margin-left: 12.5%;margin-right: 12.5%;">
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
<!-- Default form register -->
<form class="text-center border border-light p-5" method="post" name="reg" id="reg" action="<?php $_SERVER['PHP_SELF'] ?>"  onsubmit="return validation()">
<p class="h4 mb-4">Update Information</p><br>
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
    <div class="form-row mb-4">
        <div class="col">
            <!-- User name -->
            <label for="username" class="lbl">Username:   </label>
            <input type="text" class="form-control" name="username" value="<?php if(isset($username)){echo $username;} ?>" required />
        </div>
    </div>


    <label for="password" class="lbl">Password:   </label>
    <input type="text" class="form-control" name="password" value="<?php if(isset($password)){echo $password;} ?>" disabled />

    <!-- E-mail -->
    <label for="email" class="lbl">Email:   </label>
    <input type="text" name="email" class="form-control mb-4" value="<?php if(isset($email)){echo $email;} ?>" disabled />

    <!-- Phone number -->
    <label for="mobilenumber" class="lbl">Phone Number:   </label>
    <input type="text" name="mobilenumber" class="form-control" pattern="[5-9]{1}[0-9]{9}" value="<?php if(isset($mobilenumber)){echo $mobilenumber;} ?>" required /><br>
    <!-- Default inline 1-->
    <label class="lbl">Gender:</label>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="male" name="gender" value="male" <?php if(isset($gender) && $gender=='male'){echo "checked";} ?> />
  <label class="custom-control-label" for="male">Male</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="female" name="gender" value="female" <?php if(isset($gender) && $gender=='female'){echo "checked";} ?> />
  <label class="custom-control-label" for="female">Female</label>
</div>

<!-- Default inline 3-->
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="other" class="custom-control-input" name="gender" value="other" <?php if(isset($gender) && $gender=='other'){echo "checked";} ?> />
  <label class="custom-control-label" for="other">Others</label>
</div>
<br><br>


<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" name="verifiedemail" id="verifiedemail"  <?php if(isset($verifiedemail) && $verifiedemail==1){ echo "checked"; } ?> />
<label class="custom-control-label" for="verifiedemail">Verified Email</label>
</div>

<input class="btn btn-info my-4 btn-block" id="submit" type="submit" name="submit" value="Update" />
<br>
</form>
</div>
</div>
<script>
  function validate(){
   var name=document.forms['reg']['username'].value;
   var gender=document.querySelector('input[name="gender"]:checked');
   if(name.length<3){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="name must be at least 3 characters long";
            return false;
         }
         if(gender==null){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="select your gender";
            return false;
        } 
      }
$(document).ready(function(){
  $('#submit').click(function(){ 
  parent.location.reload();
});
});
</script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $username=test_input($_POST['username']);
  $mobilenumber=test_input($_POST['mobilenumber']);
  $gender=test_input($_POST['gender']);

if(isset($_POST['verifiedemail'])){
$e_ver=1;
}else{
$e_ver=0;
}

  $conn=mysqli_connect('localhost','root','','myform');
  if($conn){
  $query="UPDATE form_info SET username='$username',mobilenumber='$mobilenumber',gender='$gender',verifiedemail='$e_ver' WHERE email='$email' &&  ID='$idu' ";
  $res=mysqli_query($conn,$query);
  if($res){
  echo "<script>
  document.getElementById('alert').style.visibility='visible';
  document.getElementById('alert').innerText='Data Updated sucessfully';
  </script>";
  }
}else{
  die("<script>
  document.getElementById('alert').style.visibility='visible';
  document.getElementById('alert').innerText='can't connect to database';
  </script>");
}
mysqli_close($conn);
}
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
  }
session_write_close();
?>