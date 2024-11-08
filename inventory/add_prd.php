<?php include("head.php");?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="shortcut icon" href="//d2d3qesrx8xj6s.cloudfront.net/favicon.ico" type="image/x-icon">
    <link rel="icon" href="//d2d3qesrx8xj6s.cloudfront.net/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="//d2d3qesrx8xj6s.cloudfront.net/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="//d2d3qesrx8xj6s.cloudfront.net/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="//d2d3qesrx8xj6s.cloudfront.net/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="//d2d3qesrx8xj6s.cloudfront.net/apple-touch-icon-144x144-precomposed.png">
    <link rel="alternate" type="application/rss+xml" title="Latest snippets from Bootsnipp.com" href="https://bootsnipp.com/feed.rss" />

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<!--    <link rel="stylesheet" href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=872ccd9c6dce18ce6ea4d5106540f089">-->
    <link rel="stylesheet" href="bootsnipp.min.css">
    <style type="text/css">

	body{
		background-image: url('looping-bg.jpg');
	}
	
	.form-signin input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	.form-signin .middle {
	  margin-bottom: -1px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	.form-signin .bottom {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	.form-signin .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	}
</style>


<?php //include("header.php");?>
</head>
<title>Osps Billing</title>
<body>





   <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">


			
						
			<hr class="colorgraph">
			<form method="POST" action="" accept-charset="UTF-8" role="form" class="form-signin">
		
				<fieldset>
					<input class="form-control" placeholder="sno" name="sno" type="text">
					<textarea  name="prd_name" class="form-control input-md" placeholder="Product Name" required></textarea>  
			    	<input class="form-control" placeholder="Qty" name="qty" type="text">
  <br />
				 
				    <input class="btn btn-lg btn-primary btn-block" name="sub" type="submit" value="Add New Product">
				      </div>
			  	</fieldset>
		  	</form>
		</div>
  	</div>
</div>


<?php include("connection.php");
if(isset($_POST['sub'])){
	$sno=$_POST['sno'];
	$prd_name=$_POST['prd_name'];
	$qty=$_POST['qty'];
	$sq=mysqli_query($link,"insert into masterproducts(sno,product,qty)values('$sno','$prd_name','$qty')");
		if($sq){
//header('Location: edit_profile.php');
print "<script>";
			print "alert('Successfully Updated');";
			print "self.location='add_prd.php';";
			print "</script>";
		}
}?>





