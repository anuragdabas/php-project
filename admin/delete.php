<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']==true){ 
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$username=$_SESSION['username'];
$query="SELECT username from admin_info WHERE username='$username' && main=1";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
$_SESSION['redirect']=true;
$_SESSION['deletable']=0;
}else{
$_SESSION['deletable']=1;
}
}else{
    echo "<script>alert('database not connected');</script>";
}
}else{
    header('location: ../errorpage.php');
}
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
<?php if(isset($_SESSION['deletable']) && $_SESSION['deletable']===1){
echo"
<img src='http://127.0.0.1/myproject/images/deleteaccount.png' class='rounded mx-auto d-block' alt='Email'  height='180px' width='280px' /><br>
<p class='h4 mb-4'>";if(isset($_SESSION['username'])){echo $_SESSION['username'];}echo "Are You Really Want To Delete Your Account?</p>
<p class='h4 mb-4'>Your Account Can Not Be Recovered Later!!!</p><br>
<hr>

<div class='text-center border border-light p-5'>
<a class='btn btn-info'  href='http://127.0.0.1/myproject/admin/deleted.php' target='_parent'> Yes</a>
<a class='btn btn-info'  href='http://127.0.0.1/myproject/admin/myinfo.php' target='_parent'>No</a>
</div>
";
}else{
echo"
<img src='http://127.0.0.1/myproject/images/cross.png' class='rounded mx-auto d-block' alt='Email'  height='180px' width='240px' /><br>
"; if(isset($_SESSION['username'])){echo $_SESSION['username'];}echo "
<hr>
<p>You Are The Main Admin Of This Site</p>
<p class='h4 mb-4'>So Your Account Can Not Be Deleted!!!</p><br>
"; }
?>
</div>
</div>
</div>
</body>
</html>
<?php
unset($_SESSION['deletable']);
session_write_close();
?>