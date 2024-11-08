 <?php 

//if(isset($_POST['sub'])){
    
    
      $cntk=$_POST['cntk'];
   
     if($_POST["indid"]=='' || $_POST["redno"]=='' )
     {
     
     
      $conn = mysqli_connect("localhost", "root", "", "a16673ai_osps");
      date_default_timezone_set('Asia/Kolkata');
$sdate = date("Y-m-d");
$time = date("H:i:s");
$month = date("F Y");
//$nameofp=$_POST["upby"];
$nameofp=$_POST["upby"];
$indid=$_POST["indid"];
$sitestate=$_POST["sitestate"];
$sitename=$_POST["sitename"];
$refno=$_POST['refno'];
//$json = $_POST["json"];
$dist=$_POST['district'];
$sopt=$_POST['seeking_opt'];
$dcno=$_POST['dcno'];
$issuername=$_POST['issuername'];
//$man=$_POST['ds'];
$man="";
$invno="";
$pono="";
$supname="";
//$invno=$_POST['pono'];
//$pono=$_POST['invno'];
//$supname=$_POST['supname'];
//$jsonarray = json_decode($json,true);
//$reqcount = sizeof($jsonarray);
  $table_name = "SHOW TABLE STATUS WHERE name='productsentry'"; 
$query195 = mysqli_query($conn,$table_name) or die(mysqli_error($conn)); 
$row256 = mysqli_fetch_array($query195); 
 $next = $row256["Auto_increment"]; 
  $rowid="MFR".$next;
  
$count = 0;
  $select = "select * from productsentry where supname = '$supname' and invno='$invno' ";
    $result = mysqli_query($conn,$select) or die("errror in select");
     $cc=mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0)
    {
        if($refno=='IN-material')
        $man="materials";
        else
$man="allstates";
$invno="nomic";
$pono="nomic";
$supname="nomic";
//for($i=0;$i<sizeof($jsonarray);$i++)
//{
    for($i=0;$i<$cntk;$i++){
    
     $name =$_POST['prd'][$i] ;
    $quantity =$_POST['qty'][$i] ;
    $unitofm =$_POST['unit'][$i] ;
    
   
if($quantity!=""){
   echo  $query = "insert into productsentry (product,qty,data,time,uid,uploadby,indid,sitename,sitestate,unit,sno,sopt,dist,invno,pono,supname,manager,dcno,issuername) 
    values('$name','$quantity','$sdate','$time','$rowid','$nameofp','$indid','$sitename','$sitestate','$unitofm','$refno','$sopt','$dist','$invno','$pono','$supname','$man','$dcno','$issuername')";
       
    $queryres = mysqli_query($conn,$query) or die("error in new menu");
   
  
}
    } 
}


mysqli_close($conn);

     
     
      print "<script>";
			print "alert(' Successfully Raised New Request ');";
			print "self.location='dispatch.php';";
			print "</script>";
     
     
     }
     else
     {
         print "<script>";
			print "alert(' Enter Valid Id! ');";
			print "self.location='dispatch.php';";
			print "</script>";
     }
   

//}
?>   