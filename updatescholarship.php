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
  font-weight: bold;
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
        h1, h2{
            text-align: center;
            text-transform: uppercase;
            font-style: italic;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "Ewert";
            color: black;
        }
        .leg{
            font-family: "Alfa Slab One";
        }
        #field {
        margin-bottom:20px;
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
            .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
  $sql="SELECT * from scholarship where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
if($_POST['Submit'])
{
    $s_id = $_POST['s_id'];
$scholarship=$_POST['scholarship'];
$sname = $_POST['sname'];
$schdate = $_POST['schdate'];
$type=$_POST['type'];
$benefit=$_POST['benefit'];
$basedon=$_POST['basedon'];

$targetfolder="uploads/";
$fileName =  $_FILES['schletter']['name']; 
 $targetfolder = $targetfolder . basename( $_FILES['schletter']['name']);
move_uploaded_file($_FILES['schletter']['tmp_name'], $targetfolder);

   
    $update="UPDATE scholarship set scholarship='{$scholarship}', sname='{$sname}',schdate='{$schdate}', type='{$type}',benefit='{$benefit}',basedon='{$basedon}' WHERE ID='{$s_id}'";
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
    <form name="addem" class="form-horizontal" action="scholarship.php" method="post" enctype="multipart/form-data">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" value="<?php echo $row['ID'] ?>" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Other Personal Information:</h2></center>
        <div class="field_wrapper">
        <fieldset>
            <legend class="leg">Scholarship Details</legend><br>
            <label>Have any Scholarship?<font color="red"><sup>*</sup></font></label><input type="radio" name="scholarship" value="Y" <?php if($row['scholarship'] == "Y") {echo "checked";} ?> onclick="document.getElementById('on').disabled = false; document.getElementById('off').disabled = true;">Yes<input type="radio" name="scholarship" value="N" <?php if($row['scholarship'] == "N") {echo "checked";} ?> onclick="document.getElementById('on').disabled = true; document.getElementById('off').disabled = false;">No<br><br>
            <fieldset id="on">
                <label>Scholarship Name:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="sname"  value="<?php echo $row['sname'] ?>" required></label><br>
            <label>Date when scholarship got:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="date" class="form-control" id="on" name="schdate" value="<?php echo $row['schdate'] ?>" required></label><br>
                <label>Type of Scholarship:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;</label>
                <select name="type" class="form-control" style="width: 180px; font-weight: bold;">
                    <option value="">Select from following</option>
                <option  value="State Government" <?php if($row['type']=="State Government") echo 'selected="selected"'; ?>>State Government</option>
                <option value="National Government" <?php if($row['type']=="National Government") echo 'selected="selected"'; ?>>National Government</option>
                    <option value="Private Organization" <?php if($row['type']=="Private Organization") echo 'selected="selected"'; ?>>Private Organization</option>
                <option value="Institute Level" <?php if($row['type']=="Institute Level") echo 'selected="selected"'; ?>>Institute Level</option>    
                </select>
                <br>
                <label>Benefits got(in Rupees)<font color="red"><sup>*</sup></font>:</label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" value="<?php echo $row['benefit'] ?>" name="benefit" required><br>
                <label>Scholarship based on<font color="red"><sup>*</sup></font>:&nbsp;&nbsp;&nbsp;</label>
                <select name="basedon" class="form-control" style="width: 180px;font-weight: bold;">
                    <option value="">Select from following</option>
                <option value="Merit" <?php if($row['basedon']=="Merit") echo 'selected="selected"'; ?>>Merit</option>
                    <optgroup label="Category">
                    <option value="SEBC" <?php if($row['basedon']=="SEBC") echo 'selected="selected"'; ?>>SEBC</option>
                    <option value="SC" <?php if($row['type']=="SC") echo 'selected="selected"'; ?>>SC</option>
                    <option value="ST" <?php if($row['type']=="ST") echo 'selected="selected"'; ?>>ST</option>
                    <option value="OBC" <?php if($row['type']=="OBC") echo 'selected="selected"'; ?>>OBC</option>
                </optgroup>
                </select><br>
                    <label>Scholarship Letter(for proof):<font color="red"><sup>*</sup></font></label>&nbsp;&nbsp;&nbsp;<input type="file" name="schletter" value="<?php echo $row['filename'] ?>" accept="application/pdf">
        </fieldset>
        </fieldset>
        </div>
        <br><br>
        <div class="col-sm-offset-2 col-sm-10">
            <input type="Submit" name="Submit" value="Update" class="btn btn-success">
            </div>
</div>

            </div>
            </form>
        </div>
    </body>
</html>