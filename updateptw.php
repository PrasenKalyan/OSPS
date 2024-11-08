<?php
  $conn = mysqli_connect("ospsbilling.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_ospsbilling");
  date_default_timezone_set('Asia/Kolkata');
  $conn1 = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
  $response = array();
    $response["success"] = false;  
 $id=$_POST['indid'];
 $no=$_POST['com'];
    $loc="office";
     $upload=$_POST["uname"];
      $category=$_POST["category"];
       $phoneno=$_POST["phoneno"];
	$sref=$_POST["sref"];
	$sstate=$_POST["sstate"];
	$ssname=$_POST["sname"];
	$sarea=$_POST["sarea"];
	$com="ptw update";
	$image1="noimage";
	$image2="noimage";
	$image3="noimage";
	$image4="noimage";
	$decoded="nopdf";
     $date=date("d-m-Y");
       $year=date("Y");
   $time=date("h:i:sa");
   $month = date('F', strtotime($date))." ".$year;
  
 //creating a query
 if($sstate=="Maharashtra"||$sstate=="M&G"||$sstate=="MH")
 {
$sstate="Maharshtra";    
 $stmt = "UPDATE mrefferences set ptw='$no' where indus_id='$id'";}
 else if($sstate=="AP"||$sstate=="ap"){
    
 $stmt = "UPDATE aprefferences,refferences  set aprefferences.ptw='$no',refferences.ptw='$no' where aprefferences.indus_id='$id' AND refferences.indus_id='$id'";}
 else if($sstate=="KK" or $sstate=="Karnataka"){
     $sstate="Karnataka";
 $stmt = "UPDATE krefferences set ptw='$no' where indus_id='$id'";}
 else if($sstate=="TS"||$sstate=="Telangana"||$sstate=="TELANGANA"||$sstate=="ts"||$sstate=="Ts")
 {
     $sstate="TS";
 $stmt = "UPDATE refferences set ptw='$no' where indus_id='$id'";}
 else if($sstate=="Gujarath"||$sstate=="Guj"||$sstate=="Gujrath"||$sstate="Gujarat"||$sstate=="GUJARAT")
 {
     
 $sstate="Gujrath";
 $stmt = "UPDATE grefferences where indus_id='$id' ";
 }
$stmt1 = $conn->prepare("UPDATE aprefferences set ptw='$no' where indus_id='$id'");
 $stmt2 = $conn->prepare("UPDATE mrefferences set ptw='$no' where indus_id='$id'");
 $stmt3 = $conn->prepare("UPDATE grefferences set ptw='$no' where indus_id='$id'");
 $stmt4 = $conn->prepare("UPDATE refferences set ptw='$no' where indus_id='$id'");
  $stmt5 = $conn->prepare("UPDATE krefferences set ptw='$no' where indus_id='$id'");
 if($stmt1->execute())
 {
     $response["success"] = true;
     
 }
 if($stmt2->execute())
 {
     $response["success"] = true;
    
 }
 if($stmt3->execute())
 {
     $response["success"] = true;
 }
  if ($stmt4->execute())
 {
     $response["success"] = true;
 }
 if ($stmt5->execute())
 {
     $response["success"] = true;
     
 }

 $stmt6 = "INSERT INTO request ( uploadby,phoneno,category,loc,indid,sref,sstate,sname,sarea,com,date,time,month,chimage1,chimage2,chimage3,chimage4,chpdf,ptwno) VALUES('$upload','$phoneno','$category','$loc','$id','$sref','$sstate','$ssname','$sarea','$com','$date','$time','$month','$image1','$image2','$image3','$image4','$decoded','$no')";
 //executing the query 
 $queryRes2 = mysqli_query($conn,$stmt);
 
 

    $queryRes1 = mysqli_query($conn1,$stmt6);
    if($queryRes1)
    {
$response["success"] = true;
        echo '<script type="text/javascript">
     alert("You update is recorded!");
           window.location = "dashboard.php"
      </script>';
    }


 echo json_encode($response);
 ?>