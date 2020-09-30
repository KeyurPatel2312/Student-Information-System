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
if($conn = mysqli_connect('localhost', 'root', '', 'demo'))
{
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

$fileName = addslashes( $_FILES['image']['name']) ;

$fileData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

if(isset($s_id) && isset($first) && isset($middle) && isset($last) && isset($Pr) && isset($city) && isset($state) && isset($phone1) && isset($phone2) && isset($phone3) && isset($Place) && isset($gender) && isset($date) && isset($email) && isset($country))
{
  	if(isset($Tr))
  	{
  	$INSERT = "insert into student2   values ('{$s_id}', '{$first}', '{$middle}', '{$last}', '{$Pr}', '{$Tr}','{$city}', '{$state}', '{$phone1}', '{$phone2}', '{$phone3}', '{$Place}', '{$date}', '{$email}','{$gender}','{$country}','{$fileName}','{$fileData}')";
}
  	else
  	{
  		$INSERT = "INSERT Into student2  values ('{$s_id}', '{$first}', '{$middle}', '{$last}', '{$Pr}', '{$Tr}','{$city}', '{$state}', '{$phone1}', '{$phone2}', '{$phone3}', '{$Place}','{$date}',{$email}','{$gender}','{$country}','{$fileName}','{$fileData}')";
  	}
  	$q1=$result = mysqli_query($conn,$INSERT) or trigger_error(mysqli_error($conn));
  	if($q1)
  	{
   		header('Location:info.php');
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
        <form class="form-horizontal" action="form.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label>College Student Id<font color="red"><sup>*</sup></font>:
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required></label><br><br>
            </div>
        <div class="form-group">
    <fieldset><legend>Personal Information:</legend>
        <label> First Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" name="first" maxlength="20" required /></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label> Middle Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" name="middle" maxlength="20" required/></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <label> Last Name<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" name="last" maxlength="20" required/></label> <br/>
        <label>Gender</label><font color="red">*</font>:&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="M">Male <input type="radio" name="gender" value="F">Female<br>
        <label>Date Of Birth:<font color="red">*</font>
            <input type="date" name="date" required></label><br><br>
        <label> Permanent Address<font color="red"><sup>*</sup></font>: <textarea rols="40" class="form-control" cols="40" id="peradd" name="Pr" placeholder="Enter your permanent address..." required></textarea></label><br>
        <input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>              
		<label for = "same">If same temporary address select this box.</label><br> 
        <label> Temporary Address: <textarea rols="40" class="form-control" cols="40" id="tempadd" placeholder="Enter your temporary address..." name="Tr"></textarea></label><br><br>
	<script type= "text/javascript" src = "countries.js"></script>
        <label>Select Country<font color="red"><sup>*</sup></font>:</label>   <select id="country" class="form-control" name ="country" required></select> <br><br>
        <label>Select State<font color="red"><sup>*</sup></font>:</label> <select class="form-control" name ="state" id ="state"></select>  <br> <br>
            </fieldset>
            </div>

<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
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
		<label>City<font color="red"><sup>*</sup></font>: <input type="text" class="form-control" required name="city" size=20></label><br>
            <div class="form-group">
	    <fieldset><legend>Contact Number: </legend>
            <label>Student<font color="red">*</font>:<input type="text" class="form-control" name="phone1" pattern="[0-9]{10}" required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Father<font color="red">*</font>:<input class="form-control" type="text" name="phone2" pattern="[0-9]{10}" required/></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Mother<font color="red">*</font>:<input type="text" class="form-control" name="phone3" pattern="[0-9]{10}" required/></label><br>
        </fieldset>
            </div>
            <div class="form-group">
                <label>Are you Localite?</label><font color="red">*</font>&nbsp;&nbsp;&nbsp;<input type="radio"  name="Place" value="Y">Yes <input type="radio" name="Place" value="N">No<br>  
                <label>Email Address:<span class="glyphicon glyphicon-envelope"></span></label>
			<input type="email" class="form-control" name="email"><br><br>
			<label>Photograph : (Upto 1 MB) </label>
				&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="file" name="image">
            </div>
            <div class="col-sm-offset-2 col-sm-10">
            <input type="Submit" name="Submit" value="Submit" class="btn btn-success"></input>
            </div>
    </form>
    </div>
</body>
</html>
