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
 $fdate=$_GET["fdate"];
 $tdate=$_GET["tdate"];
 $start_date = strtotime($fdate); 
$end_date = strtotime($tdate);
   $diff=($end_date - $start_date)/60/60/24;
$diff1=$diff+1;
$i=0;

  
 //traversing through all the result 
 
 
?>
        <div class="col-sm-12">
            <table class="table">
			<tr>
		
			<th>Date</th>
			<th>Status</th>
			
			</tr>
		<?php	
     while($diff1!=0){
     $temp = array();
$sdate = date('Y-m-d', strtotime($fdate . " +$i days"));
 $select = "select  * from attendance where phoneno='$phoneno' and date='$sdate' ";
    $result = mysqli_query($conn,$select) or die("errror in select");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 0)
    {
//echo $sdate;
 //echo a;
 $present='A';
 
    }
    else
    {
         if($row['type']!='late')
$present = 'P'; 
else
       $present = 'P(L-'.$row['time'].')'; 

 
    }
 
 $diff1--;
 $i=$i+1;

 
 
 //displaying the result in json format 
 ?>
<tr>

<td><?php echo $sdate;?></td>
<td><?php echo $present;?></td>

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