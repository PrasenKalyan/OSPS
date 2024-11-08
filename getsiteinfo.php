<?php
  $conn = mysqli_connect("ospsbilling.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_ospsbilling");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $id=$_GET['id'];
 //creating a query
 $stmt = $conn->prepare("SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM aprefferences where indus_id='$id' or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM krefferences where indus_id='$id' or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM goarefferences where indus_id='$id' or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM mrefferences where indus_id='$id'or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM grefferences where indus_id='$id'or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM refferences where indus_id='$id'or req_ref='$id';");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($indusid,$refno, $sitename,$area,$state,$ptw,$sopt);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 	echo ":" . $refno;
	echo ":" . $state;
	echo ":" . $sitename;
	echo ":" . $ptw;
	echo ":" . $id;
 }
 
 //displaying the result in json format 

 ?>