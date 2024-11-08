<?php 
 $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
  if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
  $q = strtolower($_POST["term"]);
if (!$q) return;
 //creating a query
 $stmt = $conn->prepare("SELECT uploadby,phoneno,date FROM request where  uploadby LIKE '%$q%'  group by uploadby;");
 
 //executing the query 
 $stmt->execute();
 //binding results to the query 
 $stmt->bind_result($name, $phoneno, $date);
 $products = []; 
 //traversing through all the result 
 while($stmt->fetch()){
//$products[]= $phoneno;
$products[]= $name;
//$products= $name;
 }
 
 //displaying the result in json format 
 echo json_encode($products);
 ?>