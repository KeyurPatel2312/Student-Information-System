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
#l{
                float: right;
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
        h1, h2{
            text-align: center;
            text-transform: uppercase;
            font-style: italic;
            font-size: 2.5em;  /* 40px/16=2.5em */
            font-family: "Ewert";
        }
        .leg{
            font-family: "Alfa Slab One";
        }
        #field {
        margin-bottom:20px;
        }
    </style>
</head>
<?php
if($conn = mysqli_connect('localhost', 'root', '', 'demo'))
{
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

   
    $INSERT = "insert into scholarship   values ('{$s_id}', '{$scholarship}', '{$sname}', '{$schdate}', '{$type}', '{$benefit}','{$basedon}', '{$fileName}', '{$targetfolder}')";

   
    $q1=$result = mysqli_query($conn,$INSERT) or trigger_error(mysqli_error($conn));
   if($q1)
   {
     header('Location:studentsearch.php');
   }
   else
   {
    echo "Error";
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
    <form name="addem" class="form-horizontal" action="scholarship.php" method="post" enctype="multipart/form-data">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Other Personal Information:</h2></center>
        <div class="field_wrapper">
        <fieldset>
            <legend class="leg">Scholarship Details</legend><br>
            <label>Have any Scholarship?<font color="red"><sup>*</sup></font></label><input type="radio" name="scholarship" value="Y" onclick="document.getElementById('on').disabled = false; document.getElementById('off').disabled = true;">Yes<input type="radio" name="scholarship" value="N"  onclick="document.getElementById('on').disabled = true; document.getElementById('off').disabled = false;">No<br><br>
            <fieldset id="on">
                <label>Scholarship Name:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="sname" required></label><br>
            <label>Date when scholarship got:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="date" class="form-control" id="on" name="schdate" required></label><br>
                <label>Type of Scholarship:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;</label>
                <select name="type">
                    <option value="">Select from following</option>
                <option  value="State Government">State Government</option>
                <option value="National Government">National Government</option>
                    <option value="Private Organization">Private Organization</option>
                <option value="Institute Level">Institute Level</option>    
                </select>
                <br>
                <label>Benefits got(in Rupees)<font color="red"><sup>*</sup></font>:</label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="benefit" required><br>
                <label>Scholarship based on<font color="red"><sup>*</sup></font>:&nbsp;&nbsp;&nbsp;</label>
                <select name="basedon">
                    <option value="">Select from following</option>
                <option value="Merit">Merit</option>
                    <optgroup label="Category">
                    <option value="SEBC">SEBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="OBC">OBC</option>
                </optgroup>
                </select><br>
                    <label>Scholarship Letter(for proof):<font color="red"><sup>*</sup></font></label>&nbsp;&nbsp;&nbsp;<input type="file" name="schletter" accept="application/pdf">
        </fieldset>
        </fieldset>
        </div>
        <br><br>
        <div class="col-sm-offset-2 col-sm-10">
            
            <input type="Submit" name="Submit" value="Submit" class="btn btn-success">
            </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Your Data has been successfully added.</p>
            </div>

        
        </div>
        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
            </div>
            </form>
        </div>
    </body>
</html>