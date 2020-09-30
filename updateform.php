<html>
<head>
    <title>Student Information System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  font-size: 16px;
  background-color: white;
  color: #3d3838;
}
    h1{
            text-align: center;
            text-transform: uppercase;
            font-style: bold;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "sans-serif";
            border: 10px solid transparent;
            padding: 15px;
            border-image: url(border.png) 20% round;
        }

        legend,label
        {
          color: black;
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
        /*#p1{
        	font-size: 
        }*/
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
session_start();
$username = $_SESSION['username'];
if($conn = mysqli_connect('localhost', 'root','', 'demo'))
{
  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from student2 where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);

        if($_POST['Submit'])
        {
          $s_id = $_POST['s_id'];
$first = $_POST['first'];
$middle = $_POST['middle'];
$last = $_POST['last'];
$Pr = $_POST['Pr'];
$Tr = $_POST['Tr'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$phone3 = $_POST['phone3'];
$Place = $_POST['Place'];
$gender=$_POST['gender'];
$date = $_POST['date'];
$email = $_POST['email'];
$country=$_POST['country'];

$fileName = addslashes($_FILES['image']['name']);
if((file_get_contents($_FILES['image']['tmp_name'])) !== false)
{
           $fileData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
   
     $update="UPDATE student2 set FirstName='{$first}', MiddleName='{$middle}',LastName='{$last}', PermanentAddress='{$Pr}',TemporaryAddress='{$Tr}',country='{$country}',City='{$city}' ,State='{$state}',PhoneS='{$phone1}',PhoneF='{$phone2}',PhoneM='{$phone3}',DateOfBirth='{$date}',Gender='{$gender}',Email='{$email}',Localite='{$Place}',filenam='{$fileName}',data='{$fileData}' WHERE ID='{$s_id}'";
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
      
   else
   {
    $update="UPDATE student2 set FirstName='{$first}', MiddleName='{$middle}',LastName='{$last}', PermanentAddress='{$Pr}',TemporaryAddress='{$Tr}',country='{$country}',City='{$city}' ,State='{$state}',PhoneS='{$phone1}',PhoneF='{$phone2}',PhoneM='{$phone3}',DateOfBirth='{$date}',Gender='{$gender}',Email='{$email}',Localite='{$Place}'
      WHERE ID='{$s_id}'";
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
        <center><h1>Student Information Portal</h1></center>
        <form class="form-horizontal" action="updateform.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label>College Student Id<font color="red"><sup>*</sup></font>:
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" value="<?php echo $row['ID'] ?>" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required></label><br><br>
            </div>
        <div class="form-group">
    <fieldset><legend style="color: black;">Personal Information:</legend>
        <label> First Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" name="first" maxlength="20" value="<?php echo $row['FirstName'] ?>" required /></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label> Middle Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" value="<?php echo $row['MiddleName'] ?>"name="middle" maxlength="20" required/></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <label> Last Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" name="last"value="<?php echo $row['LastName'] ?>" maxlength="20" required/></label> <br/>
        <label>Gender</label><font color="red">*</font>:&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="M" <?php if($row['Gender'] == "M"){ echo "checked";} ?>>Male<input type="radio" name="gender" value="F" <?php if($row['Gender'] == "F") {echo "checked";} ?>>Female<br>
        <label>Date Of Birth:<font color="red">*</font>
            <input type="date" name="date" value="<?php echo $row['DateOfBirth'] ?>" required></label><br><br>
        <label> Permanent Address<font color="red"><sup>*</sup></font>: <textarea rols="40" class="form-control" style="color: #3d3838;" cols="40" id="peradd" name="Pr" placeholder="Enter your permanent address..." required> <?php echo $row['PermanentAddress'] ?></textarea></label><br>
        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
		<label for = "same">If same temporary address select this box.</label><br> 
        <label> Temporary Address: <textarea rols="40" class="form-control" cols="40" id="tempadd" style="color: #3d3838;" placeholder="Enter your temporary address..." name="Tr"><?php echo $row['TemporaryAddress'] ?></textarea></label><br><br>
     
        <label>City<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" required value="<?php echo $row['City'] ?>"name="city" size=20></label><br>
     
        <label>Country<font color="red"><sup>*</sup></font>:</label><input type="text" id="country" style="width: 185px; font-weight: bold;" class="form-control" name ="country" value="<?php echo $row['country'] ?>"></select> <br><br>
        <label>State<font color="red"><sup>*</sup></font>:</label> <input type="text" id="state" style="width: 185px; font-weight: bold;" class="form-control" name ="state" value="<?php echo $row['State'] ?>"></select>  <br> <br>
            </fieldset>
            </div>
<script language="javascript">

   // first parameter is id of country drop-down and second parameter is id of state drop-down
	function addressFunction() 
	{ 
  		if (document.getElementById('same').checked) 
  		{ 
    		document.getElementById('tempadd').value=document. 
             	getElementById('peradd').value; 
 
  		}	 
      
  		else
  		{ 
    		document.getElementById('tempadd').value=""; 
    		document.getElementById('peradd').value=""; 
  		} 
	} 
</script>
            <div class="form-group">
	    <fieldset><legend>Contact Number: </legend>
            <label>Student<font color="red">*</font>:<input type="text" class="form-control" value="<?php echo $row['PhoneS'] ?>"name="phone1" pattern="[0-9]{10}" required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Father<font color="red">*</font>:<input class="form-control" type="text" name="phone2" value="<?php echo $row['PhoneF'] ?>"pattern="[0-9]{10}" required/></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Mother<font color="red">*</font>:<input type="text" class="form-control" value="<?php echo $row['PhoneM'] ?>" name="phone3" pattern="[0-9]{10}" required/></label><br>
        </fieldset>
            </div>
            <div class="form-group">
                <label>Are you Localite?</label><font color="red">*</font>&nbsp;&nbsp;&nbsp;<input type="radio" value="Y" <?php if($row['Localite'] == "Y") {echo "checked";} ?> name="Place">Yes <input type="radio" name="Place" value="N" <?php if($row['Localite'] == "N") {echo "checked";} ?>>No<br>  
                <label>Email Address:<span class="glyphicon glyphicon-envelope"></span></label>
			<input type="email" value="<?php echo $row['Email'] ?>"class="form-control" name="email"><br><br>
			<label>Photograph : (Upto 1 MB) </label>
				&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo '<div top=400px left=1000px>
                 <ul>
                 <li><img src="data:image;base64,'.base64_encode($row['data']).'" width=150px height=150px align=right/></li>
                 <ul>
                 </div><br><br><br><br><br>';
                 ?>
            <input type="file" name="image">
            </div>
            <div class="col-sm-offset-2 col-sm-10">
            <input style="float: left;" type="Submit" name="Submit" value="Update" class="btn btn-success"></input>
            </div>
    </form>
    </div>
</body>
</html>
