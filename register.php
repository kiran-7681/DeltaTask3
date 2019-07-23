<?php include('server.php') ?>
<?php 
require_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style type="text/css">
     body{
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      
     }
     .content{
      margin:0px;
      padding: 0px;
      background: url(m.jpg) no-repeat;
      background-size: cover;
      width: 100%;
      height: 657px;
     }
     .register-box{
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        background: #1a1a1a;
        box-sizing: border-box;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 15px 25px rgba(0,0,0,.5);
        transform: translate(-50%,-50%);
        color: white;
     }
     .register-box h1{
        float: left;
        font-size: 45px;
        border-bottom: 6px solid #4caf50;
        margin-bottom: 50px;
        padding: 10px;
     }
     .textbox{
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        border-bottom: 8px 0;
        border-bottom: 1px solid #4caf50;
     }
     .textbox input{
        border: none;
        outline: none;
        background: none;
        color: white;
        font-size: 15px;
        width: 140px;
        float: left;
        margin: 0 8px;
     }
     .btn{
        width: 100%;
        background: none;
        border: 2px solid #4caf50;
        color: white;
        padding: 4px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
     }
     .register-box p{
        font-size: 18px;
        color: white;
     }
     .register-box a{
        color: #4caf50;
     }
  </style>
</head>
<body>
  <div class="content">
  <div class="register-box">
  	<h1>Register</h1>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="textbox">
  	  <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="textbox">
  	  <input type="email" placeholder="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="textbox">
  	  <input type="password" placeholder = "password" name="password_1">
  	</div>
  	<div class="textbox">
  	  <input type="password" placeholder = "re-enter password" name="password_2">
  	</div>
  	  <button type="submit" class="btn" name="reg_user">Sign up</button>

  	<p>
  		Already a member? <a href="login.php">Click Here</a>
  	</p>
  </div>
  </form>
</div>
</body>
</html>
