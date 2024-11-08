<?php //include('config.php');
session_start();
include('connection.php');
if($_SESSION['name'])
{
$name=$_SESSION['name'];
 $uname= $_SESSION['name'] ;
     $phoneno= $_SESSION['phoneno'] ;
       $state= $_SESSION['state'] ;
       $category= $_SESSION['category'] ;
       $Inventory=$_SESSION['Inventory'];
        $type=$_SESSION['type'];
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

    <title>OSPS Billing App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">
     <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
  
      <div class="row" >
        <div class="col-12 col-sm-12 col-lg-12">
		<a href="../dashboard.php">	<img src="OSPS TELECOM.png"  class="img-fluid"/></a>
		<!-- <p  id="styletext" style="text-align:right;"><b style="color:red;"><?php echo $uname; ?></b> &nbsp;&nbsp;  </p> -->
		<div id="headcontainer" class="dropdown" align="right">
    <!-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Profile
    </button> -->
    <div class="dropdown-menu">
        <?php if($category=='Others'){?>
        <!-- <a class="dropdown-item" onclick="getLocation2()">Add Ptw</a>
      <a class="dropdown-item" href="dasheet.php">Get DA Sheet</a>
      <a class="dropdown-item" href="sidebar/getfundrequest.php?page=1&state=<?php echo $state?>">Fund Request</a> -->
      <?php }?>
       
       <?php if($phoneno=='7780174555'){?>
        
      <a class="dropdown-item" href="../dasheetprint1.php">Print DA Sheet</a>
      <?php }?>
       <!-- <a class="dropdown-item" href="dispatch.php">Inventory</a>
      <a class="dropdown-item" href="../viewattendance.php">View Attendance</a>
      <a class="dropdown-item" href="../logout.php">Log Out</a> -->
    </div>
  </div>

		</div>
		</div>
		
		 <?php 

}else

{

session_destroy();

session_unset();

header('Location:../index.php');

}

?>