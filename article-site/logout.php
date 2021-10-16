<?php
session_name("authenication");
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
include 'bootstrap.php';
include 'layouts/navbar.php';
session_unset();
session_destroy();
if(session_status()==1){
echo "<script>
document.getElementById('alert').style.visibility='visible';
document.getElementById('alert').innerText='logged out';
    </script>";
}else{
    echo "<script>
    document.getElementById('alert').style.visibility='visible';
    document.getElementById('alert').innerText='Not logged out';
    </script>";
//    echo session_status();
//   echo session_id();
    exit;
}
}else{
    header('location: login.php');    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%; margin-top: 10%;">
<!-- Default form register -->
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
<div class="text-center border border-light p-5">
<img src="http://127.0.0.1/myproject/images/tick.png" class="rounded mx-auto d-block" alt="Email"  height="180px" width="280px" /><br>
<p class="h4 mb-4">You Are Sucessfully Logged out</p>
<p class="h4 mb-4">hope to see you soon</p><br>
<hr>
<p>Want to Sign In again?
        <a href="http://127.0.0.1/myproject/login.php">Sign In</a>
    </p>
</div>
</div>
</div>
</body>
</html>

<?php
include 'layouts/footer.php';
?>