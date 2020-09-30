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
    
 header('Location:pdfuploadhsc.php');
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
    <form action="pdfuploadssc.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <center>
        <h1>Student Information Portal</h1></center><hr>
        <center><h2>Academic Information:</h2></center>
    <fieldset>
        <legend>Documents Upload</legend>
            <label>SSC : <select name="SSC" class="form-control">
            <option value="Marksheet">Marksheet</option>
            <option value="Leaving Certificate">Leaving Certificate</option>
            <option value="Bonafide Certificate">Bonafide Certificate</option>
            </select>
        </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="file" name="fileToUpload" accept="application/pdf">
            <br><br>
        </fieldset>
        <input class="btn btn-success" type="Submit" name="Submit" value="Submit">
        </form>
    </div>
    </body>
</html>