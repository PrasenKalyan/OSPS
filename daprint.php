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
       
 ?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>OSPS App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="grid.css" rel="stylesheet">
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	    <!-- (2) ATTACH AUTOCOMPLETE ON PAGE LOAD -->
   
	<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
  </head>

  <body>
     
    <div class="container">
  
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
	<a href="dashboard.php">	<img src="OSPS TELECOM.png"  class="img-fluid"/></a>
		
		</div>
		</div>
      
      <div class="row">
	  <div class="col-12 col-sm-12 col-lg-12">
	      <?php 
	      $pname=$_GET['name'];
	      $fdate=$_GET['fdate'];
	      $tdate=$_GET['tdate'];
	      
	      ?>
         <table class="table">
             
              <tr><th>Name:</th><td><?php echo $pname ?></td>
                  <th>From Date</th><td><?php echo $fdate; ?></td>
                   <th>To Date</th><td><?php echo $tdate; ?></td>
              </tr>
         </table>
            <table class="table">
               
<tr>
    <th>S No</th>
    <th>Date</th>
    <th>Sitename</th>
   <th>Deposits</th>
    <th>Claim</th>
    <th>Remarks</th>
    <th>Aprv By</th>
</tr>
         <?php
      $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 $y=mysqli_query($conn,"select * from request where uploadby='$pname' and datecheck between '$fdate' and '$tdate' group by datecheck order by id asc ") or die(mysqli_error($link));
 $i=1;
 $c=0;
         while($y1=mysqli_fetch_array($y)){
             
             $c=$c+$y1['claim'];
         ?>    <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $y1['datecheck']." ".$y1['time']; ?></td>
             <td><?php echo $y1['sname']; ?></td>
             <td><?php echo $y1['deposits']; ?></td>
             <td><?php echo $y1['claim']; ?></td>
             <td><?php echo $y1['remarks']; ?></td>
              <td><?php echo $y1['dapaprove']; ?></td>
              
             
     </tr>
             <?php $i++; }?>
             <tr ><td colspan="2">Final Approved Amount By Manager</td>
             <td><?php echo $c; ?></td></tr>
         </table>
    <div id="demo"> </div>
    <button type="button"  id="prnt"  onclick="prnt();" class="btn btn-primary">Print</button>
	  <a href="dashboard.php"> <button type="button" id="cls"  class="btn btn-primary">Close</button></a>
  
  </div >
 
      </div>
     
    </div> <!-- /container -->
	
  

  </body>
</html>
 <?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>
