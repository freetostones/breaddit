<?php
  include ('layout_manager.php');
  include ('content_function.php');
  addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
?>
<html>
  <head>
    <title>breaddit</title>
    <link href="/xampp/breaddit/css/main.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div class="header">
      <div class="title">
        <h1><a href="/xampp/breaddit/">breaddit</a></h1>
      </div>
      <p><i></i></p>
      <div class="login">
        <?php
          session_start();
          if(isset($_SESSION['username'])) {
            logout();
          }
          else {
            if(isset($_GET['status'])) {
              if($_GET['status'] == 'reg_success') {
                echo "<h1 style='color:green;'>New user registered successfully!</h1>";
              }
              else if ($_GET['status'] == 'login_fail') {
                echo "<h1 style='color:red;'>Invalid username and/or password</h1>";
              }
            }
            loginform();
          }
         ?>
      </div>
    </div>
    <div>
      <?php
        replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
       ?>
    </div>
    <div  class="content">
      <?php
        disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
        echo "<div class=''><p><b>All Replies (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")</b></p></div>";
        dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
       ?>
    </div>
  </body>
</html>
