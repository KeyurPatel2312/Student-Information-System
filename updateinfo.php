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
            .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
input[type=text]{
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 15px;
  background-color: white;
  color: #3d3838;
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
        legend,label{
           
            color: black;
        }
        #l{
                float: right;
            }
    </style>
</head>
<?php
session_start();
$username = $_SESSION['username'];
if($conn = mysqli_connect('localhost', 'root', '', 'demo'))
{
  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from student3 where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);

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
 $sscp=($sscm/$sscfmarks)*100;
    $hscp=($hscm/$hscfmarks)*100;
          $update="UPDATE student3  SET ID='{$s_id}', sscpy='{$sscpy}',sscboard='{$sscboard}',sscschool='{$sscschool}', sscschooladd='{$sscschooladd}', sscfmarks='{$sscfmarks}',sscm='{$sscm}',sscp='{$sscp}',sscg='{$sscg}', hscpy='{$hscpy}', hscboard='{$hscboard}', hscschool='{$hscschool}', hscschooladd='{$hscschooladd}', hscfmarks='{$hscfmarks}', hscm='{$hscm}',hscp='{$hscp}',hscg='{$hscg}',gsy='{$gsy}',gey='{$gey}',field='{$field}',branch='{$Department}',cursem='{$cursem}',college='{$college}',collegeadd='{$collegeadd}',grade='{$grade}',pointer='{$pointer}' WHERE ID='{$s_id}' ";
         $result = mysqli_query($conn,$update) or trigger_error(mysqli_error($conn));
         if($result)
         {
          echo "Updated Successfully";
         }
         else
         {
          echo "Error in Updating";
         }
        }

}
?>

<body>
        <ul class="upper">
                <li><a class="hov" href="student.html">SIS</a></li>
                <li><a class="hov" href="studentsearch.php">Students</a></li>
                <li><a class="hov" href="update.php">Update Your Information</a></li>
                <li id="l"><a class="hov1" href="logouts.php"><button class="black" type="Submit" name="logout" value="LogOut">Logout</button></a></li>
                <li id="l"><a class="hov" href="studentsearch.php"><span class="glyphicon glyphicon-user"></span>
                <?php
                  session_start();
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        echo "$username";
                        }
                    else{
                          echo "<li id=l><a href='login.php'>Login</a></li>";        
                        }

                        ?>
</a></li></ul>
<div class="container">
    <form name="addem" class="form-horizontal" action="updateinfo.php" method="post">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id"value="<?php echo $row['ID'] ?>" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Academic Information:</h2></center>
        <fieldset>
            <legend>SSC:</legend><br>
            <label>Passing Year:<font color="red"><sup>*</sup></font><input type="text" name="sscpy" value="<?php echo $row['sscpy'] ?>" class="form-control" required></label><br>
            <label>Board:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['sscboard'] ?>" class="form-control" name="sscboard" required></label><br>
            <label>School:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['sscschool'] ?>" name="sscschool" required></label><br>
            <label>School Address:<font color="red"><sup>*</sup></font><textarea style="color: #3d3838; " rows="10" cols="50" placeholder="Enter school Address here..." class="form-control" name="sscschooladd" required><?php echo $row['sscschooladd'] ?></textarea></label><br>
            <label>Full Marks:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['sscfmarks'] ?>" name="sscfmarks" class="form-control" required></label><br>
            <label>Marks Obtained:<font color="red"><sup>*</sup></font><input type="text" name="sscm" value="<?php echo $row['sscm'] ?>" class="form-control" onkeyup="calculateTotal1()" required></label><br>
            <label>Percentage:<span name="sscp" id="update"><?php echo $row['sscp'] ?></span><font color="red"><sup>*</sup></font></label><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['sscg'] ?>" name="sscg" required></label><br><br>
        </fieldset>
        <fieldset>
            <legend>HSC:</legend><br>
            <label>Passing Year:<font color="red"><sup>*</sup></font><input type="text" name="hscpy" value="<?php echo $row['hscpy'] ?>" class="form-control" required></label><br>
            <label>Board:<font color="red"><sup>*</sup></font><input type="text" name="hscboard" value="<?php echo $row['hscboard'] ?>" class="form-control" required></label><br>
            <label>School:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['hscschool'] ?>" name="hscschool" class="form-control" required></label><br>
            <label>School Address:<font color="red"><sup>*</sup></font><textarea rows="10" cols="50"  placeholder="Enter school Address here..." class="form-control" style="color: #3d3838; " name="hscschooladd" required><?php echo $row['hscschooladd'] ?></textarea></label><br>
            <label>Full Marks:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['hscfmarks'] ?>" name="hscfmarks" required></label><br>
            <label>Marks Obtained:<font color="red"><sup>*</sup></font><input type="text" name="hscm" value="<?php echo $row['hscm'] ?>" class="form-control" onkeyup="calculateTotal2()"  required></label><br>
            <label>Percentage</label>:<span name="hscp" id="update1"><?php echo $row['hscp'] ?></span><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="hscg" value="<?php echo $row['hscg'] ?>" required></label><br><br>
        </fieldset>
        <fieldset>
            <legend>Graduation:</legend>
            <label>Starting Year:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['gsy'] ?>" name="gsy" required></label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Ending Year:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['gey'] ?>" name="gey" required></label><br>
            <label>Field:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['field'] ?>" class="form-control" name="field" required></label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Department : <select name="Department" style="color: #3d3838; " class="form-control">
            <option value="CH" <?php if($row['branch']=="CH") echo 'selected="selected"'; ?>>Chemical Engineering</option>
            <option value="CL" <?php if($row['branch']=="CL") echo 'selected="selected"'; ?>>Civil Engineering</option>
            <option value="CSE" <?php if($row['branch']=="CSE") echo 'selected="selected"'; ?>>Computer Science and Engineering</option>
            <option value="EC" <?php if($row['branch']=="EC") echo 'selected="selected"'; ?>>Electronics and Communication Engineering</option>
            <option value="EE" <?php if($row['branch']=="EE") echo 'selected="selected"'; ?>>Electrical Engineering</option>           
            <option value="IC" <?php if($row['branch']=="IC") echo 'selected="selected"'; ?>>Instrumentation and Control</option>
            <option value="IT" <?php if($row['branch']=="IT") echo 'selected="selected"'; ?>>Information Technology</option>
            <option value="ME" <?php if($row['branch']=="ME") echo 'selected="selected"'; ?>>Mechanical Engineering</option>
            </select>
            </label>
            <br><br>
            <label>Current Semester:<font color="red"><sup>*</sup></font><input type="number" value="<?php echo $row['cursem'] ?>" class="form-control" min="1" max="8" step="1" name="cursem" required></label><br>
            <label>College/University:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['college'] ?>" class="form-control" name="college" style="width: 180px" required></label><br>
            <label>College/University Address:<font color="red"><sup>*</sup></font><textarea style="color: #3d3838; " rows="10" cols="50" placeholder="Enter school Address here..." class="form-control" name="collegeadd" required><?php echo $row['collegeadd'] ?></textarea></label><br>
            <label>Grade:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['grade'] ?>" name="grade" required></label><br>
            <label>Aggregate Pointers:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['pointer'] ?>" class="form-control" name="pointer" placeholder="Out of 10.0" required></label><br>
        </fieldset>
                <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="Submit" value="Update" class="btn btn-success"></input>
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
            window.alert("Enter Valid number");
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
            window.alert("Enter Valid number");
        }
        document.getElementById('update1').innerHTML = totalR;
       }

</script>
        </div>
    </body>
</html>
        