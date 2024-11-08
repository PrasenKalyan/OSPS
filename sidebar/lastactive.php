<?php
session_start();
 
 if($_SESSION['name'])
 {
     
     $uname= $_SESSION['name'] ;
     $phoneno= $_SESSION['phoneno'] ;
     $category= $_SESSION['category'] ;
     $state= $_SESSION['state'] ;
    // $inventcat= $_SESSION['inventcat'] ;
 ?>
<!DOCTYPE html>
<html>

<head>
   <?php include('headerfiles.php'); ?>
	
	</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include('smenu.php'); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include('hmenu.php'); ?>

            <div class="row">
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
     
 
      $stmt = $conn->prepare("SELECT id, uploadby,phoneno,sstate,date,time,sname,fundrequest
FROM request where fundrequest='not' and phoneno!='' and id in( SELECT max(id) FROM request where fundrequest='not' and phoneno!='' GROUP BY uploadby ) order by id desc ");
     
 
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result( $id,$name, $email, $vehicleno,$due,$time,$sname,$fr); 
 if($itemcount!=null)
  $count=$from;
 //$products = array(); 
 //traversing through all the result 

 
 //displaying the result in json format 
// echo json_encode($products);
 
?>

       
        <div class="col-sm-12">
            <table class="table">
			<tr>
		
			<th>Name</th>
			<th>Date</th>
			<th>State</th>
			<th>Sitename</th>
			</tr>
		<?php	while($stmt->fetch()){
     $x=$due." ".$time;
 $temp = array();
 $temp['name'] = $name; 
 $temp['phno'] = $email; 
 $temp['bokdate'] = $vehicleno; 
 $temp['af'] = $x;
 $temp['sname']=$sname;
 $temp['fr']=$fr;
 //array_push($products, $temp);
 if($itemcount!=null)
  $count=$count+1;?>
<tr>
<td><a href="lastactivedetails.php?name=<?php echo $name; ?>&date=<?php echo $due; ?>">
    
<?php echo $name;?></a></td>
<td><?php echo $x;?></td>
<td><?php echo $vehicleno;?></td>
<td><?php echo $sname;?></td>

</tr>
<?php
 }
?>
			</table> 
        </div>
     </div>
           

            


           
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
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