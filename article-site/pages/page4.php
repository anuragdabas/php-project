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
                <h1>What is localhost used for?</h1><br>
                <p style="font-size:45px; text-decoration:underline;">Program or Web Application Test</p>
                <p>Using localhost is one of the main uses for developers; especially if they are creating web apps or programs that require an internet connection. During development, tests are run to see if the applications actually work. By using a loopback to test them, developers can create a connection to the localhost, to be tested inside the computer and system they are currently using.</p>
                <p>Since your OS becomes a simulated web server once a loopback is triggered. You can load the necessary files of a program into the web servers and check its functionality.</p>
                <p style="font-size:45px;text-decoration:underline;">Site Blocking</p>
                <p>Another interesting trick is blocking websites that you do not wish to access. Loopback is useful for preventing your browser from entering harmful sites, like ones containing viruses.</p>
                <p>Before learning how this works, however, you need to know what “hosts file” is and its role in this context. As you already know, all domains have IP addresses. You can enter a website because the DNS or Domain Name System searches for the appropriate IP address under which the site is registered.</p>
                <p>Your computer helps improve this process by storing a hosts file for every site you have visited. This file contains the IP address and the domain names of websites. You can change the IP address into 127.0.0.1 and the site which hosts file you modified redirects you to the localhost instead.</p>
                <p>An example could be a company’s computer admin blocking access to a website.</p>
                <p style="font-size:45px;text-decoration:underline;">Speed Test</p>
                <p>As a network administrator, you will want to make sure that all equipment and the TCP/IP are in top condition. You can do this with a connection test and by sending a ping request to the localhost.</p>
                <p>For example, you can easily open the command prompt or the terminal and enter “ping localhost” or “ping 127.0.0.1”. The localhost test will show how well everything performs, from the number of data packets received, sent, or lost, to how long the data transmission takes. If there are any problems, you can immediately fix any that occur.</p>
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