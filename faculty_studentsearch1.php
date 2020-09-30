<html>
<head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <style>
    
.card-body{
            margin: 5px;
            bottom: 5px;
        }
        #visit{
            text-align:center;
            font-size:20px;
        }
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
  background-image: url("images/4.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
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
  color: white;
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
    <form class="form-horizontal" action="faculty_studentsearch1.php" method="post" style="margin:auto;max-width:1000px">
        <br><label style="color: green; font-size: 20px;">Search by:</label>
        <div class="dropdown">
    <button class="btn dropdown-toggle" type="button" style="font-size: 20px; background-color: #4ceb34;" data-toggle="dropdown">Select query to search
    </button>
    <ul class="dropdown-menu">
    <li id="e2" class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">All Students<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="alls" value="Y"></li>All Students
          </ul>
        </li>
      <li id="e2" class="dropdown-submenu">
          <a class="test" tabindex="-1" href="#">Student Id<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="text" name="ID" tabindex="-1" placeholder="Enter Student Id"></li>
          </ul>
        </li>
      <li id="e2" class="dropdown-submenu"><a class="test" tabindex="-1" href="#" >Name<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="text" tabindex="-1" name="names" placeholder="Enter Name"></li>
          </ul>
        </li>
        <li id="e2" class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">Area of Origin<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="area" value="Y"><label>Localite</label><br>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="area" value="N"><label>Non Localite</label></li>
          </ul>
        </li>
      <li id="e2" class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Competitive Exam <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a class="test" tabindex="-1" href="#">Search by Student Id<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ID2" tabindex="-1" placeholder="Enter Student Id"></li>
          <li><input type="radio" tabindex="-1" name="all" value="Y"><label>All Students</label><br></li>
          <li><input type="radio" tabindex="-1" name="gre" value="Y"><label>GRE</label><br></li>
            <li><input type="radio" tabindex="-1" name="gate" value="Y"><label>GATE</label><br></li>
            <li><input type="radio" tabindex="-1" name="cat" value="Y"><label>CAT</label><br></li>
            <li><input type="radio" tabindex="-1" name="ielts" value="Y"><label>IELTS</label><br></li>
            <li><input type="radio" tabindex="-1" name="toefl" value="Y"><label>TOEFL</label><br></li>
          </ul>
        </li>
        <li id="e2" class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">City<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="text" tabindex="-1" name="city" placeholder="Enter City Name"></li>
          </ul>
        </li>
        <li id="e2" class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">Placement<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="placement" value="Y"><label>Done</label><br>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="placement" value="N"><label>Not Done</label></li>
            <li><a class="test" tabindex="-1" href="#">Search by Student Id<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;<input type="text" name="ID3" tabindex="-1" placeholder="Enter Student Id"></li>
          </ul>
        </li>
        <li id="e2" class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">Internships/Projects<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;&nbsp;<input type="radio" tabindex="-1" name="internship" value="Y"><label>All Students</label><br>&nbsp;&nbsp;&nbsp;</li>
            <li><a class="test" tabindex="-1" href="#">Search by Student Id<span class="caret"></span></a>&nbsp;&nbsp;&nbsp;<input type="text" name="ID4" tabindex="-1" placeholder="Enter Student Id"></li>
          </ul>
        </li>
    </ul>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="Submit" name="Submit" value="Search" style="font-size: 20px; background-color: #4ceb34;" class="btn btn-success">Search</button>
  <b><hr></b><!--<div class="w3-container back">-->
    <div class="output">
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
if($conn = mysqli_connect($servername, $username, $password, $dbname))
{
   if($_POST['Submit'])
   {  
        if(isset($_SESSION['Username']))
$username=$_SESSION['Username'];

       if(isset($_POST['alls']))
          {
          
                  $alls=$_POST['alls'];
           $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql = "SELECT * FROM student2 natural join student3 where branch='$department'";
          $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          $Totalrows=mysqli_num_rows($result);
         if (mysqli_num_rows($result) > 0) 
          {
               echo " <div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Gender</th>
                                <th align=center>Permanent Address</th>
                                <th align=center>City</th>
                                <th align=center>Mobile Number</th>
                                <th align=center>Email Id</th>
                                <th align=center>Date of Birth</th>
                            </tr><br>";
            while($row = mysqli_fetch_assoc($result)) 
            {
                   echo "<tr>
                <td align=center>{$row['ID']}</td>
                  <td align=center>{$row['FirstName']} {$row['MiddleName']} {$row['LastName']}</td>
                  <td align=center>{$row['Gender']}</td>
                  <td align=center>{$row['PermanentAddress']}</td>
                  <td align=center>{$row['City']}</td>
                  <td align=center>{$row['PhoneS']}</td>
                  <td align=center>{$row['Email']}</td>
                  <td align=center>{$row['DateOfBirth']}</td>
                  </tr></div></div>";
              }
               echo "</table> Total Students:$Totalrows";
           } 

        }
       if($_POST['ID'])
       {
       $ID=$_POST['ID'];
       $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
       $sql = "SELECT * FROM student2 natural join student3 where ID='$ID' AND branch='$department'";
       $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));

          if (mysqli_num_rows($result) > 0) 
          {
             while($row = mysqli_fetch_assoc($result))
             {
              echo '<div top=400px left=1000px>
                 <ul>
                 <li><img src="data:image;base64,'.base64_encode($row['data']).'" width=150px height=150px align=right/></li>
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
              
              }
            } 
             $check="SELECT department from faculty1 where username='$username'";
             $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
             $row1=mysqli_fetch_assoc($result1);
             $department=$row1['department'];
             $sql = "SELECT * FROM student3 where ID='$ID' AND branch='$department'";
             $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
             if (mysqli_num_rows($result) > 0) 
            {
              while($row = mysqli_fetch_assoc($result)) 
              {
                echo "<fieldset>
                <legend>Academic Information</legend><br>
                <h4>SSC</h4><br>
                <ul>ID: {$row['ID']}</li><br>
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
      }
        if(isset($_POST['names']))
        {

          $names=$_POST['names'];
           $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql = "SELECT * FROM student2 natural join student3 where CONCAT(FirstName,' ',LastName)='$names' AND branch='$department'";
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
                    echo "

                    <fieldset>
                <legend>Personal Information</legend><br>
                <ul><li>ID: {$row['ID']}</li><br>
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
                  </ul></fieldset>
                  <fieldset>";
              }
             } 
             $sql = "SELECT * FROM student3 natural join student2 where CONCAT(FirstName,' ',LastName)='$names' AND branch='$department'";
             $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
             if (mysqli_num_rows($result) > 0)  
             {
                while($row = mysqli_fetch_assoc($result)) 
               {
                   echo "<fieldset>
              <legend>Academic Information</legend><br>
              <h4>SSC</h4><br>
              <ul>ID: {$row['ID']}</li><br>
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
        }
        if(isset($_POST['area']))
          {
          
                  $area=$_POST['area'];
           $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql = "SELECT * FROM student2 natural join student3 where Localite='$area' AND branch='$department'";
          $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));

         if (mysqli_num_rows($result) > 0) 
          {
               echo "
               <div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Gender</th>
                                <th align=center>Permanent Address</th>
                                <th align=center>City</th>
                                <th align=center>Mobile Number</th>
                                <th align=center>Email Id</th>
                                <th align=center>Date of Birth</th>
                            </tr><br>";
            while($row = mysqli_fetch_assoc($result)) 
            {
                   echo "<tr>
                <td align=center>{$row['ID']}</td>
                  <td align=center>{$row['FirstName']} {$row['MiddleName']} {$row['LastName']}</td>
                  <td align=center>{$row['Gender']}</td>
                  <td align=center>{$row['PermanentAddress']}</td>
                  <td align=center>{$row['City']}</td>
                  <td align=center>{$row['PhoneS']}</td>
                  <td align=center>{$row['Email']}</td>
                  <td>{$row['DateOfBirth']}</td>
                  </tr>";
              }
               echo "</table>";
           } 

        }
        if(isset($_POST['all']))
        {

          $all=$_POST['all'];
          if($all=='Y')
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
              $sql="SELECT * From student4 Natural join student2 natural join student3 where branch='$department' AND exam='Y'";
            $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) 
               {
                        echo "<div class=card id=flip>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>GATE Given?</th>
                                <th align=center>GATE Score</th>
                                <th align=center>GRE Given?</th>
                                <th align=center>GRE Score</th>
                                <th align=center>IELTS Given?</th>
                                <th align=center>IELTS Score</th>
                                <th align=center>TOEFL Given?</th>
                                <th align=center>TOEFL Score</th>
                                <th align=center>CAT Given?</th>
                                <th align=center>CAT Score</th>
                            </tr>";
                 while($row = mysqli_fetch_assoc($result)) 
                  {
                     echo "<tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['FirstName']} {$row['LastName']}</td>
                                <td align=center>{$row['exams1']}</td>
                                <td align=center>{$row['sgate']}</td>
                                <td align=center>{$row['exams2']}</td>
                                <td align=center>{$row['sgre']}</td>
                                <td align=center>{$row['exams3']}</td>
                                <td align=center>{$row['sielts']}</td>
                                <td align=center>{$row['exams4']}</td>
                                <td align=center>{$row['stoefl']}</td>
                                <td align=center>{$row['exams5']}</td>
                                <td align=center>{$row['scat']}</td>
                            </tr>";
                   }
                    echo "</table>";
                }
                else
                {
                  echo "No Students have given exam";
                }
            }
      
        }
        if(isset($_POST['gre']))
        {
    
          $gre=$_POST['gre'];
          if($gre=="Y")
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql="SELECT ID,CONCAT(FirstName,LastName) as Name,sgre From student4 Natural join student2 natural join student3 where branch='$department' AND exams2='GRE'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
          {
                echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>GRE Score</th>
                            </tr>";
            while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['Name']}</td>
                                <td align=center>{$row['sgre']}</td>
                           </tr>";
                }
                echo "</table>";
          }
          else
          {
            echo "No One has given GRE";
          }
          }
        }
        if(isset($_POST['gate']))
        {

          $gate=$_POST['gate'];
          if($gate=='Y')
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql="SELECT ID,CONCAT(FirstName,LastName) as Name,sgate From student4 Natural join student2 natural join student3 where branch='$department' AND exams1='GATE'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
          {
                echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>GATE Score</th>
                            </tr>";
            while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['Name']}</td>
                                <td align=center>{$row['sgate']}</td>
                           </tr>";
                }
                echo "</table>";
          }
          else
          {
            echo "No One has given GATE";
          }
        }
        }
        if(isset($_POST['cat']))
        {
   
          $cat=$_POST['cat'];
          if($cat=='Y')
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql="SELECT ID,CONCAT(FirstName,LastName) as Name,scat From student4 Natural join student2 natural join student3 where branch='$department' AND exams5='CAT'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
          {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>GATE Score</th>
                            </tr>";
            while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['Name']}</td>
                                <td align=center>{$row['scat']}</td>
                           </tr>";
                }
                echo "</table>";
          }
          else
          {
            echo "No One has given CAT";
          }
        }
        }
        if(isset($_POST['ielts']))
        {
    
          $ielts=$_POST['ielts'];
          if($ielts=='Y')
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql="SELECT ID,CONCAT(FirstName,LastName) as Name,sielts From student4 Natural join student2 natural join student3 where branch='$department' AND exams3='IELTS'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
          {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>IELTS Score</th>
                            </tr>";
            while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['Name']}</td>
                                <td align=center>{$row['sielts']}</td>
                           </tr>";
                }
                echo "</table>";
          }
          else
          {
            echo "No One has given IELTS";
          }
        }
        }
        if(isset($_POST['toefl']))
        {
   
          $toefl=$_POST['toefl'];
          if($toefl=='Y')
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql="SELECT ID,CONCAT(FirstName,LastName) as Name,stoefl From student4 Natural join student2 natural join student3 where branch='$department' AND exams4='TOEFL'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
          {
                                echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>TOEFL Score</th>
                            </tr>";
            while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['Name']}</td>
                                <td align=center>{$row['stoefl']}</td>
                           </tr>";
                }
                echo "</table>";
          }
          else
          {
            echo "No One has given TOEFL";
          }
        }
        }
        if(isset($_POST['ID2']))
        {
    
           $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $ID2=$_POST['ID2'];
          $sql="SELECT * From student4 Natural join student2 natural join student3 where ID='$ID2' AND branch='$department'";
          $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) 
            {
                echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>GATE Given?</th>
                                <th align=center>GATE Score</th>
                                <th align=center>GRE Given?</th>
                                <th align=center>GRE Score</th>
                                <th align=center>IELTS Given?</th>
                                <th align=center>IELTS Score</th>
                                <th align=center>TOEFL Given?</th>
                                <th align=center>TOEFL Score</th>
                                <th align=center>CAT Given?</th>
                                <th align=center>CAT Score</th>
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                  echo " <tr>
                                <td align=center>{$row['ID']}</td>
                                <td align=center>{$row['FirstName']} {$row['LastName']}</td>
                                <td align=center>{$row['exams1']}</td>
                                <td align=center>{$row['sgate']}</td>
                                <td align=center>{$row['exams2']}</td>
                                <td align=center>{$row['sgre']}</td>
                                <td align=center>{$row['exams3']}</td>
                                <td align=center>{$row['sielts']}</td>
                                <td align=center>{$row['exams4']}</td>
                                <td align=center>{$row['stoefl']}</td>
                                <td align=center>{$row['exams5']}</td>
                                <td align=center>{$row['scat']}</td>
                            </tr>";
                }
                echo "</table>";
            }
        }
        if(isset($_POST['city']))
        {
   
          $city=$_POST['city'];
           $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
          $sql = "SELECT * FROM student2 natural join student3 where City='$city' AND branch='$department'";
          $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));

           if (mysqli_num_rows($result) > 0) 
          {
               echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Gender</th>
                                <th align=center>Permanent Address</th>
                                <th align=center>City</th>
                                <th align=center>Mobile Number</th>
                                <th align=center>Email Id</th>
                                <th align=center>Date of Birth</th>
                            </tr><br>";
            while($row = mysqli_fetch_assoc($result)) 
            {
                   echo "<tr>
                <td align=center>{$row['ID']}</td>
                  <td align=center>{$row['FirstName']} {$row['MiddleName']} {$row['LastName']}</td>
                  <td align=center>{$row['Gender']}</td>
                  <td align=center>{$row['PermanentAddress']}</td>
                  <td align=center>{$row['City']}</td>
                  <td align=center>{$row['PhoneS']}</td>
                  <td align=center>{$row['Email']}</td>
                  <td>{$row['DateOfBirth']}</td>
                  </tr>";
              }
               echo "</table>";
           } 
            

        }
        if(isset($_POST['placement']))
        {
          
       $placement=$_POST['placement'];
          if($placement == "Y")
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
            $sql="SELECT * From student5 Natural join student2 natural join student3 where branch='$department' AND placement='$placement'";
            $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
                  
                if (mysqli_num_rows($result) > 0) 
               {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Placement</th>
                                <th align=center>Company Name</th>
                                <th align=center>Cost to Company</th>
                                <th align=center>Mode of Placement</th>
                            </tr>";
                 while($row = mysqli_fetch_assoc($result)) 
                {
                       echo "<tr>
                            <td align=center>{$row['ID']}</td>
                            <td align=center>{$row['FirstName']}{$row['LastName']}</td>
                            <td align=center>{$row['placement']}</td>
                            <td align=center>{$row['cname']}</td>
                            <td align=center>{$row['ctc']}</td>
                            <td align=center>{$row['campus']}</td>
                        </tr>";
                   }
                    echo "</table>";
                }
                else
                {
                        echo "No One is placed";
                }
            }
            else
            {
              if($placement == "N")
              {
                 $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
                 $sql="SELECT * From student5 Natural join student2 natural join student3 where branch='$department' AND placement='$placement'";
                 $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));

                    if (mysqli_num_rows($result) > 0) 
                    {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Placement</th>
                            </tr>";
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                       echo "<tr>
                            <td align=center>{$row['ID']}</td>
                            <td align=center>{$row['FirstName']}{$row['LastName']}</td>
                            <td align=center>{$row['placement']}</td>
                        </tr>";
                    }
                    echo "</table>";
                    }
                }
            }
        }
        if(isset($_POST['ID3']))
        {

            $ID3=$_POST['ID3'];
             $check="SELECT department from faculty1 where username='$username'";
             $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row1=mysqli_fetch_assoc($result1);
             $department=$row1['department'];
             $sql="SELECT * From student5 Natural join student2 natural join student3 where ID='$ID3' AND branch='$department'";
              $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
              if (mysqli_num_rows($result) > 0) 
                {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Placement</th>
                                <th align=center>Company Name</th>
                                <th align=center>Cost to Company</th>
                                <th align=center>Mode of Placement</th>
                            </tr>";
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                  echo "<tr>
                            <td align=center>{$row['ID']}</td>
                            <td align=center>{$row['FirstName']}{$row['LastName']}</td>
                            <td align=center>{$row['placement']}</td>
                            <td align=center>{$row['cname']}</td>
                            <td align=center>{$row['ctc']}</td>
                            <td align=center>{$row['campus']}</td>
                        </tr>";
                 }
                echo "</table>";
            }
        }
        if(isset($_POST['internship']))
        {
          
       $internship=$_POST['internship'];
          if($internship == "Y")
          {
             $check="SELECT department from faculty1 where username='$username'";
       $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
       $row1=mysqli_fetch_assoc($result1);
       $department=$row1['department'];
            $sql="SELECT * From student5 Natural join student2 natural join student3 where branch='$department' AND placement is NULL";
            $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
                  
                if (mysqli_num_rows($result) > 0) 
               {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Company Name/Project Name</th>
                                <th align=center>Stipend</th>
                                <th align=center>Guide</th>
                                <th align=center>Description</th>
                                <th align=center>Duration in Months</th>
                            </tr>";
                 while($row = mysqli_fetch_assoc($result)) 
                {
                       echo "<tr>
                            <td align=center>{$row['ID']}</td>
                            <td align=center>{$row['FirstName']}{$row['LastName']}</td>
                            <td align=center>{$row['icname1']}</td>
                            <td align=center>{$row['stipend1']}</td>
                            <td align=center>{$row['mentor']}</td>
                            <td align=center>{$row['des']}</td>
                            <td align=center>{$row['sem1']}</td>
                        </tr>";
                   }
                    echo "</table>";
                }
            }
            }
        if(isset($_POST['ID4']))
        {

            $ID4=$_POST['ID4'];
             $check="SELECT department from faculty1 where username='$username'";
             $result1 = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row1=mysqli_fetch_assoc($result1);
             $department=$row1['department'];
             $sql="SELECT * From student5 Natural join student2 natural join student3 where ID='$ID4' AND branch='$department' AND placement is NULL";
              $result= mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
              if (mysqli_num_rows($result) > 0) 
               {
                    echo "<div class=card id=flip >
            <div class=card-body>
            <div id=visit>
               <table class='table table-hover'>
                            <tr>
                                <th align=center>Student Id</th>
                                <th align=center>Name</th>
                                <th align=center>Company Name/Project Name</th>
                                <th align=center>Stipend</th>
                                <th align=center>Guide</th>
                                <th align=center>Description</th>
                                <th align=center>Duration in Months</th>
                            </tr>";
                 while($row = mysqli_fetch_assoc($result)) 
                {
                       echo "<tr>
                            <td align=center>{$row['ID']}</td>
                            <td align=center>{$row['FirstName']}{$row['LastName']}</td>
                            <td align=center>{$row['icname1']}</td>
                            <td align=center>{$row['stipend1']}</td>
                            <td align=center>{$row['mentor']}</td>
                            <td align=center>{$row['des']}</td>
                            <td align=center>{$row['sem1']}</td>
                        </tr>";
                   }
                    echo "</table>";
                }
        }
    }
}
?></div>
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