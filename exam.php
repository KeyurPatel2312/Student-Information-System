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

input[type=text]{
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 15px;
  background-color: white;
  color: #3d3838;
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
 legend,label{
           
            color: black;
        }
        #l{
                float: right;
            }
        h1, h2{
            text-align: center;
            text-transform: uppercase;
            font-style: italic;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "Ewert";
        }
        legend{
            font-family: "Alfa Slab One";
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
 $exam=$_POST['exam'];
 $exams1=$_POST['exams1'];
 $exams2=$_POST['exams2'];
 $exams3=$_POST['exams3'];
 $exams4=$_POST['exams4'];
 $exams5=$_POST['exams5'];
 $sgate=$_POST['sgate'];
 $sgre=$_POST['sgre'];
 $sielts=$_POST['sielts'];
 $stoefl=$_POST['stoefl'];
 $scat=$_POST['scat'];

if($sgate =='')
{
    $sgate='NA';
}
if($sgre=='')
{
    $sgre='NA';
}
if($sielts=='')
{
    $sielts='NA';
}
if($stoefl=='')
{
    $stoefl='NA';
}
if($scat=='')
{
    $scat='NA';
}
if(isset($s_id) && isset($exam))
{
            $INSERT = "insert into student4  values ('{$s_id}','{$exam}','{$exams1}','{$exams2}','{$exams3}','{$exams4}','{$exams5}','{$sgate}','{$sgre}','{$sielts}','{$stoefl}','{$scat}')";
    $q1=$result = mysqli_query($conn,$INSERT) or trigger_error(mysqli_error($conn));
    if($q1)
    {
        header('Location:placement.php');
    }
    else
    {
        echo 'Error';
    }
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
    <form name="addem" class="form-horizontal" action="exam.php" method="post">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Other Curricular Information:</h2></center>
        <fieldset>
            <legend>Competitive Examination:</legend><br>
            <label>Any Exams given?<font color="red"><sup>*</sup></font></label><input type="radio" name="exam" value="Y" onclick="document.getElementById('custom').disabled = false; document.getElementById('charstype').disabled = true;">Yes<input type="radio" name="exam" value="N"  onclick="document.getElementById('custom').disabled = true; document.getElementById('charstype').disabled = false;" >No<br><br>
            <fieldset id="custom">
            <label>Please select from the following the examinations given:<font color="red"><sup>*</sup></font></label><br>
            <input type="hidden" id="testname1"  name="exams1" value="NA">
            <input type="checkbox"  id="custom" name="exams1" value="Gate">&nbsp;&nbsp;&nbsp;<label>Gate</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" id="custom" name="sgate"></label><br> 
            <input type="hidden" id="testname1"  name="exams2" value="NA">
            <input type="checkbox" name="exams2" id="custom" value="GRE">&nbsp;&nbsp;&nbsp;<label>GRE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" id="custom" name="sgre"></label><br>
            <input type="hidden" id="testname1"  name="exams3" value="NA">
            <input type="checkbox" name="exams3" id="custom" value="IELTS">&nbsp;&nbsp;&nbsp;<label>IELTS</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" id="custom" name="sielts"></label><br>
            <input type="hidden" id="testname1"  name="exams4" value="NA">
            <input type="checkbox" name="exams4" id="custom" value="TOEFL">&nbsp;&nbsp;&nbsp;<label>TOEFL</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" id="custom" name="stoefl"></label><br>
            <input type="hidden" id="testname1"  name="exams5" value="NA">
            <input type="checkbox" name="exams5" id="custom" value="CAT">&nbsp;&nbsp;&nbsp;
            <label>CAT</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" id="custom" name="scat"></label><br>
        </fieldset>
        </fieldset>
                <div class="col-sm-offset-2 col-sm-10">
            <input type="Submit" value="Submit" name="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        