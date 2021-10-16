<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
include '../layouts/adminloginnavbar.php';
?>
<?php
include 'myadminprofilelayout.php';
?>
<?php
session_write_close();
?>