<?php
session_name("authenication");
session_start();
include '../bootstrap.php';
if(isset($_SESSION['admin']) && $_SESSION['admin']===true){
  include '../layouts/adminloginnavbar.php';
  }elseif(isset($_SESSION['user']) && $_SESSION['user']===true){
  include '../layouts/loginnavbar.php';
  }else{
  header('location: ../errorpage.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .ss{
        background-image: url('http://127.0.0.1/myproject/images/lhost.jpg');
        background-repeat: no-repeat; 
        background-size:contain; 
        background-position:center center;
        background-attachment: fixed;
        }
        h1{
            text-align:center; 
            font-size:70px; 
            font-weight:bold;   
            color: black;   
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="ss">
<div class="container">
<div class="col-md-12 text-center">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>
<main>
          <div class="container">
            <!--Grid row-->
            <div class="row py-5">
              <!--Grid column-->
              <div class="col-md-12 text-center" style="color:black; font-size:28px;">
                <h1>Conclusion</h1><br>
                <p>Now you understand that localhost is not merely a technical term for your computer. It is a default name that enables you to test programs and even close access to websites. If you aspire to be an IT technician, it is essential to know what is localhost and how to use a loopback according to your needs.</p>
                </div>
              <!--Grid column-->
            </div>
            <br><br>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <button type="button" class="btn btn-info" onclick="location.replace('http://127.0.0.1/myproject/index.php');">1</button>
              <button type="button" class="btn btn-info" onclick="location.replace('http://127.0.0.1/myproject/pages/page2.php');">2</button>
              <button type="button" class="btn btn-info" onclick="location.replace('http://127.0.0.1/myproject/pages/page3.php');">3</button>
              <button type="button" class="btn btn-info" onclick="location.replace('http://127.0.0.1/myproject/pages/page4.php');">4</button>
              <button type="button" class="btn btn-info" onclick="location.replace('http://127.0.0.1/myproject/pages/page5.php');">5</button>
              </div>
            <!--Grid row-->
          </div>
        </main>
<br>
</body>
</html>
<?php
include '../layouts/footer.php';
session_write_close();
?>