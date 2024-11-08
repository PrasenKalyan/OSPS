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
    <script>
      $(function () {
        // NAME AUTO-COMPLETE
        $('#name').autocomplete({
          source: function (request, response) {
            $.ajax({
              type: "POST",
              url: "autocompletedb.php",
              data: {
                term: request.term,
                type: "user"
              },
              success: response,
              dataType: 'json',
              minLength: 2,
              delay: 100
            });
          }
        });
});
	</script>
	<script>
	function myFunction()
{
    var name=document.getElementById('name').value;
    if(name!=''){
        myFunction1();
    }else{
        alert('please enter name');
    }
}
function myFunction1()
{
var name=document.getElementById('name').value;

var fdate=document.getElementById('fdate').value;
var tdate=document.getElementById('tdate').value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
document.getElementById("dast").innerHTML=show;
    }
  }
xmlhttp.open("GET","siteprint.php?name="+name,true);
xmlhttp.send();
}
</script>
  </head>

  <body>
     
    <div class="container">
  
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
	<a href="dashboard.php">	<img src="OSPS TELECOM.png"  class="img-fluid"/></a>
		<p style="text-align:right;">Welcome <b style="color:red;"><?php echo $uname; ?></b> &nbsp;&nbsp;
		<div class="dropdown" align="right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Profile
    </button>
    <div class="dropdown-menu">
       <?php if($phoneno=='7780174555'){?>
        
      <a class="dropdown-item" href="dasheet.php">Get DA Sheet</a>
      <?php } ?>
      <a class="dropdown-item" href="viewattendance.php">View Attendance</a>
      <a class="dropdown-item" href="logout.php">Log Out</a>
    </div>
  </div>
  </p>
		</div>
		</div>
      
      <div class="row">
	  <div class="col-12 col-sm-12 col-lg-12">
         <form action='siteprint.php'>
    <div class="form-group">
       
	<label for="pwd">Site id:</label>
      <input type="text" required class="form-control" id="name" placeholder="Enter Site id" name="name" >
    </div>
  
     <div id="demo"> </div>
    <button type="submit"  class="btn btn-primary">Search</button>
    </form>
   
	
  
  </div >
  <div class="col-12 col-sm-12 col-lg-12" id="dast" >
        
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
