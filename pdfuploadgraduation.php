<html>
<head>
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ewert' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
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
</style>
</head>
<?php

 $targetfolder = "uploads/";

 $targetfolder = $targetfolder . basename( $_FILES['fileToUpload']['name']) ;

 $ok=1;

$file_type=$_FILES['fileToUpload']['type'];

if ($file_type=="application/pdf") {

 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder))

 {
 header('Location:IDupload.php');
 }

 else {

 echo "Problem uploading file";

 }

}

else {

 echo "You may only upload PDFs, JPEGs or GIF files.<br>";

}

?>
    <body>
    	<div class="container">
    <form action="pdfuploadgraduation.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <center>
        <h1>Student Information Portal</h1></center>
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
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="fileToUpload" accept="application/pdf">
        </fieldset>
        <input type="submit" name="Submit" value="Submit" class="btn btn-success">
        </form>
    </body>
</html>