<html>
<head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
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
  background-image: url(images/1.jpg);
  background-size: cover;
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
.back{
  background-color: #ffad33;
  background-color: white;
  color: black;
}
      .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
            }
            #l{
                float: right;
            }
            .black{
                background-color: black;
                border-color: black;
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
            .space{
  margin: 80px;
}
.ispace
{
margin-bottom: 20px;
border-radius: 4px;
}
  </style>
</head>

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
                    $username=$_SESSION['username'];
                    echo "$username";
                 }
                 else
                 {
                    echo "<li id=l><a href=login.php class=black>Login</a></li>";
                 }
                 ?>
</a></li></ul>

      <form class="form-horizontal" action="studentsearch.php" method="post" style="margin:auto;max-width:1000px">

  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><hr></b>
  <div class="space">
            <input type="Submit" name="Submit" value="View your Information" class="w3-button w3-black ispace">
  <input type="Submit" name="delete" value="Delete your Information" class="w3-button w3-black ispace">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="w3-button w3-black ispace"><a href="form.php">New Form</a></button>
</div>
<div class="w3-container back">
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
if($conn = mysqli_connect($servername, $username, $password, $dbname))
{
   if($_POST['Submit'])
   {  
        if(isset($_SESSION['username']))
$username=$_SESSION['username'];
       $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
       $sql = "SELECT * FROM student2 natural join student3 where ID='$IDcheck'";
       $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));

          if (mysqli_num_rows($result) > 0) 
          {
             while($row = mysqli_fetch_assoc($result))
             {
              echo '<div top=400px left=1000px>
                 <ul>
                 <li><img src="data:image;base64,'.base64_encode($row['data']).'" width=100px height=100px align=right/></li>
                 <ul>
                 </div><br><br><br><br><br>'
              ;
                echo "<fieldset>
                <legend>Personal Information</legend><br>
                <ul><li>ID: {$row['ID']}</li>           
                 <br>
                  <li>Name : {$row['FirstName']} {$row['MiddleName']} {$row['LastName']}</li><br>
                  <li>Date of Birth : {$row['DateOfBirth']}</li><br>
                  <li>Gender : {$row['Gender']}</li><br>
                  <li>Permanent Address : {$row['PermanentAddress']}</li><br>
                  <li>Temperory Address : {$row['TemporaryAddress']}</li><br>
                  <li>City : {$row['City']}</li><br>
                  <li>State : {$row['State']}</li><br>
                  <li>Country : {$row['country']}</li></ul><br><br></fieldset>
                  <fieldset>
                  <legend>Contact Information</legend><br>
                  <ul>
                  <li>Mobile Number:   Student : {$row['PhoneS']}     Father : {$row['PhoneF']}     Mother : {$row['PhoneM']}</li><br>
                  <li>Is student localite? : {$row['Localite']}</li><br>
                  <li>Email Id : {$row['Email']}</li><br>
              </ul>
              </fieldset>";
              
    
                echo "<fieldset>
                <legend>Academic Information</legend><br>
                <h4>SSC</h4><br>
                <ul>
                <li>Passing Year: {$row['sscpy']}</li><br>
                 <li>Passing Board: {$row['sscboard']}</li><br>
                <li>Passing School: {$row['sscschool']}</li><br>
              <li>School Address: {$row['sscschooladd']}</li><br>
              <li>Marks Obtained: {$row['sscm']} out of {$row['sscfmarks']}</li><br>
              <li>Percentage: {$row['sscp']}</li><br>
              <li>Grade: {$row['sscg']}</li><br>
              </ul><br><br>
              <h4>HSC</h4><br>
              <ul>
              <li>Passing Year: {$row['hscpy']}</li><br>
              <li>Passing Board: {$row['hscboard']}</li><br>
              <li>Passing School: {$row['hscschool']}</li><br>
              <li>School Address: {$row['hscschooladd']}</li><br>
              <li>Marks Obtained: {$row['hscm']} out of {$row['hscfmarks']}</li><br>
              <li>Percentage: {$row['hscp']}</li><br>
              <li>Grade: {$row['hscg']}</li><br>
              </ul><br><br>
              <h4>Graduation</h4><br>
              <ul>
              <li>Starting Year: {$row['gsy']}</li><br>
              <li>Ending Year: {$row['gey']}</li><br>
              <li>Field: {$row['field']}</li><br>
              <li>Branch: {$row['branch']}</li><br>
              <li>Current Semester: {$row['cursem']}</li><br>
              <li>College Address: {$row['collegeadd']}</li><br>
              <li>Pointers Obtained: {$row['pointer']}</li><br>
              <li>Grade: {$row['grade']}</li><br>
              </ul><br></fieldset>";
              }
          }
          else{
            echo "No data Found";
          }
      }
    else
   {  
        if(isset($_SESSION['username']))
        $username=$_SESSION['username'];
        if($_POST['delete'])
        {
        $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
        $sql= "DELETE from student2 where ID='$IDcheck'";
        if (mysqli_query($conn, $sql)) 
        {
          echo "{$row['username']}";
          echo "Record deleted successfully";
        } 
        else 
        {
          echo "Error deleting record: " . mysqli_error($conn);
        }
        }
    }
  }
?>
</div>
</form>
    </body>
</html>