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
                <h1>What is 127.0.0.1 and a loopback address?</h1><br>
                <p>Like an IP address, when typing google.com in a web browser it directs you to its local hosting website, Google’s main page. So where will localhost take you? It will take you to your computer. This situation is also known as a loopback address.</p>
                <p>Like any other domain name, localhost also has an IP (Internet Protocol) address. The addresses range from 127.0.0.0 to 127.255.255.255, but it’s normally 127.0.0.1. Trying to open the address 127.0.0.1 in an IPv4 connection will trigger a loopback, referring you back to your own web server. You can also start a loopback back to your own server with an IPv6 connection by entering :1.</p>
                <p>Fun fact: the first section of the address – 127 – is reserved only for loopbacks. For that reason, Transmission Control Protocol and Internet Protocol (TCP/IP) immediately recognize that you want to contact your computer after entering any address that starts with these numbers. That is why no websites can have IP addresses that begin with 127. If initiated, this action will create a loopback device; which is a virtual interface inside your computer’s operating system (OS).</p>
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