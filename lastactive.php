<?php
     $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
     date_default_timezone_set('Asia/Kolkata');
  //   $state=$_POST['state'];
//     if($state=='ts')
  //   $state='Telangana';
//     if($state=='mh')
  //   $state='Maharashtra';
    // if($state=='gj')
    // $state='Gujrat';
     //if($state=='kk')
     //$state='Karnataka';
     
   $itemcount=$_POST['itemcount'];
 $pagenumber=$_POST['pagenumber'];
 $from=$pagenumber*$itemcount-($itemcount-1);
 $to=$pagenumber*$itemcount;
 if($from=='1'){
     $from=0;
 }
      $stmt = $conn->prepare("SELECT id, uploadby,phoneno,sstate,date,time,sname,fundrequest
FROM request where fundrequest='not' and  id in( SELECT max(id) FROM request where fundrequest='not' GROUP BY uploadby ) order by id desc   LIMIT $from,$to");
     
 
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result( $id,$name, $email, $vehicleno,$due,$time,$sname,$fr); 
 if($itemcount!=null)
  $count=$from;
 $products = array(); 
 //traversing through all the result 
 while($stmt->fetch()){
     $x=$due." ".$time;
 $temp = array();
 $temp['name'] = $name; 
 $temp['phno'] = $email; 
 $temp['bokdate'] = $vehicleno; 
 $temp['af'] = $x;
 $temp['sname']=$sname;
 $temp['fr']=$fr;
 array_push($products, $temp);
 if($itemcount!=null)
  $count=$count+1;
 }
 
 //displaying the result in json format 
 echo json_encode($products);
 
?>
