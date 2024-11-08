<?php
session_start();
  $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $statei=$_GET['state'];
 $itemcount="30";
 $pagenumber=$_GET['page'];
 $from=$pagenumber*$itemcount-($itemcount-1);
 $to=$itemcount;
 if($from=='1')
 {
 $from=0;
 $to=$to;
 }
 if($statei=='IN-issue'||$statei=='in-issue')
 {
     $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM issues  ORDER BY id desc LIMIT $from,$to  ");
 }
 
 else if($statei=='AP'|| $statei=='TS'||$statei=='Telangana')
 {
     $rty="SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where sstate='AP'or sstate='TS' or sstate='Telangana' or sstate='allstates'  ORDER BY id desc LIMIT $from,$to";
  $stmt = $conn->prepare("SELECT id,uploadby,loc,sname,indid,sarea,sstate,com,date,time,chimage1,chimage2,chimage3,chimage4,chpdf,category,phoneno,ptwno,reply,fundrequest  FROM request where sstate='AP'or sstate='TS' or sstate='Telangana' or sstate='allstates'  ORDER BY id desc LIMIT $from,$to");
     
 }
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
 
 //displaying the result in json format 
  json_encode($products);
 
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
        <?php include('sidemenu.php'); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include('hmenu.php'); ?>
<div style="align:center;" >
    <?php echo $statei ?>
</div>
            <div class="row">
                
			<?php
			while($stmt->fetch()){?>
			<div class="col-sm-4">
        <img src="http://assets.barcroftmedia.com.s3-website-eu-west-1.amazonaws.com/assets/images/recent-images-11.jpg" width="100%" height="200" alt="" class="img-responsive" />
        <p style="color:blue;"><?php echo $date." ".$time;?></p>
    </div>
    <div class="col-sm-8">
        <table style="width:100%">
            <tr>
            <p style="color:black;"><b>Name:</b> <?php echo $id; ?></p>
            </tr>
            <tr><p style="color:black;"><b>Location: </b><?php echo $loc; ?></p></tr>
            <tr style="width:100%">
       <th style="width:33%"><p style="color:black;"><b>Indus Id: </b><?php echo $sref; ?></p></th>  
    <th style="width:44%">  <p style="color:black;"><b>Site Area: </b><?php echo $sarea; ?></p></th>
     <th style="widht:23%"><p style="color:black;"><b>Ptw No: </b><?php echo $ptw; ?></p></th>
        
        </tr>
        
        <tr>  
        <td><p style="color:black;"><b>State: </b><?php echo $sstate; ?></p></td>
           <td><p style="color:black;"><b>Site Name: </b><?php echo $sname; ?></p></td>  
      </tr>
        <tr>
           
        </tr>
        
        <!--  <p>Category:<?php echo $category; ?></p>
        <p>Phoneno:<?php echo $phoneno; ?></p>-->
        
          
          
          </table>
           <p style="color:black;"><b>Comments: </b><?php echo $com; ?></p>
    </div>
			    
        <div class="line"></div>
        <?php
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
			?>
        
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
                $(this).toggleClass('active');
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