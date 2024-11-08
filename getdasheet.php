<form method="post" action="updateremarks.php">
<?php
     $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
     date_default_timezone_set('Asia/Kolkata');
 $fdate=$_GET['fdate'];
 $phoneno=$_GET['name'];
 $tdate=$_GET['tdate'];
 
 $start_date = strtotime($fdate); 
$end_date = strtotime($tdate);
   $diff=($end_date - $start_date)/60/60/24;
$diff1=$diff+1;
$i=0;
?>

<table style="width:100%">
<tr>
    <th >No</th>
    <th >Date</th>
     <th >Time</th>
     <th >Sitename</th>
    <th>View Entry</th>
    <th>Deposits</th>
    <th >Claim</th>
    <th >Remarks</th>
</tr>
<input type="hidden" name="uname" value="<?php echo $phoneno; ?>"/>
<input type="hidden" name="fdate" value="<?php echo $fdate; ?>"/>
<input type="hidden" name="tdate" value="<?php echo $tdate; ?>"/>

<?php
 $products = array(); 
 //traversing through all the result 
 $i=0;
 $snoc=1;
 while($diff1!=0){
     $temp = array();
$sdate = date('Y-m-d', strtotime($fdate . " +$i days"));
 $select = "select  remarks,claim,deposits,sname,time,loc from request where claim !='' and uploadby='$phoneno' and datecheck='$sdate' order by id desc";
    $result = mysqli_query($conn,$select) or die("errror in select");
    $row=mysqli_fetch_assoc($result);
    $select1 = "select  time  from request where uploadby='$phoneno' and datecheck='$sdate' ";
    $result1 = mysqli_query($conn,$select1) or die("errror in select");
    $row1=mysqli_fetch_assoc($result1);
    if(strtotime($row1['time'])<strtotime('12:00pm'))
    $counterof=1;
    else
    $counterof=0;
     if(mysqli_num_rows($result) == 0)
    {
//echo $sdate;
 //echo a;
 
$remarks = "-";
$claim = "-";
 $temp['date']=$sdate;
  ?>
 <tr>
           
           <td ><?php echo $snoc ?></td>
           <td  ><input type="text" readonly name="date[]" value="<?php echo $sdate ?>"/></td>
           <td  ><?php echo $stime ?></td>
           <td ><input type="text" readonly name="sname[]" value="<?php echo $row['sname'] ?>"/></td>
             <td  ><a  onclick="window.open('sidebar/lastactivedetails.php?name=<?php echo $phoneno ?>&date=<?php echo $sdate ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" class="btn btn-primary btn-xs">View</a></a></td>
             <td ><input type="text" readonly name="deposits[]" value="<?php echo $row['deposits'] ?>"/></td>
           <td  ><input type="text" name="claims[]" value="<?php echo $claim; ?>"/></td>
           <td ><input type="text" name="remarks[]" value="<?php echo $remarks ?>"/></td>
       </tr>
       
       <?php
       if ($counterof==0){?>
       <tr><p style='color:red'>Warn : Late entry!</p></tr>
    <?php 
           
       }
    }
    else{
        $remarks = $row['remarks'];
       $claim = $row['claim'];
       $stime=$row['time'];
 $temp['date']=$sdate;
 ?>
 
 <tr>
           
           <td><?php echo $snoc ?></td>
           <td><input type="text" readonly name="date[]" value="<?php echo $sdate?>"/></td>
           <td  ><?php echo $stime ?></td>
           <td><textarea readonly rows="4" cols="30"  name="sname[]" ><?php echo "Site Name: ".$row['sname']." Loc : ".$row['loc'] ?></textarea></td>
             <td><a  onclick="window.open('sidebar/lastactivedetails.php?name=<?php echo $phoneno ?>&date=<?php echo $sdate ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" class="btn btn-primary btn-xs">View</a></a></td>
             <td><input type="text" readonly name="deposits[]" value="<?php echo $row['deposits'] ?>"/></td>
           <td><input type="text" name="claims[]" value="<?php echo $claim; ?>"/></td>
           <td><input type="text" name="remarks[]" value="<?php echo $remarks ?>"/></td>
       </tr>
       <?php
       if ($counterof==0){?>
       <tr><td colspan="5"><p style='color:red'>Warn:Late entry!</p></td></tr>
       <?php
    }
    }
       ?>
       
       
       
       
       <?php
 $diff1--;
 $i=$i+1;
 $snoc=$snoc+1;
// array_push($products, $temp);
 }
 
 ?>
  <tr><td colspan="3"></td></tr>
 <tr><td colspan="3">Final Amount Approved By Manager</td>
 <td><input type="text" name="famount" id="famount" /></td>
 </tr>
 <tr></tr>
 <tr></tr>
 <tr><td colspan="3">Employee Sign</td>
 <tr><td colspan="5" align="center"><button type="submit" class="btn btn-primary" name="approve">Approve</button></td></tr>
 </tr>
 <?php
echo '</table>';
 //displaying the result in json format 
  json_encode($products);
 
?>
</form>