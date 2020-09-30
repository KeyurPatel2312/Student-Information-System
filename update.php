<html>

<body>
   <ul class="upper">
                <li><a class="hov" href="student.html">SIS</a></li>
                <li><a class="hov" href="studentsearch.php">Students</a></li>
                <li><a class="hov" href="update.php">Update Your Information</a></li>
                <li id="l"><a class="hov1" href="logouts.php"><button class="black" type="Submit" name="logout" value="LogOut">Logout</button></a></li>
                <li id="l"><a class="hov" href="studentsearch.php"><span class="glyphicon glyphicon-user"></span>
                <?php
                  session_start();
                  if(isset($_SESSION['username']))
                  {
                        $username = $_SESSION['username'];
                        echo "$username";
                  }
                  else
                  {

                    echo "<li id=l><a href='login.php'>Login</a></li>";        
                  }

                 ?>
</a></li></ul>
    <head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <style>
      body {
  font-family: sans-serif;
  background-image: url("images/g4.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

input[type=text]{
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 15px;
  background-color: white;
  color: #3d3838;
}
 legend,label{
           
            color: black;
        }
        hr{
            border-top: 3px solid black;
        }
    h1{
            text-align: center;
            font-style: italic;
            font-size: 2.5em;  /* 40px/16=2.5em */
            border: 10px solid transparent;
            padding: 15px;
            color: black;
            border-image: url(border.png) 20% round;
        }
body {
  font-family: Arial;
}
.space{
  margin: 80px;
}
.ispace
{
margin-bottom: 20px;
border-radius: 4px;
}

input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
}

        /* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  margin-top: 48px;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}
#ex1{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  list-style-type: none;
  float:left;
}
        #e2{
            float:none;
        }

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
#l{
                float: right;
            }
            .black{
                background-color: black;
                border-color: black;
            }
            .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
            }
            .hov {
                margin: 0px;
                color: white;
                padding: 16px;
                text-decoration: none;
                display: block;
            }
            .hov:hover {
                background-color: #ddd;
                color: black;
            }
            .hov1 {
                margin: 0px;
                color: white;
                padding: 16px;
                text-decoration: none;
                display: block;
            }
            .hov1:hover {
                background-color: #ddd;
                color: white;
            }

  </style>
</head>

      <form class="form-horizontal" action="update.php" method="post" style="margin:auto;max-width:1000px">
        <div class="w3-container space">
      <a href="updateform.php" style="width: 400px;" class="w3-button w3-black ispace">Update Personal Information</a>
      <a href="updateinfo.php" style="width: 400px;" class="w3-button w3-black ispace">Update Academic Information</a>
      <a href="updateexam.php" style="width: 400px;" class="w3-button w3-black ispace">Update Competitive Exam Information</a>
      <a href="updatepdf.php" style="width: 400px;" class="w3-button w3-black ispace">Update PDF Information</a>
      <a href="updateplacement.php" style="width: 400px;" class="w3-button w3-black ispace">Update Placement Information</a>
      <a href="updatepublication.php" style="width: 400px;" class="w3-button w3-black ispace">Update Publication Information</a>
      <a href="updatescholarship.php" style="width: 400px;" class="w3-button w3-black ispace">Update Scholarship Information</a>
    </div>
  </form>
    </body>
</html>