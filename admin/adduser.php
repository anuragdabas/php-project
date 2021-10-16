<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
    include '../layouts/adminloginnavbar.php';
    }else{
        header('location: adminlogin.php');
    }
?>
<?php
include 'adduserlayout.php';
?>
<?php
session_write_close();
?>