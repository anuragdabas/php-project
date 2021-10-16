<?php
session_name("authenication");
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']==true && isset($_SESSION['username'])){
include 'bootstrap.php';
include 'layouts/loginnavbar.php';
include 'pages/page1.php';
include 'layouts/footer.php';
}else{
    header('location: login.php');
}
session_write_close();
?>