<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
  font-family: sans-serif;
  background-image: url("images/g4.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
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
        h2{
            text-align: center;
            text-transform: uppercase;
            font-style: bold;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "sans-serif";
            border: 10px solid transparent;
            padding: 15px;
            border-image: url(border.png) 20% round;
        }
        legend{
            font-family: "Alfa Slab One";
        }
        #l{
                float: right;
            }
            .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
    </style>
</head>
<?php
if($conn = mysqli_connect('localhost', 'root','','demo'))
{
if($_POST['Submit'])
{
    $s_id = $_POST['s_id'];
$sscpy = $_POST['sscpy'];
$sscboard = $_POST['sscboard'];
$sscschool = $_POST['sscschool'];
$sscschooladd = $_POST['sscschooladd'];
$sscfmarks = $_POST['sscfmarks'];
$sscm = $_POST['sscm'];
$sscg = $_POST['sscg'];
$hscpy = $_POST['hscpy'];
$hscboard = $_POST['hscboard'];
$hscschool = $_POST['hscschool'];
$hscschooladd = $_POST['hscschooladd'];
$hscfmarks = $_POST['hscfmarks'];
$hscm = $_POST['hscm'];
$hscg = $_POST['hscg'];
$gsy = $_POST['gsy'];
$gey = $_POST['gey'];
$field = $_POST['field'];
$Department = $_POST['Department'];
$cursem = $_POST['cursem'];
$college = $_POST['college'];
$collegeadd = $_POST['collegeadd'];
$grade = $_POST['grade'];
$pointer=$_POST['pointer'];


if(isset($s_id) && isset($sscpy) && isset($sscboard) && isset($sscschool) && isset($sscschooladd) && isset($sscfmarks) && isset($sscm) && isset($sscg) && isset($hscpy) && isset($hscboard) && isset($hscschool) && isset($hscschooladd) && isset($hscfmarks) && isset($hscm) && isset($hscg) && isset($gsy) && isset($gey) && isset($field) && isset($Department) && isset($cursem) && isset($college) && isset($collegeadd) && isset($grade) && isset($pointer))
{
    $sscp=($sscm/$sscfmarks)*100;
    $hscp=($hscm/$hscfmarks)*100;
    $INSERT = "insert into student3  values ('{$s_id}', '{$sscpy}', '{$sscboard}', '{$sscschool}', '{$sscschooladd}', '{$sscfmarks}','{$sscm}','{$sscp}','{$sscg}', '{$hscpy}', '{$hscboard}', '{$hscschool}', '{$hscschooladd}', '{$hscfmarks}', '{$hscm}','{$hscp}','{$hscg}','{$gsy}','{$gey}','{$field}','{$Department}','{$cursem}','{$college}','{$collegeadd}','{$grade}','{$pointer}')";
}
    
    $q1=$result = mysqli_query($conn,$INSERT) or trigger_error(mysqli_error($conn));
    if($q1)
    {
        header('Location:exam.php');
    }
    else
    {
        echo 'Error';
    }
}
}

?>
    <body>
       <ul class="upper">
                <li><a href="#">SIS</a></li>
                <li id="l"><a href="logout.php"><button class="black" type="Submit" name="logout" value="LogOut">Logout</button></a></li>
                <li id="l"><a class="hov" href="studentsearch.php"><span class="glyphicon glyphicon-user"></span>                

                <?php
                  session_start();
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        echo "$username";
                        }
                    else{
                          echo "<li id=l><a href='facultylogin.php'>Login</a></li>";        
                        }

                        ?>
</a></li></ul>
<div class="container">
    <form name="addem" class="form-horizontal" action="info.php" method="post">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Academic Information:</h2></center>
        <fieldset>
            <legend>SSC:</legend><br>
            <label>Passing Year:<font color="red"><sup>*</sup></font><input type="text" name="sscpy" class="form-control" required></label><br>
            <label>Board:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="sscboard" required></label><br>
            <label>School:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="sscschool" required></label><br>
            <label>School Address:<font color="red"><sup>*</sup></font><textarea rows="10" cols="50" placeholder="Enter school Address here..." class="form-control" name="sscschooladd" required></textarea></label><br>
            <label>Full Marks:<font color="red"><sup>*</sup></font><input type="text" name="sscfmarks" class="form-control" required></label><br>
            <label>Marks Obtained:<font color="red"><sup>*</sup></font><input type="text" name="sscm" class="form-control" onkeyup="calculateTotal1()" required></label><br>
            <label>Percentage:<span id="update"></span><font color="red"><sup>*</sup></font><label type="text"  name="sscm"></label></label><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="sscg" required></label><br><br>
        </fieldset>
        <fieldset>
            <legend>HSC:</legend><br>
            <label>Passing Year:<font color="red"><sup>*</sup></font><input type="text" name="hscpy" class="form-control" required></label><br>
            <label>Board:<font color="red"><sup>*</sup></font><input type="text" name="hscboard" class="form-control" required></label><br>
            <label>School:<font color="red"><sup>*</sup></font><input type="text" name="hscschool" class="form-control" required></label><br>
            <label>School Address:<font color="red"><sup>*</sup></font><textarea rows="10" cols="50" placeholder="Enter school Address here..." class="form-control" name="hscschooladd" required></textarea></label><br>
            <label>Full Marks:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="hscfmarks" required></label><br>
            <label>Marks Obtained:<font color="red"><sup>*</sup></font><input type="text" name="hscm" class="form-control" onkeyup="calculateTotal2()"  required></label><br>
            <label>Percentage</label>:<span id="update1"></span><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="hscg" required></label><br><br>
        </fieldset>
        <fieldset>
            <legend>Graduation:</legend>
            <label>Starting Year:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="gsy" required></label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Ending Year:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="gey" required></label><br>
            <label>Field:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="field" required></label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Department : <select name="Department" class="form-control">
            <option value="CH">Chemical Engineering</option>
            <option value="CL">Civil Engineering</option>
            <option value="CSE">Computer Science and Engineering</option>
            <option value="EC">Electronics and Communication Engineering</option>
            <option value="EE">Electrical Engineering</option>           
            <option value="IC">Instrumentation and Control</option>
            <option value="IT">Information Technology</option>
            <option value="ME">Mechanical Engineering</option>
            </select>
            </label>
            <br><br>
            <label>Current Semester:<font color="red"><sup>*</sup></font><input type="number" class="form-control" min="1" max="8" step="1" name="cursem" required></label><br>
            <label>College/University:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="college" required></label><br>
            <label>College/University Address:<font color="red"><sup>*</sup></font><textarea rows="10" cols="50" placeholder="Enter College Address here..." class="form-control" name="collegeadd" required></textarea></label><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="grade" required></label><br>
            <label>Aggregate Pointers:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="pointer" placeholder="Out of 10.0" required></label><br>
        </fieldset>
                <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="Submit" value="Submit" class="btn btn-success"></input>
            </div>
             </form>
        <script type="text/javascript">

        function calculateTotal1() {
    
        var totalAmt = document.addem.sscm.value;
        var total = document.addem.sscfmarks.value;
        if(totalAmt<total)
        {
        totalR = eval((totalAmt / total) * 100);
         }
        else
        {
            window.alert("Enter valid number");
        }
        document.getElementById('update').innerHTML = totalR;
    }

       function calculateTotal2() {
        
        var totalAmt = document.addem.hscm.value;
        var total = document.addem.hscfmarks.value;
         if(totalAmt<total)
         {
        totalR = eval((totalAmt / total) * 100);
        }
        else
        {
            window.alert("Enter valid number");
        }
        document.getElementById('update1').innerHTML = totalR;
       }

</script>
        </div>
    </body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       