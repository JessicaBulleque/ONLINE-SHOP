<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginStyle.css">
    <title>Team Payaman | Clothing Line</title>
</head>
<body>
  <!--HEADER-->
  <div class="header">
    <div class="logo">
      <a href="#"><img src="./icons/Logo.svg" alt=""></a>
    </div>




<!--REGISTER STARTS HERE-->
<div class="signup-box">
      <h1>Sign Up</h1>
      <form action="../processes/login-process.php" method="POST">
        <label>First Name</label>
        <input type="text" name="fname" required/>
        <label>Last Name</label>
        <input type="text" name="lname" required/>
        <label>Email</label>
        <input type="email" name="useremail" required/>
        <label>Password</label>
        <input type="password" name="pword" required/>
        <label>Confirm Password </label>
        <input type="password" name="r-pword" />
        <input type="submit" name="register-btn" value="Submit" />
      </form>
      <p class="TandC">
        By clicking the Sign Up button,you agree to our <br />
        <a href="terms.php">Terms and Condition</a> and <a href="privacy.php">Policy Privacy</a>
      </p>

</div>
    <p class="account2">
      Already have an account? <a href="login.php">Login here</a>
    </p>

<!--REGISTER ENDS HERE-->
</body>
</html>