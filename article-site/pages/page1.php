<?php if(isset($_SESSION['admin']) || isset($_SESSION['user']) && isset($_SESSION['username'])){ ?>
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
                <h1>Localhost</h1><br>
                <p>A good way to think of localhost, in computer networking, is to look at it as “this computer”. It is the default name used to establish a connection with your computer using the loopback address network.</p>
                <p>The loopback address has a default IP (127.0.0.1) useful to test programs on your computer, without sending information over the internet. This helps when you are testing applications that aren’t ready for the world to see.</p>
                <p>When you call an IP address from your computer, you usually try to contact a different computer over the internet. However, with the loopback address, you are calling the localhost, aka your computer.</p>
                <p>If you want to learn about computer networking, it’s important to understand the language that you’ll run into. No better place to start, than learning about localhost</p>
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
      <?php }else{
      header('location: ../errorpage.php');  
      } ?>