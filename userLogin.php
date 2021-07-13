<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/userLogin.css">
    
    <title>Team Payaman | Clothing</title>
</head>
<body>
    <!-- LOGIN MODAL -->
<div class="modal-bg">
    <div class="login-container">
        <div class="close">
           +
        </div>

        <div class="container login-box">
            <h1> Login here </h1>

           <form action="./processes/login-process.php" method="POST">
              <table border="0">
                <tr>
                  <td> 
                    <input type="text" name="email" placeholder="Email address"> 
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="password" name="pass"  placeholder="Password">
                  </td>
                </tr>
                <tr>
                  <td> <a href="#" class="fp"> Forgot password? </a> </td>
                </tr>
                <tr>
                  <td><button type="submit" name="login-btn" id="login-btn"> Login </button></td>
                </tr>
              </table>
              <div class="division">
                  <hr> <p> Or login using </p> <hr>
              </div>
           </form>
              <div class="other-acc">
                  <button id="fb-btn">
                      <img src="./image/icons/facebook (1).png" alt="">
                      <p>Facebook</p>
                  </button>
                  <button id="google-btn">
                      <img src="./image/icons/google.png" alt="">
                      <p> Google </p>
                  </button>
              </div>

              <div class="reg-now">
                  <p> Don't have an account? <span id="reg-click"> Register now. </span></p>
              </div>
        </div>

        <div class="container reg-box">
            <h1> Register here </h1>
            <form action="./processes/login-process.php" method="POST">
                <table>
                  <tr>
                    <td><input type="text" name="fname" placeholder="Firstname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="lname" placeholder="Lastname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="address"placeholder="Address"></td>
                  </tr>
                  <tr>
                    <td><input type="email" name="useremail" placeholder="Email address"></td>
                  </tr>
                  <tr>
                    <td><input type="password" name="pword" placeholder="Password"></td>
                  </tr>
                  <tr>
                    <td> <button type="submit" name="register-btn" id="register-btn"> Register </button></td>
                  </tr>
                </table>
            </form>

              <div class="log-now">
                  <p> Already have an account? <span id="log-click"> Sign in now. </span></p>
              </div>

              <div class="agree-terms">
                  <p> By signing up, you agree to our <a href="#"> terms and agreement </a></p>
              </div>
        </div>
    </div>
</div>
<!--END OF LOGIN MODAL-->




<!--SCRIPT-->
<script src="./js/clickable.js"></script>
</body>
</html>