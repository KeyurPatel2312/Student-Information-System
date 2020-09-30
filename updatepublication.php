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
        .upper{
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
                height: 50px;
                background-color: black;
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
    </style>
</head>
<?php
if($conn = mysqli_connect('localhost', 'root','','demo'))
{
 if($_POST['Submit'])
{
    
    $s_id = $_POST['s_id'];
 $publication=$_POST['publication'];

 if($publication == "Y")
 {
   $pname = $_POST['pname'];
    $pdate = $_POST['pdate'];
    $jname = $_POST['jname'];
    $tname = $_POST['tname'];
    $mname = $_POST['mname'];
    $gname = $_POST['gname'];
    $plength = $_POST['plength'];
    $iisn = $_POST['iisn'];

    if(!empty($pname))
    {
        for($i = 0; $i < count($pname); $i++)
        {
            if(!empty($pname[$i]))
            {
               $pnames=$pname[$i]; 
               $pdates=$pdate[$i];
               $jnames=$jname[$i]; 
               $tnames=$tname[$i];
               $mnames=$mname[$i];
               $gnames=$gname[$i];
               $plengths=$plength[$i]; 
               $iisns=$iisn[$i];
               $targetfolder="uploads/";
              $fileName =  $_FILES['ppdf']['name'][$i];
              $targetfolder = $targetfolder . basename( $_FILES['ppdf']['name'][$i]);
       
             $update="UPDATE publication set publication='{$publication}',pnames='{$pnames}',pdates='{$pdates}',jnames='{$jnames}',tnames='{$tnames}',mnames='{$mnames}',gnames='{$gnames}',plengths='{$plengths}',filename='{$fileName}',path1='{$targetfolder}',iisn='{$iisns}' WHERE ID='{$s_id}' ";
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
              <form  class="form-horizontal" action="publication.php" method="post" enctype="multipart/form-data">
          <?php
          if($conn = mysqli_connect('localhost', 'root','','demo'))
{
  $check="SELECT UPPER(substr('{$username}',1,8)) 'username' from student1 where username='$username'";
        $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
        $IDcheck=$row['username'];
  $sql="SELECT * from publication where ID='$IDcheck'";
  $result = mysqli_query($conn,$sql) or trigger_error(mysqli_error($conn));
        $row=mysqli_fetch_assoc($result);
 
       for($i = 0; $i < mysqli_num_rows($result); $i++){

        echo 
           "<label>College Student Id:<font color=red><sup>*</sup></font>
           <input type=text class=form-control name=s_id  value={$row['ID']} size=35 pattern=[0-9]{2}[A-Z]{3}[0-9]{3} required><br><br></label>
        <center><h2>Other Curricular Information:</h2></center>
        <div class=field_wrapper>
        <fieldset>
            <legend class=leg>Publication Details</legend><br>
            <label>Have any Publications?<font color=red><sup>*</sup></font></label><input type=radio name=publication value=Y  if({$row['publication']} == 'Y'){ checked='checked';} onclick=document.getElementById('on').disabled = false; document.getElementById('off').disabled = true;>Yes<input type=radio name=publication value=N   if({$row['publication']} == 'N'){checked='checked';}  onclick=document.getElementById('on').disabled = true; document.getElementById('off').disabled = false;>No<br><br>
            <fieldset id=on>
                <label>Publication/Research Paper Name:<font color=red><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type=text class=form-control id=on name=pname[] value={$row['pname']} required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=javascript:void(0); class=add_button title=Add field><button type=button class=btn>+</button></a>&nbsp;&nbsp;&nbsp;<label>Add Publication</label><br><font color=red></font><br>
            <label>Date of Pulbication:<font color=red><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type=date class=form-control value={$row['pdate']}  id=on name=pdate[] required></label><br>
                <label>Journal Name(in which paper is published):<font color=red><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type=text id=custom class=form-control value={$row['jname']}  name=jname[]></label>
                <br>
                <label>Teammates' Names(if any):</label>&nbsp;&nbsp;&nbsp;<input type=text class=form-control id=on value={$row['tname']}  name=tname[] required><br>
                <label>Mentor Name(if any):&nbsp;&nbsp;&nbsp;<input type=text class=form-control id=on value={$row['mname']} name=mname[] required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Guide Names(if any):&nbsp;&nbsp;&nbsp;<input type=text class=form-control value={$row['gname']}  id=on name=gname[] required></label><br><br>
                <label>Length of Publication/Paper:<font color=red><sup>*</sup></font>&nbsp;&nbsp;&nbsp;
                    <input type=number class=form-control min=1 max=30 step=1 value={$row['plength']}  name=plength[]></label><br>
                <fieldset id=on>
                    <label>IIS Number:<font color=red><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type=text class=form-control value={$row['iisn']}  id=on name=iisn[] required></label>
                  
            <br><br> 
                    <label>Publication/Paper:<font color=red><sup>*</sup></font></label>&nbsp;&nbsp;&nbsp;<input type=file value={$row['filename']}  name=ppdf[] accept=application/pdf>";
              
        
}
}
?>
            <br><br> 
                </fieldset>
        </fieldset>
        </fieldset>
        </div>
        <br><br>
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="Submit" value="Update" class="btn btn-success">
            </div>
            </form>

        </div>
        <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><hr><label>Publication/Research Paper Name:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on"  name="pname[]" required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="remove_button"><button type="button" class="btn">-</button></a>&nbsp;&nbsp;&nbsp;<label>Remove this Internship/Project</label><br><label>Date of Pulbication:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="date" class="form-control" id="on" name="pdate[]" required></label><br><label>Journal Name(in which paper is published):<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="text" id="custom" class="form-control" name="jname[]"></label><br><label>Teammates Names(if any):</label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="tname[]"  required><br><label>Mentor Name(if any):&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="mname[]" required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Guide Names(if any):&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on" name="gname[]" required></label><br><br><label>Length of Publication/Paper:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="number" class="form-control" min="1" max="30" step="1"  name="plength[]"></label><br><fieldset id="on"><label>IIS Number:<font color="red"><sup>*</sup></font>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="on"  name="iisn[]" required></label><legend><b>Documents Upload for proof</b></legend><br><br> <label>Publication/Paper:<font color="red"><sup>*</sup></font></label>&nbsp;&nbsp;&nbsp;<input type="file" name="ppdf[]" accept="application/pdf"><br><br></fieldset> </div>';  
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