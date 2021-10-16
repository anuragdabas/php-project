<?php
session_name("authenication");
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']==true && isset($_SESSION['username'])){
include '../bootstrap.php';
include '../layouts/adminloginnavbar.php';
include '../pages/page1.php';
include '../layouts/footer.php';
}else{
header('location: adminlogin.php');
}
session_write_close();
?>