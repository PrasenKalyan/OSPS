<?php
session_start();
if($_SESSION['name'])
 {
 $uname= $_SESSION['name'] ;
     $phoneno= $_SESSION['phoneno'] ;
       $state= $_SESSION['state'] ;
       $category= $_SESSION['category'] ;
       if($state=='ts'){
           $state='TS';
       }
       if($state=='gj'){
           $state='Gujrath';
       }
       if($state=='mh'){
           $state='Maharashtra';
       }
     
    $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
     date_default_timezone_set('Asia/Kolkata');
     $reply=$_POST["fundrequest"]." Approved by :".$uname;
     $id1=$_POST["id"];
   $response = array();
   $response["success"]="false";
$query1= "Update request set status='aprvd', fundrequest='$reply' where id='$id1'";
$queryRes1 = mysqli_query($conn,$query1);
if( $queryRes1)
{
   echo '<script type="text/javascript">
     alert("Succesfully Approved!");
           window.location = "javascript:history.go(-1)"
      </script>';
 
}
}
else
{

session_destroy();

session_unset();

header('Location:index.php');

}

?>