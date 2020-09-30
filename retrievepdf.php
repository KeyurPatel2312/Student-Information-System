<?php
if($conn = mysqli_connect('localhost', 'root', '', 'demo'))
{
    session_start();
            if(isset($_SESSION['Username'])){
                $username = $_SESSION['Username'];
            }
        if(isset($_POST['Submit']))
        {
            if(isset($_POST['ID1']))
            {
               $ID1=$_POST['ID1'];
             $check="SELECT department from faculty1 where username='$username'";
             $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row=mysqli_fetch_assoc($result);
             $department=$row['department'];
              $query1 = "SELECT filename,filetype,data FROM sscpdf  natural join student3 where ID='$ID1' AND branch='$department'"; 
              $result1 = mysqli_query($conn,$query1) or die(mysqli_error()); 
             $row1 = mysqli_fetch_assoc($result1);
    
             $filename1=$row1['filename'];
              $filetype1=$row1['filetype'];
             $file1=$filetype1.$filename1;
              
     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename1.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($filetype1);
 }
  
  if(isset($_POST['ID2']))
  { 
    $ID2=$_POST['ID2'];
    $check="SELECT department from faculty1 where username='$username'";
             $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row=mysqli_fetch_assoc($result);
             $department=$row['department'];
              
     $query2 = "SELECT filename,filetype,data FROM hscpdf  natural join student3 where ID='$ID2' AND branch='$department'"; 
     $result2 = mysqli_query($conn,$query2) or die(mysqli_error()); 
     $row2 = mysqli_fetch_assoc($result2);
     
       $filename2=$row2['filename'];
     $filetype2=$row2['filetype'];
      $file2=$filetype2.$filename2;

     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename2.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($filetype2); 
 }
 if(isset($_POST['ID3']))
 {
    $ID3=$_POST['ID3'];
            $check="SELECT department from faculty1 where username='$username'";
             $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row=mysqli_fetch_assoc($result);
             $department=$row['department'];
              

      $query3 = "SELECT filename,filetype,data FROM iduploadpdf  natural join student3 where ID='$ID3' AND branch='$department'"; 
     $result3= mysqli_query($conn,$query3) or die(mysqli_error()); 
 
     $row = mysqli_fetch_assoc($result3); 
      $filename3=$row['filename'];
     $filetype3=$row['filetype'];
     $file3=$filetype3.$filename3;

     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename3.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($filetype3);

 }
  if(isset($_POST['ID4']))
  {
    $ID4=$_POST['ID4'];
     $query4 = "SELECT filename,filetype,data FROM marksheetpdf natural join student3 where ID='$ID4' AND branch='$department'"; 
     $result4 = mysqli_query($conn,$query4) or die(mysqli_error());
  
     $row4 = mysqli_fetch_assoc($result4);

       $filename4=$row4['filename'];
     $filetype4=$row4['filetype'];
     $file4=$filetype4.$filename4; 

     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename4.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($filetype4); 
    }
        if(isset($_POST['ID5']))
            {
               $ID1=$_POST['ID5'];
             $check="SELECT department from faculty1 where username='$username'";
             $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row=mysqli_fetch_assoc($result);
             $department=$row['department'];
              $query1 = "SELECT filename,path1 FROM publication  natural join student3 where ID='$ID1' AND branch='$department'"; 
              $result1 = mysqli_query($conn,$query1) or die(mysqli_error()); 
             $row1 = mysqli_fetch_assoc($result1);
    
             $filename1=$row1['filename'];
              $path1=$row1['path1'];
             
              
     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename1.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($path1);
     
 }
 if(isset($_POST['ID6']))
            {
               $ID1=$_POST['ID6'];
             $check="SELECT department from faculty1 where username='$username'";
             $result = mysqli_query($conn,$check) or trigger_error(mysqli_error($conn));
              $row=mysqli_fetch_assoc($result);
             $department=$row['department'];
              $query1 = "SELECT filename,path FROM scholarship  natural join student3 where ID='$ID1' AND branch='$department'"; 
              $result1 = mysqli_query($conn,$query1) or die(mysqli_error()); 
             $row1 = mysqli_fetch_assoc($result1);
    
             $filename1=$row1['filename'];
              $path=$row1['path'];
              
     header('Content-type: application/pdf');   
     header('Content-Disposition: inline; filename="'.$filename1.'"');  
     header('Content-Transfer-Encoding:binary');
     header('Accept-Ranges:bytes');
     
     @readfile($path);
    
    }
    }
    }
    ?>