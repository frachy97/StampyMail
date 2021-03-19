<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Franco Ferreyra- StampyMail</title>
  <link rel="stylesheet" href="<?= CSS_PATH ?>/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
  <link rel="shortcut icon" href="<?= IMG_PATH ?>/stampymail.png">
  <script type="text/javascript" src="<?= JS_PATH ?>/validators.js"></script>

</head>

<body>
 
  <div class="container">
      <div id="login">
        
        <div align="center" style="margin-bottom:20px;" >          
          <img src="<?= IMG_PATH?>/stampymail.png" >         
        </div>

        <form action="<?= FRONT_ROOT?>/user/login" method="POST" name="myForm" onsubmit="return(validator());">

            <p>
              <span class="fontawesome-user"></span>
              <input id="email" name="email" type="text" placeholder="Email" required>
            </p> 

            <p>
              <span class="fontawesome-lock"></span>
              <input id="password" name="password" type="password" placeholder="Password" required>
            </p> 

            <p><input type="submit" value="Sign In"></p>

        </form>

        <p>Franco Ferreyra francoferreyr4@gmail.com</p>

      </div>

  </div>





</body>
