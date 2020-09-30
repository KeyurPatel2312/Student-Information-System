<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
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
        #l{
                float: right;
            }
            .black{
                background-color: black;
                border-color: black;
            }
            .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
session_start();
$username = $_SESSION['username'];

  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from student5 where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);

  if($_POST['Submit'])
{
    $s_id = $_POST['s_id'];
$placement=$_POST['placement'];
$cname=$_POST['cname'];
$ctc=$_POST['ctc'];
$sem=$_POST['sem'];
$campus=$_POST['campus'];
$icname=$_POST['icname'];
$stipend=$_POST['stipend'];

 

  $INSERT = "UPDATE student5(ID,placement,cname,ctc,sem,campus,icname,stipend) values ('{$s_id}','{$placement}','{$cname}','{$ctc}','{$sem}','{$campus}','{$icname}','{$stipend}') WHERE ID='{$s_id}'";
    $q1=$result = mysqli_query($conn,$INSERT) or trigger_error(mysqli_error($conn));

   $icname1 = $_POST['icname1'];
    $stipend1 = $_POST['stipend1'];
    $mentor = $_POST['mentor'];
    $sem1 = $_POST['sem1'];
    $des = $_POST['des'];
    if(!empty($icname1)){
        for($i = 0; $i < count($icname1); $i++){
            if(!empty($icname1[$i])){
               $icnames=$icname1[$i]; 
               $stipends=$stipend1[$i];
               $mentors=$mentor[$i]; 
               $sems=$sem1[$i];
               $dess=$des[$i];  
        $insertCourse = "UPDATE student5(ID,icname1,stipend1,mentor,sem1,des) 
        VALUES ('{$s_id}','{$icnames}','{$stipends}','{$mentors}','{$sems}','{$dess}') WHERE ID='{$s_id}'";
        $q2=$result = mysqli_query($conn,$insertCourse) or trigger_error(mysqli_error($conn));
        }
    }
      
    if($q2)
    {
        header('Location:studentsearch.php');
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
    <form name="addem" class="form-horizontal" action="updateplacement.php" method="post">
        <label>College Student Id:<font color="red"><sup>*</sup></font>
        <input type="text" class="form-control" name="s_id" placeholder="Enter Your Id" value="<?php echo $row['ID'] ?>" size="35" pattern="[0-9]{2}[A-Z]{3}[0-9]{3}" required><br><br></label>
        <center><h2>Other Curricular Information:</h2></center>
        <fieldset>
            <legend class="leg">Placement and Internship Details</legend><br>
            <label>Placements Done?<font color="red"><sup>*</sup></font></label><input type="radio" <?php if($row['placement'] == "Y"){ echo "checked";}?> name="placement" value="Y" onclick="document.getElementById('on').disabled = false; document.getElementById('off').disabled = true;">Yes<input type="radio" name="placement" value="N" <?php if($row['placement'] == "N"){ echo "checked";} ?>  onclick="document.getElementById('on').disabled = true; document.getElementById('off').disabled = false;">No<br><br>
            <fieldset id="on">
            <label>Company Name:<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['cname'] ?>" class="form-control" id="on" name="cname" required></label><br>
            <label>Cost to Company (CTC):<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['ctc'] ?>" id="on" name="ctc" required></label><br>
            <label>Semester in which placement is done:<font color="red"><sup>*</sup></font><input value="<?php echo $row['sem'] ?>" type="number" class="form-control" min="7" max="8" step="1" name="sem" required></label><br>
                <label>Mode of Placement:<font color="red"><sup>*</sup></font></label>&nbsp;&nbsp;&nbsp;<input type="radio" id="custom" name="campus" value="oncampus" <?php if($row['campus'] == "oncampus"){ echo "checked";}?> onclick="document.getElementById('custom2').disabled = true; document.getElementById('charstype2').disabled = false;"><label>On-Campus</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="custom" name="campus" value="offcampus" <?php if($row['campus'] == "offcampus"){ echo "checked";}?> onclick="document.getElementById('custom2').disabled = false; document.getElementById('charstype2').disabled = true;"><label>Off-Campus</label>
                <br><br>
                <fieldset>
                <legend>6M Internship(8th Sem):</legend>
                    <label>Company Name:<font color="red"><sup>*</sup></font><input type="text" class="form-control" value="<?php echo $row['icname'] ?>" id="custom2" name="icname"></label><br>
                    <label>Stipend(per month):<font color="red"><sup>*</sup></font><input type="text" value="<?php echo $row['stipend'] ?>" class="form-control" name="stipend"></label><br>
                </fieldset>
            </fieldset>
        </fieldset>
                <br>
        <div class="field_wrapper">
            <div>
        <fieldset>
                <legend>Other Internships and Projects:</legend>
                    <label><font color="red">
                        For Intership, write Company's or Institute's Name;</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="add_button" title="Add field"><button type="button" class="btn">+</button></a>&nbsp;&nbsp;&nbsp;<label>Add Internship/Project</label><br><font color="red">
                        For Project,write title of the project.</font><br></label>
                        <?php 
                        if($conn = mysqli_connect('localhost', 'root','','demo'))
{


  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from student5 where ID='$IDcheck' AND placement IS NULL";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
                      $icname1=$row['icname1'];
                    for($i = 0; $i < mysqli_num_rows($result); $i++)
                    {
                        echo 
                        '                        <label>Company or Institute Name/Project Name:<font color=red><sup>*</sup></font><input type=text style="width: 200px;" value="'.$row['icname1'].'" class=form-control name=icname1[]></label><br>
                    <label>Stipend(per month):<font color=red><sup>*</sup></font><input type=text value="'.$row['stipend1'].'" class=form-control name=stipend1[]></label><br>
                    <label>Guide or Mentor Name:<input type=text class=form-control value="'.$row['mentor'].'" name=mentor[] ></label><br>
                    <label>Duration(in months):<font color=red><sup>*</sup></font><input type=number value="'.$row['sem1'].'" class=form-control min=1 max=6 step=1 name=sem1[] ></label><br>
                    <label>Description:</label><font color=red><sup>*</sup></font><textarea cols=5 rows=3 class=form-control name=des[] placeholder=Write description here...> '.$row['des'].'</textarea>';
                    }
                }
                    ?>
                    </fieldset>
                     </div>
                     </div>
                     <br>
                    <br>
                <div class="col-sm-offset-2 col-sm-10">
            <input type="Submit" name="Submit" value="Update" class="btn btn-success">
            </div>
    </form>
        </div>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><hr><label>Company or Institute Name/Project Name:<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="icname1[]" required ></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="remove_button"><button type="button" class="btn">-</button></a>&nbsp;&nbsp;&nbsp;<label>Remove this Internship/Project</label><br><label>Stipend(per month):<font color="red"><sup>*</sup></font><input type="text" class="form-control" name="stipend1[]" required></label><br><label>Guide or Mentor Name:<input type="text" class="form-control" name="mentor[]" required></label><br><label>Duration(in months):<font color="red"><sup>*</sup></font><input type="number" class="form-control" min="1" max="6" step="1" name="sem1[]" required></label><br><label>Description:</label><font color="red"><sup>*</sup></font><textarea cols="5" rows="3" class="form-control" name="des[]" placeholder="Write description"></textarea></div>';  
    var x = 1; 
    $(addButton).click(function(){
        if(x < maxField){ 
            x++; 
            $(wrapper).append(fieldHTML); 
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); 
        x--; 
    });
});
</script>
    </body>
</html>
        


        