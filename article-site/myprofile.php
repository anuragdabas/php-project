<?php
session_name("authenication");
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']=true){
include 'bootstrap.php';
include 'layouts/loginnavbar.php';
include 'myprofilelayout.php';
}else{
    header('location: login.php');
}
?>
<?php
session_write_close();
?>