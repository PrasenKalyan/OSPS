<?php
  $conn = mysqli_connect("ospsbilling.com", "ospsbill_abdul", "tolichowki", "ospsbill_ospsbilling");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $id="IN-1042135";
 //creating a query
 $stmt = $conn->prepare("SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM aprefferences where indus_id='$id' or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM krefferences where indus_id='$id' or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM mrefferences where indus_id='$id'or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM grefferences where indus_id='$id'or req_ref='$id' union SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM refferences where indus_id='$id'or req_ref='$id';");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($refno,$indusid, $sitename,$sitearea,$sopt,$sitedistrict,$ptw);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 
 echo $refno; 
 
 }
 
 //displaying the result in json format 
 ?>