<html>
<head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .output{
        font-family: Arial;
        font-size: 20px;
        background-color: white;
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
            border-image: url(border.png) 20% round;
        }
body {
  font-family: Arial;
  background-image: url("images/3.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
#l{
                float: right;
            }
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
.black{
                background-color: black;
                border-color: black;
            }
  </style>
</head>

<body>
   <ul class="upper">
                <li><a href="faculty.html">SIS</a></li>
                <li><a href="faculty_studentsearch1.php">Students</a></li>
                <li><a href="searchpdf.php">Search PDF</a></li>
                <li id="l"><a href="logout.php"><button class="black" type="Submit" name="logout" value="LogOut">Logout</button></a></li>
                <li id="l"><a href="faculty_studentsearch1.php"><span class="glyphicon glyphicon-user"></span>

                <?php
                  session_start();
                    if(isset($_SESSION['Username'])){
                        $username = $_SESSION['Username'];
                        echo "$username";
                        }
                    else{
                          echo "<li id=l><a href='facultylogin.php'>Login</a></li>";        
                        }

                        ?>
</a></li></ul>
     <form class="form-horizontal" action="retrievepdf.php" target="_blank" method="post" style="margin:auto;max-width:1000px">
      <br><label>Search by:</label>
      <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" style="font-size: 20px; background-color: #19ad0e;" type="button" data-toggle="dropdown">Select query to search
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li id="e2" class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Certificates and PDFs<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>
            <li><a class="test" tabindex="-1" href="#">SSC Marksheet<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID1" tabindex="-1" placeholder="Enter Student Id"></li>
            <li><a class="test" tabindex="-1" href="#">HSC Marksheet<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID2" tabindex="-1" placeholder="Enter Student Id"></li>
            <li><a class="test" tabindex="-1" href="#">Student Address Proof<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID3" tabindex="-1" placeholder="Enter Student Id"></li>
            <li><a class="test" tabindex="-1" href="#">College Marksheet<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID4" tabindex="-1" placeholder="Enter Student Id"></li>
          </ul>
        </li>
       <li id="e2" class="dropdown-submenu">
         <a class="test" tabindex="-1" href="#">Publications<span class="caret"></span></a>
         <ul class="dropdown-menu">
         <li><a class="test" tabindex="-1" href="#">Publication PDF<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID5" tabindex="-1" placeholder="Enter Student Id"></li>
          </li>
        </ul>
      </li>
 <li id="e2" class="dropdown-submenu">
         <a class="test" tabindex="-1" href="#">Scholarship<span class="caret"></span></a>
         <ul class="dropdown-menu">
         <li><a class="test" tabindex="-1" href="#">Scholarship Proof<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID6" tabindex="-1" placeholder="Enter Student Id"></li>
          </li>
        </ul>
      </li>
    </ul>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="Submit" name="Submit" value="Search" style="font-size: 20px; background-color: #19ad0e;" class="btn success"></input>
  <b><hr></b>
</form>
<script>
        $(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
    </script>
</body>
</html>