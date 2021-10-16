<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
if(isset($_SESSION['username'])){
  $name=$_SESSION['username'];
$conn=mysqli_connect('localhost','root','','myform');
if($conn){
$query="SELECT * FROM contact_us";
$res=mysqli_query($conn,$query);
$num=mysqli_num_rows($res);
if($num>0){
$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
$count =0;
}
mysqli_close($conn);
}else{
  echo "failed";
}
}
}else{
  header('location: adminlogin.php');
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
    <th>Email</th>
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
    <td><?php echo $rows['email']; ?></td>
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