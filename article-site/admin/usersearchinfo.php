<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
if(isset($_POST['search'])){
$conn=mysqli_connect('localhost','root','','myform');
$search=mysqli_real_escape_string($conn,$_POST['search']);
if($conn){
$query="SELECT * FROM form_info WHERE username='$search' OR email='$search' ";
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
<div style="float: left;">
<img src="http://127.0.0.1/myproject/images/back.png" title="back" class="rounded mx-auto d-block" alt="Back" id="back"  height="40px" width="80px" /><br>
</div>
<div style="margin-left: -4.5%;">
<br>
<?php if(isset($_SESSION['asucc']) && $_SESSION['asucc']=true){?>
<?php echo '
<div class="alert alert-primary" role="alert" id="alert">
Entry Deleted
</div>' ;
unset($_SESSION['asucc']);
}elseif(isset($_SESSION['aunsucc']) && $_SESSION['aunsucc']=true){ ?>
<?php echo '
<div class="alert alert-primary" role="alert" id="alert">
Can not Delete Entry Of Primary Admin
</div>' ;
unset($_SESSION['aunsucc']);
} ?>
<br>
<p class='h4 mb-4' style="text-align: center;">Users</p>
<br />
<table id="tablePreview" class="table">
<!--Table head-->
  <thead>
    <tr>
    <th><?php echo 'S.no'; ?></th>
    <th><?php echo 'username'; ?></th>
    <th><?php echo 'email'; ?></th>
    <th><?php echo 'mobile number'; ?></th>
    <th><?php echo 'Gender'; ?></th>
    <th><?php echo 'Verified Email'; ?></th>
    <?php if(isset($_SESSION['2e59p']) && $_SESSION['2e59p']==="r52E9"){ ?>
    <th><?php echo 'Action' ?></th>
    <?php }?>
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
  <?php foreach($row as $rows){ $count++; ?>
    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $rows['username']; ?></td>
      <td><?php echo '<small>'.$rows['email'].'</small>'; ?></td>
      <td><?php echo $rows['mobilenumber']; ?></td>
      <td><?php echo $rows['gender']; ?></td>
      <td><?php echo $rows['verifiedemail']; ?></td>
      <?php if(isset($_SESSION['2e59p']) && $_SESSION['2e59p']==="r52E9"){ ?>
      <?php //$_SESSION['k1e9y7u5']=$rows['ID'];?>
      <td><?php echo '<a href="http://127.0.0.1/myproject/admin/editentry.php?idu='.$rows['ID'].'" target="_parent"><img src="http://127.0.0.1/myproject/images/edit.png" width="28px" height="20px" alt="Edit" title="Edit"/></a><br /><br /> 
                      <a href="http://127.0.0.1/myproject/admin/deleteentry.php?idu='.$rows['ID'].'" target="_parent"><img src="http://127.0.0.1/myproject/images/delete.png" width="28px" height="20px" alt="Delete" title="Delete"/></a>' ?></td>
      <?php }?>
    </tr>
  <?php } ?>
  </tbody>
  <!--Table body-->
</table>
</div>
</div>
  <?php }else{?>
<div class="container">
<div style="float: left;">
<img src="http://127.0.0.1/myproject/images/back.png" title="back" class="rounded mx-auto d-block" alt="back" id="back"  height="40px" width="80px" /><br>
</div>
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
<script>
  $(document).ready(function(){
  $('#back').click(function(){
  document.location.replace('http://127.0.0.1/myproject/admin/usersinfo.php');
  });
  });
</script>
<?php
session_write_close();
?>
<!--Table-->