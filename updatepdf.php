<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .ispace
{
margin-bottom: 20px;
border-radius: 4px;
}
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
    h1,h2{
            text-align: center;
            text-transform: uppercase;
            font-style: bold;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "sans-serif";
            border: 10px solid transparent;
            padding: 15px;
            border-image: url(border.png) 20% round;
        }
        #l{
                float: right;
            }
</style>
</head>
<?php
    if($conn = mysqli_connect('localhost', 'root', '', 'demo'))
{
   session_start(); 
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from student2 where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);

if(isset($_POST['Submit1']))
{
$targetfolder = "uploads/";
 $s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload1']['name']) ;
 $fileType=$_FILES['fileUpload1']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload1']['name']) ;
move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $targetfolder);


$sql2 = "DELETE from sscpdf where ID='{$s_id}'";
$resultr = mysqli_query($conn,$sql2) or trigger_error(mysqli_error($conn));
$sql1 = "INSERT into sscpdf(ID,filename,filetype) values ('{$s_id}','{$fileName}','{$targetfolder}') ";

$result1 = mysqli_query($conn,$sql1) or trigger_error(mysqli_error($conn));


}
if(isset($_POST['Submit2']))
{
    $targetfolder = "uploads/";
$s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload2']['name']) ;
 $fileType=$_FILES['fileUpload2']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload2']['name']) ;
move_uploaded_file($_FILES['fileUpload2']['tmp_name'], $targetfolder);

$sql2 = "UPDATE hscpdf SET filename='{$fileName}',filetype='{$targetfolder}' where ID='{$s_id}' ";

$result2 = mysqli_query($conn,$sql2) or trigger_error(mysqli_error($conn));

}
if(isset($_POST['Submit3']))
{
$targetfolder = "uploads/";
$s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload3']['name']) ;
 $fileType=$_FILES['fileUpload3']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload3']['name']) ;
move_uploaded_file($_FILES['fileUpload3']['tmp_name'], $targetfolder);



$sql2 = "DELETE from marksheetpdf where ID='{$s_id}'";
$resultr = mysqli_query($conn,$sql2) or trigger_error(mysqli_error($conn));
$sql1 = "INSERT into marksheetpdf (ID,filename,filetype) values ('{$s_id}','{$fileName}','{$targetfolder}') ";

$result3 = mysqli_query($conn,$sql1) or trigger_error(mysqli_error($conn));

}
if(isset($_POST['Submit4']))
{
$targetfolder = "uploads/";
$s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload']['name']) ;
 $fileType=$_FILES['fileUpload']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload']['name']) ;
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $targetfolder);

 

$sql2 = "DELETE from iduploadpdf where ID='{$s_id}'";
$resultr = mysqli_query($conn,$sql2) or trigger_error(mysqli_error($conn));
$sql1 = "INSERT into iduploadpdf (ID,filename,filetype) values ('{$s_id}','{$fileName}','{$targetfolder}') ";

$result4 = mysqli_query($conn,$sql1) or trigger_error(mysqli_error($conn));

if($result4)
{
    header('Location:updatepdf.php');
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
    <form action="updatepdf.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
<center><h1>Student Information Portal</h1></center>
        <div class="form-group">
    <label>College Student Id<font color="red"><sup>*</sup></font>:
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required id="txt_1" value="<?php echo $row['ID'] ?>" ></label><br><br>
            </div>
<div class="form-group">
    <fieldset>
        <legend>Documents Upload</legend>
            <label>HSC : <select name="SSC" class="form-control">
            <option value="Marksheet">Marksheet</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from sscpdf where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
             

     echo '<a href="'.$row['filetype'].'" target="_blank" class="w3-button w3-black ispace">View SSC Marksheet</a>';

        ?>
            <input type="file" name="fileUpload1" accept="application/pdf">
            <br><br>
        </fieldset>
        <input type="Submit" name="Submit1" value="Upload" class="btn btn-success">
        <?php
        if($result1)
        {
            echo "File Uploaded Successfully";
        }
        ?>
    </div>
    <div class="form-group">
    <fieldset>
        <legend>Documents Upload</legend>
            <label>HSC : <select name="HSC" class="form-control">
            <option value="Marksheet">Marksheet</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from hscpdf where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
             

     echo '<a href="'.$row['filetype'].'" target="_blank" class="w3-button w3-black ispace">View HSC Marksheet</a>';

        ?>
            <input type="file" name="fileUpload2" accept="application/pdf">
            <br><br>
        </fieldset>
        <input type="Submit" name="Submit2" value="Upload" class="btn btn-success">
        <?php
        if($result2)
        {
            echo "File Uploaded Successfully";
        }
        ?>
    </div>
        
        <div class="form-group">
        <fieldset>
        <legend>Documents Upload</legend>
        <label>Graduation(Latest Marksheet):
            <select name="Grad" class="form-control">
            <option value="First Semester">First Semester</option>
            <option value="Second Semester">Second Semester</option>
            <option value="Third Semester">Third Semester</option>
            <option value="Fourth Semester">Fourth Semester</option>
            <option value="Fifth Semester">Fifth Semester</option>
            <option value="Sixth Semester">Sixth Semester</option>
            <option value="Seventh Semester">Seventh Semester</option>
            <option value="Eighth Semester">Eighth Semester</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
             <?php
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username'  from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from marksheetpdf where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
         

     echo '<a href="'.$row['filetype'].'" target="_blank" class="w3-button w3-black ispace">View College Marksheet</a>';

        ?>
            <input type="file" name="fileUpload3" accept="application/pdf">
        </fieldset>
        <input type="submit" name="Submit3" value="Upload" class="btn btn-success">
        <?php
        if($result3)
        {
            echo "File Uploaded Successfully";
        }
        ?>
    </div>
<div class="form-group">
    <fieldset>
        <legend>Documents Upload</legend>
            <label> ID: <select name="ID" class="form-control">
            <option value="Driving License">Driving License</option>
            <option value="Aadhar Card">Aadhar Card</option>
            <option value="PAN Card">PAN Card</option>
            <option value="Election Card">Election Card</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
             <?php
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from iduploadpdf where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
         

     echo '<a href="'.$row['filetype'].'" target="_blank" class="w3-button w3-black ispace">View ID Upload</a>';

        ?>
            <input type="file" name="fileUpload" accept="application/pdf">
            <br><br>

        </fieldset>
        <input type="submit" name="Submit4" value="Submit" class="btn btn-success">
    </div>
        </form>
    </div>
    
</script>
</body>
</html>

 