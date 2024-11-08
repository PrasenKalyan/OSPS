<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $connect = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
      date_default_timezone_set('Asia/Kolkata');
      $conn1 = mysqli_connect("ospsbilling.com", "ospsbill_abdul", "tolichowki", "ospsbill_ospsbilling");
      if(isset($_POST['submit']))
      {
$imagename="image1";
    $loc=$_POST["loc"];
    $ptw=$_POST["ptw"];
    $token="not";
     $upload=$_POST["uname"];
      $category=$_POST["category"];
       $phoneno=$_POST["phoneno"];
	$indid=$_POST["indid"];
	$sref=$_POST["sref"];
	$sstate=$_POST["sstate"];
	$ssname=$_POST["sname"];
	$sarea="";
	$com=$_POST["com"];
	$image1="noimage";
	$image2="noimage";
	$image3="noimage";
	$image4="noimage";
	$decoded="nopdf";
	/*$image1=$_POST["image1"];
	$image2=$_POST["image2"];
	$image3=$_POST["image3"];
	$image4=$_POST["image4"];
	$decoded=$_POST["decoded"];*/
     $date=date("d-m-Y");
      $datechecking=date("Y-m-d");
       $year=date("Y");
   $time=date("h:i:sa");
   $month = date('F', strtotime($date))." ".$year;
   $table_name = "SHOW TABLE STATUS WHERE name='request'"; 
$query195 = mysqli_query($connect,$table_name) or die(mysqli_error($connect)); 
$row256 = mysqli_fetch_array($query195); 
 $next = $row256["Auto_increment"]; 
 /*$imagename = "photo1".$next;
   $imagename1 = "photo2".$next;
   $imagename2 = "photo3".$next;
    $imagename3 = "photo4".$next;
     $imagename4 = "pdf".$next;
    $path = "uploads/".$imagename.".jpg";
	      $path1 = "uploads/".$imagename1;
	      $path2 = "uploads/".$imagename2;
	      $path3 = "uploads/".$imagename3;
	      $path4 = "uploads/".$imagename4.".jpg";
 
	           if($decoded!="nopdf")
	           file_put_contents($path4,base64_decode($decoded));
	 if($image1!="noimage")
	      file_put_contents($path,base64_decode($image1));
	       
	 if($image2!="noimage")
	     file_put_contents($path1,base64_decode($image2));
	     
	 if($image3!="noimage")
	      file_put_contents($path2,base64_decode($image3));
	 
	 if($image4!="noimage")
	      file_put_contents($path3,base64_decode($image4));
	      */
	       if($sstate=="TELANGANA"||$sstate=="Telangana"||$sstate=="TS"){
	        $sstate="TS";
	       $stmt = "UPDATE refferences set ptw='$com' where indus_id='$indid'";
	    }
	      if($sstate=="KK"||$sstate=="Karnataka"){
	        $sstate="Karnataka";
	       $stmt = "UPDATE krefferences set ptw='$com' where indus_id='$indid'";
	    }
	     if($sstate=="Maharashtra"||$sstate=="M&G"||$sstate=="MH"){
	        $sstate="Maharashtra";
	     $stmt = "UPDATE mrefferences set ptw='$com' where indus_id='$indid'";
	    }
	      if($sstate=="Guj"||$sstate=='Gujarat'){
	     $sstate="Gujrath";
	    $stmt = "UPDATE grefferences set ptw='$com' where indus_id='$indid'";
	    }
	   
	       

	    
	    
     function registerUser() {
        global $connect, $loc,$indid,$sref,$sstate,$ssname,$sarea,$com,$date,$time,$month,$image1,$image2,$image3,$image4,$decoded,$upload,$phoneno,$category,$ptw,$token,$datechecking;
        if($indid=='IN-issue'||$indid=='in-issue')
       echo  $statement = mysqli_prepare($connect, "INSERT INTO issues ( uploadby,phoneno,category,loc,indid,sref,sstate,sname,sarea,com,date,time,month,chimage1,chimage2,chimage3,chimage4,chpdf,ptwno,fundrequest) VALUES (?,?,?,?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?)");
         else
      echo  $statement = mysqli_query($connect, "INSERT INTO request ( uploadby,phoneno,category,loc,indid,sref,sstate,sname,sarea,com,date,time,month,chimage1,chimage2,chimage3,chimage4,chpdf,ptwno,fundrequest,datecheck) VALUES ('$upload','$phoneno','$category','$loc','$indid','$sref','$sstate','$ssname','$sarea','$com','$date','$time','$month','$image1','$image2','$image3','$image4','$decoded','$ptw','$token','$datechecking')");
       if($statement)
       return true;
     }
    $response =array();
    $response["success"] = false;    
if(registerUser()){
    if($com=='ptwclosedsuccess')
    {
         $queryRes2 = mysqli_query($conn1,$stmt);
         if($queryRes2)
          $response["success"] = "true";
    }
    else{
          echo '<script type="text/javascript">
     alert("You entry is recorderd!");
           window.location = "dashboard.php"
      </script>';
    $response["success"] = "true";
    }
}
else{
     echo '<script type="text/javascript">
     alert("Server error!");
           window.location = "dashboard.php"
      </script>';
}
//echo json_encode($response);
    
      }
      
?>