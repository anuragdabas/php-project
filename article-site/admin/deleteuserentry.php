<?php
include '../bootstrap.php';
if(isset($_SESSION['keyofuser']) && isset($_SESSION['k1e9y7u5']) && isset($_SESSION['&u#52npt'])){
$idu=$_SESSION['k1e9y7u5'];
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$query="DELETE FROM form_info WHERE id='$idu' ";
$res=mysqli_query($conn,$query);
if($res){
$_SESSION['r#diru']=true;
header('location: admintools.php');
    die();    
    }
}else{
    echo "<script>
    alert('Not Connected To DataBase');
        </script>";  
        exit();  
}
mysqli_close($conn);
}else{
header('location: ../errorpage.php');
}
unset($_SESSION['&u#52npt']);
?>
