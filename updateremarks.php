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
      
$sdate = date("Y-m-d");
$time = date("H:i:s");
$month = date("F Y");
$name=$_POST["uname"];
$json = $_POST["json"];
$jsonarray = json_decode($json,true);
$reqcount = sizeof($jsonarray);
$count = 0;
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$date1=count($_POST['date']);
//exit;

for($i=0;$i<$date1;$i++)
{
    $date = $_POST["date"][$i];
    $claim = $_POST["claims"][$i];
    $remarks=$_POST["remarks"][$i];
 $query1 = "Select * from request where uploadby='$name' and datecheck='$date'";
    $queryres1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
    if(mysqli_num_rows($queryres1)>0)
    {
    $query = "Update request set remarks='$remarks',claim='$claim',dapaprove='$uname' where uploadby='$name' and datecheck='$date'";
       
    $queryres = mysqli_query($conn,$query) or die(mysqli_error($conn));
    }
    else
    {
      $query = "Insert into request (remarks,uploadby,datecheck,dapaprove) values('$remarks','$name','$date','$uname')";
    $queryres = mysqli_query($conn,$query) or die(mysqli_error($conn));   
    }
    
}
if($queryres){
header('Location:daprint.php');
header("location: daprint.php?fdate=$fdate&tdate=$tdate&name=$name");

}
/*if($queryres)
    {
      
      print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='daprint.php";
	print "</script>";
      
        //$count++;
    }
if($reqcount == $count)
{
    echo 'yes';
    
}
*/

mysqli_close($conn);


}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>
