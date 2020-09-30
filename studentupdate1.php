<html>
<head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
  </style>
</head>

<body>
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <ul  id="ex1" > 
    <li><a class="active" href="#home">SIS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <?php
            session_start();
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];

                echo "<font color=white><li>$username</li></font>";
            }
            else{
                echo "<li><a href='facultylogin.php'>Login</a></li>";        
            }

            ?>
</ul>
<ul class="nav navbar-nav navbar-right">
  <a href="logouts.php"><input type="Submit" name="logout" value="LogOut"></a>
 </ul>
</div>
</nav>
    <div class="sidenav">
      </div>
      <form class="form-horizontal" action="studentsearch.php" method="post" style="margin:auto;max-width:1000px">

  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><hr></b>
            <input type="Submit" name="Submit" value="View your Information" class="btn-btn success">
  <input type="SUbmit" name="delete" value="Delete your Information" class="btn-btn success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn-btn success"><a href="update.php">Update Form</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn-btn success"><a href="form.php">Create New Form</a></button>

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

</form>
    </body>
</html>