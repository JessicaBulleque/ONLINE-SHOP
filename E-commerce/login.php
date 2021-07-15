<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Team Payaman | Clothing Line</title>
    <link rel="stylesheet" href="./css/loginStyle.css" />
    
  </head>
  <body>
<!--HEADER-->
  <div class="header">
    <div class="logo">
      <a href="../index.php"><img src="./icons/Logo.svg" alt=""></a>
    </div>
    











  <!--LOGIN FORM-->
    <div class="login-box">
      <h1>Login Here</h1>
      <form action="../processes/login-process.php" method="POST">
        <label for="email">
          Email
        </label><br>

        <input type="email" name="email" id="email"/><br>

        <label for="pass">
          Password
        </label><br>

        <input type="password" name="pass" id="pass" /><br>
        
        <a href="#" class="FP"><p>Forgot Password?</p></a>
        
        <input type="submit" name="login-btn"  value="LOG IN" />
      </form>
      
      <p class="account">
      Do Not have an account? <a href="register.php">Sign Up Here</a>
    </p>
    </div>
    
<!--END OF LOGIN FORM-->
</div>
  </body>
</html>

