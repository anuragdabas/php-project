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
                <h1>Not just a name, but a number too</h1><br>
                <p>Don't let that confuse you. It's not much different from you typing in Disney.com or Amazon.com in your browser's address bar. Every website has its own IP address, but you substitute a "domain name" instead.</p>
                <p>So, when an IT person is running tests and he's "telling" an application to connect to the Internet, he'll type in the destination "localhost."</p>
                <p>In other words, he can pretend to be connecting to a Web server or another host computer, but he's keeping it in-house and close to home by using localhost.</p>
                <p>On almost all networking systems, localhost uses the IP address 127.0.0.1. That is the most commonly used IPv4 "loopback address" and it is reserved for that purpose. The IPv6 loopback address is ::1.</p>
                <p>Some computer types can be seen wearing shirts that say "There's no place like 127.0.0.1."</p>
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