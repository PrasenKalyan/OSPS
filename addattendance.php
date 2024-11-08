
   

<?php
 function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}
$conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
      date_default_timezone_set('Asia/Kolkata');
      $response["success"] = "false";
      if(isset($_POST['submit'])){
      $name=$_POST["name"];
       $date=date("Y-m-d");
        $time=date("h:i:sa");
      $phoneno=$_POST["phoneno"];
       $loc=$_POST["loc"];
       $lat=$_POST["lat"];
       $lon=$_POST["lon"];
       $level1=$_POST["level1"];
       $nlat=17.4000;
       $nlon=78.4779;
       $type='early';
      $response["lateness"] = "early";
 $var = date('H');
 $year=date("Y");
  $month = date('F', strtotime($date))." ".$year;
  
 if(distance($lat,$lon,$nlat,$nlon,"K")<0.3 || $level1!="office")
 {
 if($var>9)
 {
     $type='late';
     $response["lateness"] = "late";
 }
 
 
      $query = "insert into attendance (name,phoneno,loc,date,time,month,type) values ('$name','$phoneno','$loc','$date','$time','$month','$type')";
$salres = mysqli_query($conn,$query) or die("error in reg query");
if($salres)
{
    if($var>9)
    {

 date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
//alert you are late to office! kindly be on time! redirect to dashboard
     echo '<script type="text/javascript">
     alert("You are late to office! kindly be on time!");
           window.location = "dashboard.php"
      </script>';
}
else{
 //alert you are on time to office! redirect to dashboard
       echo '<script type="text/javascript">
     alert("You are on time to office!");
           window.location = "dashboard.php"
      </script>';
}
     

  
 
}
}
else{
    echo '<script type="text/javascript">
     alert("Attendance not saved ! need to be in office to mark attendance!");
           window.location = "dashboard.php"
      </script>';
    
}
}

      ?>