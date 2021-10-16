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
if(isset($_GET['idu'])){
$_SESSION['k1e9y7u5']=$_GET['idu'];
$_SESSION['&u#52npt']=true;
include 'deleteuserentry.php';
}elseif(isset($_GET['ida'])){
$_SESSION['k1e9y7a5']=$_GET['ida'];
$_SESSION['&a#52npt']=true;
include 'deleteadminentry.php';
}
?>
<?php
session_write_close();
?>