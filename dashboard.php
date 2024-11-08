<?php
session_start();
if($_SESSION['name'])
 {
 $uname= $_SESSION['name'] ;
     $phoneno= $_SESSION['phoneno'] ;
       $state= $_SESSION['state'] ;
       $category= $_SESSION['category'] ;
       $Inventory=$_SESSION['Inventory'];
        $type=$_SESSION['type'];
        if($_SESSION['statecheck'])
         $statecheck=$_SESSION['statecheck'];
       if($state=='ts'){
           $state='TS';
       }
       if($state=='gj'){
           $state='Gujrath';
       }
       if($state=='mh'){
           $state='Maharashtra';
       }
       else
       $state='TS'
       
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
  </head>
<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition(position) {
    window.location='tslocation.php?latitude='+position.coords.latitude+'&longitude='+position.coords.longitude;
}
function getLocation1() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition1);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition1(position) {
    window.location='attendance.php?latitude='+position.coords.latitude+'&longitude='+position.coords.longitude;
}
function getLocation2() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition2);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition2(position) {
    window.location='tslocation2.php?latitude='+position.coords.latitude+'&longitude='+position.coords.longitude;
}
</script>
  <body>
    <div class="container">
  
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
	<a href="dashboard.php">	<img src="OSPS TELECOM.png"  class="img-fluid"/></a>
		<p style="text-align:right;">Welcome <b style="color:red;"><?php echo $uname; ?></b> &nbsp;&nbsp;  </p>
		<div class="dropdown" align="right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Profile
    </button>
    <div class="dropdown-menu">
        <?php if($category=='Others'){?>
        <a class="dropdown-item" onclick="getLocation2()">Add Ptw</a>
      <a class="dropdown-item" href="dasheet.php">Get DA Sheet</a>
       <a class="dropdown-item" href="sitewiseprint.php">Print Site Wise Report</a>
      <a class="dropdown-item" href="sidebar/getfundrequest.php?page=1&state=<?php echo $state?>">Fund Request</a>
      <?php }?>
       
       <?php if($phoneno=='9014136840'){?>
        
      <a class="dropdown-item" href="dasheetprint1.php">Print DA Sheet</a>
      <?php }?>
       <a class="dropdown-item" href="inventory/dispatch.php">Inventory</a>
      <a class="dropdown-item" href="viewattendance.php">View Attendance</a>
      <a class="dropdown-item" href="logout.php">Log Out</a>
    </div>
  </div>

		
		
		
		</div>
		</div>
      
      
	  <div class="row">
        <div class="col-6 col-sm-6 col-lg-6" onclick="getLocation()" align="center"><img src="clipboard.png" class="img-fluid" />
        <lable>On-Field Entry</lable></div>
        <div class="col-6 col-sm-6 col-lg-6" align="center">
            <?php if($category=="Others"){ ?>
            <a href="sidebar/tsviewentries.php?page=1&state=<?php echo $state; ?>"><img src="conversation (1).png" class="img-fluid"/></a>
         <?php   }else{ ?>
<img src="conversation (1).png" class="img-fluid"/>
         
  <?php       } ?>
            
        <lable>View Entries</lable>
        </div>
      </div>
    <div class="row">
        <div class="col-6 col-sm-6 col-lg-6" align="center" onclick="getLocation1()"><img src="icon (1).png" class="img-fluid"/>
        <lable>Attendance</lable></div>
        <div class="col-6 col-sm-6 col-lg-6" align="center"><a href="sidebar/lastactive.php"><img src="man (1).png" class="img-fluid"/></a>
        <lable>DPR</lable></div>
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