<?php
session_name("authenication");
session_start();
include 'bootstrap.php';
if(isset($_SESSION['username'])){
include 'layouts/loginnavbar.php';
}else{
include 'layouts/navbar.php';
}
?>
<?php
$_SESSION['contact']=true;
include 'contactphp.php';
?>
<?php
include 'layouts/footer.php';
unset($_SESSION['contact']);
session_write_close();
?>