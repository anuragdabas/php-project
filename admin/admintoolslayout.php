<?php if(isset($_SESSION['admin']) && $_SESSION['admin']==true){ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  #myinfo:hover{
    background-color: white;
  }
  #updateinfo:hover{
    background-color: white;
  }
  #feedback:hover{
    background-color: white;
  }
  #delete:hover{
    background-color: white;
  }
</style>
  </head>
<body>
<div style="margin-top: 140px; margin-bottom: 120px; width: 100%; height:600px;" id="maindiv">
<div style="float:right; width:80%;" id="iframediv">
<?php if(isset($_SESSION['r#diru']) && $_SESSION['r#diru']==true){ echo '
  <iframe src="http://127.0.0.1/myproject/admin/usersinfo.php" id="iframe" style="width: 100%; height:600px; max-height:600px; border:none;" title="My info">
</iframe>
';
unset($_SESSION['r#diru']);
$_SESSION['usucc']=true;
 }else{ 
if(isset($_SESSION['r#dira']) && $_SESSION['r#dira']==true){
echo '
<iframe src="http://127.0.0.1/myproject/admin/adminsinfo.php" id="iframe" style="width: 100%; height:600px; max-height:600px; border:none;" title="My info">
</iframe>
'; 
unset($_SESSION['r#dira']);
$_SESSION['asucc']=true;
}elseif(isset($_SESSION['nr#dira']) && $_SESSION['nr#dira']==true){
echo '
<iframe src="http://127.0.0.1/myproject/admin/adminsinfo.php" id="iframe" style="width: 100%; height:600px; max-height:600px; border:none;" title="My info">
</iframe>
';
unset($_SESSION['nr#dira']);
$_SESSION['aunsucc']=true;
}else{
echo '
<iframe src="http://127.0.0.1/myproject/admin/adminsinfo.php" id="iframe" style="width: 100%; height:600px; max-height:600px; border:none;" title="My info">
</iframe>
';  
}
}
 ?>
</div>
<div style="float:left; width:20%;">
<!-- Sidebar navigation -->
  <ul class="col-md-4" style="list-style-type: none; background-color:#0db9d4; min-width:90px;">
  <br><br>
    <!-- Logo -->

    <!--/. Logo -->
    <!-- Side navigation links -->
        <li><a class="collapsible-header waves-effect" id="adminsinfo">Admins Info</a>
        </li><br><br>
        <li><a class="collapsible-header waves-effect" id="usersinfo">Users Info</a>
        </li><br><br>
        <li><a class="collapsible-header waves-effect" id="usersfeedbacks">Users Feedbacks</a>
        </li><br><br><br>
    <!--/. Side navigation links -->
  </ul>
  <!--<div class="sidenav-bg"></div>-->
  </div>
<!--/. Sidebar navigation -->
</div>
<script>
  $(document).ready(function(){
    $('#adminsinfo').click(function(){
      $('#iframe').attr("src","http://127.0.0.1/myproject/admin/adminsinfo.php");
    });
    $('#usersinfo').click(function(){
      $('#iframe').attr("src","http://127.0.0.1/myproject/admin/usersinfo.php");
    });
    $('#usersfeedbacks').click(function(){
      $('#iframe').attr("src","http://127.0.0.1/myproject/admin/usersfeedbacks.php");
    });
  });
</script>
</body>
</html>
<?php
include '../layouts/footer.php';
}else{
header('location: ../errorpage.php');
}
?>