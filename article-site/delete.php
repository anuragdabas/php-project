<?php
session_name("authenication");
session_start();
include 'bootstrap.php';
if(isset($_SESSION['user']) && $_SESSION['user']=true){
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
<img src="http://127.0.0.1/myproject/images/deleteaccount.png" class="rounded mx-auto d-block" alt="Email"  height="180px" width="280px" /><br>
<p class="h4 mb-4"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?> Are You Really Want To Delete Your Account?</p>
<p class="h4 mb-4">Your Account Can Not Be Recovered Later!!!</p><br>
<hr>

<div class="text-center border border-light p-5">
<a class="btn btn-info"  href="http://127.0.0.1/myproject/deleted.php" target="_parent"> Yes</a>
<a class="btn btn-info"  href="http://127.0.0.1/myproject/myinfo.php">No</a>
</div>            
</div>
</div>
</div>
</body>
</html>
<?php
}else{
  header('location: login.php');
}
session_write_close();
?>