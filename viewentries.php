<?php 
 
 
  $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $statei=$_POST['name'];
 $itemcount=$_POST['itemcount'];
 $pagenumber=$_POST['pagenumber'];
 $from=$pagenumber*$itemcount-($itemcount-1);
 $to=$pagenumber*$itemcount;
 if($from=='1')
 {
 $from=0;
 $to=$to+1;
 }
 if($statei=='IN-issue'||$statei=='in-issue')
 {
     $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM issues  ORDER BY id desc LIMIT $from,$to  ");
 }
 
 else if($statei=='AP'|| $statei=='TS'||$statei=='Telangana')
 {
 $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where sstate='AP'or sstate='TS' or sstate='Telangana' or sstate='allstates'  ORDER BY id desc LIMIT $from,$to");}
 else if($statei=='Maharashtra'||$statei=='Gujrath'){
      $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where sstate='$statei' or sstate='allstates'  ORDER BY id desc LIMIT $from,$to");
 }
 else{
     $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where phoneno='$statei' or uploadby='$statei' or date='$statei' or indid='$statei'  ORDER BY id desc LIMIT $from,$to");
 }
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($iid,$id, $loc,$sname,$sref,$sarea,$sstate,$com,$date,$time,$chimage1,$chimage2,$chimage3,$chimage4,$chpdf,$category,$phoneno,$ptw,$reply,$fr);
 
 $products = array(); 
 $count=$from;
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id']=$iid;
 $temp['name'] = $id; 
 $temp['sitename'] = $sname;
 $temp['siteid'] = $sref;
 $temp['sitearea'] = $sarea;
 $temp['sitestate'] = $sstate;
 $temp['comments'] = $com;
 $temp['date'] = $date." ".$time;
    $temp['loc']=$loc;
      $temp['chimage1']=$chimage1;
        $temp['chimage2']=$chimage2;
        $temp['chimage3']=$chimage3;
        $temp['chimage4']=$chimage4;
        $temp['chpdf']=$chpdf;
        $temp['category']=$category;
        $temp['phoneno']=$phoneno;
        $temp['ptwno']=$ptw;
        $temp['reply']=$reply;
        $temp['fr']=$fr;
 array_push($products, $temp);
 $count=$count+1;
 }
 //displaying the result in json format 
 echo json_encode($products);
 ?>