<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Information System</title>
  <?php
    if($conn = mysqli_connect('localhost', 'root','','demo'))
    {
         if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password']; $confirmpassword=$_POST['confirmpassword'];
        if(isset($username) && isset($password)){
          if($password == $confirmpassword)
          {
        $INSERT = "insert into student1 values ('{$username}', '{$password}')";
        $q1= mysqli_query( $conn,$INSERT) or trigger_error(mysqli_error($conn));
        if($q1)
        {
             header('Location:login.php');
        }
        else
       {
         echo 'Already Registered';
        }
        }
        else
        {
          echo "Passwords are not same";
        }
      }
        
    }
  }
   ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.cs">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!--===============================================================================================-->
<style>
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>
</head>

<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/1.jpg');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Student Registration
        </span>
        <form action="register.php" method="post" class="login100-form validate-form p-b-33 p-t-5">

          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="email" name="username" placeholder="Email Address">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" id="password-field"  placeholder="Password">
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Confirm password">
            <input class="input100" type="password" name="confirmpassword"  id="conpassword-field" placeholder="Confirm Password">
            <span toggle="#conpassword-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <script text="javascript">
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$(".toggle-conpassword").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "confirmpassword") {
    input.attr("type", "text");
  } else {
    input.attr("type", "confirmpassword");
  }
});
</script>
          
          <div class="container-login100-form-btn m-t-32">
            <input type="Submit" value="Login" name="submit" class="login100-form-btn">&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="student.html" class="login100-form-btn">Back</a>
          </div>
          


        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>