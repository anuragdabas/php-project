<?php
session_name("authenication");
session_start();
include 'bootstrap.php';
if(isset($_SESSION['username'])){
if(isset($_SESSION['admin'])){
    include 'layouts/adminloginnavbar.php';    
}else{
include 'layouts/loginnavbar.php';
}
include 'pages/page1.php';
}else{
include 'layouts/navbar.php';
$_SESSION['m0v']=true;
include 'pages/mainpage.php';
}
?>

<?php
include 'layouts/footer.php';
session_write_close();
?>