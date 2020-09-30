<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
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
if(isset($_POST['Submit1']))
{
$targetfolder = "uploads/";
 $s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload1']['name']) ;
 $fileType=$_FILES['fileUpload1']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload1']['name']) ;
move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $targetfolder);



$sql1 = "INSERT INTO sscpdf (ID,filename, filetype) VALUES( '{$s_id}','{$fileName}', '{$targetfolder}' )";

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

 

$sql2 = "INSERT INTO hscpdf (ID,filename, filetype) VALUES( '{$s_id}','{$fileName}', '{$targetfolder}' )";

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



$sql3 = "INSERT INTO marksheetpdf (ID,filename, filetype) VALUES( '{$s_id}','{$fileName}', '{$targetfolder}')";

$result3 = mysqli_query($conn,$sql3) or trigger_error(mysqli_error($conn));


}
if(isset($_POST['Submit4']))
{
$targetfolder = "uploads/";
$s_id=$_POST['s_id'];
 $fileName = addslashes( $_FILES['fileUpload']['name']) ;
 $fileType=$_FILES['fileUpload']['type'];
 $targetfolder = $targetfolder . basename( $_FILES['fileUpload']['name']) ;
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $targetfolder);

 

$sql4 = "INSERT INTO iduploadpdf (ID,filename, filetype) VALUES( '{$s_id}','{$fileName}', '{$targetfolder}' )";

$result4 = mysqli_query($conn,$sql4) or trigger_error(mysqli_error($conn));

if($result4)
{
    header('Location:publication.php');
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
    <form action="pdfupload.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
<center><h1>Student Information Portal</h1></center>
        <div class="form-group">
    <label>College Student Id<font color="red"><sup>*</sup></font>:
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required id="txt_1" onkeyup='saveValue(this);'></label><br><br>
            </div>
            <div class="form-group">
    <fieldset>
        <legend>Documents Upload</legend>
            <label>SSC : <select name="SSC" class="form-control">
            <option value="Marksheet">Marksheet</option>
            <option value="Leaving Certificate">Leaving Certificate</option>
            <option value="Bonafide Certificate">Bonafide Certificate</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
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

        <div class="container">

    <fieldset>
        <legend>Documents Upload</legend>
            <label>HSC : <select name="HSC" class="form-control">
            <option value="Marksheet">Marksheet</option>
            <option value="Leaving Certificate">Leaving Certificate</option>
            <option value="Bonafide Certificate">Bonafide Certificate</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="file" name="fileUpload2" accept="application/pdf">
            <br><br>
        </fieldset>
        <input class="btn btn-success" type="Submit" name="Submit2" value="Upload">
        <?php
        if($result2)
        {
            echo "File Uploaded Successfully";
        }
        ?>
    </div>
        <div class="container">
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
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="fileUpload3" accept="application/pdf">
        </fieldset>
        <input type="submit" name="Submit3" value="Upload" class="btn btn-success">
        <?php
        if($result3)
        {
            echo "File Uploaded Successfully";
        }
        ?>
    </div>
<div class="container">
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
            <input type="file" name="fileUpload" accept="application/pdf">
            <br><br>
             <label>Your uploaded Document no:<input type="text" class="form-control" name="IDnumber"/><font color="red">*</font><br></label>
        </fieldset>
        <input type="submit" name="Submit4" value="Submit" class="btn btn-success">
    </div>
        </form>
    </div>
    <script type="text/javascript">
        document.getElementById("txt_1").value = getSavedValue("txt_1");      
        
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>
</body>
</html>

 