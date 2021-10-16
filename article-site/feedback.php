<?php
session_name("authenication");
session_start();
include 'bootstrap.php';
if(isset($_SESSION['user']) && $_SESSION['user']=true){
if(isset($_SESSION['username'])){
  $name=$_SESSION['username'];
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$query="SELECT email FROM form_info WHERE username='$name' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
$row=mysqli_fetch_assoc($res);
$email=$row['email'];
$query="SELECT message,date,subject FROM contact_us WHERE name='$name' OR email='$email' ";
$res=mysqli_query($conn,$query);
$num=mysqli_num_rows($res);
if($num>0){
  $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
  $count=0;
}
}
}else{
  header('location: login.php');
}
mysqli_close($conn);
}else{
  echo "failed";
}
}else{
  header('location: login.php');
}
?>
<?php if(isset($num) && $num>0){ ?>
<!--Table-->
<div class="container">
<div style="margin-right: 12.5%;">
<table id="tablePreview" class="table">
<!--Table head-->
  <thead>
    <tr>
      <th>S.no</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Date</th>
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
  <?php foreach($row as $rows){ $count++; ?>
    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $rows['subject']; ?></td>
      <td><?php echo $rows['message']; ?></td>
      <td><?php echo $rows['date']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
  <!--Table body-->
</table>
</div>
</div>
  <?php }else{?>
    <div class="container">
  <div style="margin-left: 12.5%;margin-right: 12.5%;">
<!-- Default form register -->
<div class="alert alert-primary" role="alert" id="alert" style="visibility:hidden;">
</div>
<div class="text-center border border-light p-5">
<img src="http://127.0.0.1/myproject/images/norecord.png" class="rounded mx-auto d-block" alt="Email"  height="380px" width="480px" /><br>
<p class="h4 mb-4" style="font-size: 30px;">No Data To Show</p>
</div>
</div>
</div>
  <?php }?>
<?php
session_write_close();
?>
<!--Table-->