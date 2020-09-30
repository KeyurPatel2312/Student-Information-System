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
 legend,label{
           
            color: black;
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
  $sql="SELECT * from student4 where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);

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
          $update="UPDATE student4 set exam='{$exam}', exams1='{$exams1}',exams2='{$exams2}', exams3='{$exams3}',exams4='{$exams4}',exams5='{$exams5}',sgate='{$sgate}' ,sgre='{$sgre}',sielts='{$sielts}',stoefl='{$stoefl}',scat='{$scat}' WHERE ID='{$s_id}'";
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
    <form name="addem" class="form-horizontal" action="updateexam.php" method="post">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id"  placeholder="Enter Your Id"  value="<?php echo $row['ID'] ?>" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Other Curricular Information:</h2></center>
        <fieldset>
            <legend>Competitive Examination:</legend><br>
            <label>Any Exams given?<font color="red"><sup>*</sup></font></label><input type="radio" name="exam" value="Y" <?php if($row['exam'] == "Y"){ echo "checked";} ?> onclick="document.getElementById('custom').disabled = false; document.getElementById('charstype').disabled = true;">Yes<input type="radio" name="exam" value="N" <?php if($row['exam'] == "N"){ echo "checked";} ?> onclick="document.getElementById('custom').disabled = true; document.getElementById('charstype').disabled = false;" >No<br><br>
            <fieldset id="custom">
            <label>Please select from the following the examinations given:<font color="red"><sup>*</sup></font></label><br>
            <input type="hidden" id="testname1"  name="exams1" value="NA">
            <input type="checkbox" id="custom"  name="exams1" <?php if($row['exams1'] == "Gate"){ echo "checked";} ?> value="Gate">&nbsp;&nbsp;&nbsp;<label>Gate</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <input type="hidden" id="testname6"  name="sgate" value="NA">
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['sgate'] ?>" onsubmit="if(this == ''){$this.val('empty');}" class="form-control" id="custom" name="sgate"></label><br> 
            <input type="hidden" id="testname2"  name="exams2" value="NA">
            <input type="checkbox" name="exams2" id="custom" value="GRE" <?php if($row['exams2'] == "GRE"){ echo "checked";} ?>>&nbsp;&nbsp;&nbsp;<label>GRE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" id="testname7"  name="sgre" value="NA">
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['sgre'] ?>" id="custom" name="sgre"></label><br>
            <input type="hidden" id="testname3"  name="exams3" value="NA">
            <input type="checkbox" name="exams3" id="custom" <?php if($row['exams3'] == "IELTS"){ echo "checked";} ?> value="IELTS">&nbsp;&nbsp;&nbsp;<label>IELTS</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" id="testname8"  name="sielts" value="NA">
            <label>Score:<font color="red"><sup>*</sup></font><input type="text"  value="<?php echo $row['sielts'] ?>"class="form-control" id="custom" name="sielts"></label><br>
            <input type="hidden" id="testname4"  name="exams4" value="NA">
            <input type="checkbox" name="exams4" id="custom" <?php if($row['exams4'] == "TOEFL"){ echo "checked";} ?> value="TOEFL">&nbsp;&nbsp;&nbsp;<label>TOEFL</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" id="testname9"  name="stoefl" value="NA">
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['stoefl'] ?>" id="custom" name="stoefl"></label><br>
            <input type="hidden" id="testname5"  name="exams5" value="NA">
            <input type="hidden" id="testname10"  name="scat" value="NA">
            <input type="checkbox" name="exams5" id="custom" <?php if($row['exams5'] == "CAT"){ echo "checked";} ?>  value="CAT">&nbsp;&nbsp;&nbsp;
            
            <label>CAT</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Score:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['scat'] ?>" onsubmit="if(this.length == 0){$this.val('empty');}" class="form-control" id="custom" name="scat"></label><br>
            <script type="text/javascript">
                var sgate=document.getElementById("").value;
                if(sgate.value.length==0)
                {
                    
                 sgate.value="NA";   
                }
                if(document.getElementsByName(sgre).value.length==0)
                {
                 document.getElementsByName(sgre).value="NA";   
                }
                if(document.getElementsByName(sielts).value.length==0)
                {
                 document.getElementsByName(sielts).value="NA";   
                }
                if(document.getElementsByName(stoefl).value.length==0)
                {
                 document.getElementsByName(stoefl).value="NA";   
                }
                if(document.getElementsByName(scat).value.length==0)
                {
                 document.getElementsByName(scat).value="NA";   
                }
            </script>
        </fieldset>
        </fieldset>
                <div class="col-sm-offset-2 col-sm-10">
            <input type="Submit" value="Update" name="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        