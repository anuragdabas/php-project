<?php
include '../bootstrap.php';
if(isset($_SESSION['keyofadmin']) && isset($_SESSION['k1e9y7a5']) && isset($_SESSION['&a#52npt'])){
$ida=$_SESSION['k1e9y7a5'];
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$query="SELECT main FROM admin_info WHERE ID='$ida' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
$row=mysqli_fetch_assoc($res);
if($row['main']==1){
$_SESSION['nr#dira']=true;
header('location: admintools.php');
die();
}else{
$query="DELETE FROM admin_info WHERE id='$ida' ";
$res=mysqli_query($conn,$query);
if($res){
$_SESSION['r#dira']=true;
header('location: admintools.php');
die();    
}
    
    }
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
unset($_SESSION['&a#52npt']);
?>