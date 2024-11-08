<?php
require_once("connection.php");
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=marks_report_printexcel".date('d-m-Y').".xls");

header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header("Content-Disposition: attachment; filename=Products-downloal".date('d-m-Y').".xls");

header('Cache-Control: max-age=0');
//$objWriter->save('php://output');


//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";
echo"<table width='100%' border='1'><tr><th >S NO</th><th width='10%' >Product</th><th width='15%'>Qty</th>";
 
						 
						//$val4=$_POST['loct'];
				         // $val6=$_POST['att_date'];
							//$val5=date('Y-m-d',strtotime($val6));
							//$val8=$_POST['att_date1'];
							//$val7=date('Y-m-d',strtotime($val8));
						// $strSQL2 = "SELECT DISTINCT date2 FROM  attendence where loc='$val4'  and date2 between '$val5' and '$val7' ";

 $strSQL2 = "select * from masterproducts order by id desc";

                            //  $cnt = mysql_num_rows($strSQL2);
							 $res=mysqli_query($link,$strSQL2) ;
							 
	while($r=mysqli_fetch_array($res)){
	
								
							
							  // $fath=$row['fname'];
?><tr><td><?php echo $r['sno'];?></td><td><?php echo $r['product'];?></td><td><?php echo $r['qty'];?></td></tr>
<?php }?>
					   
					     </table>

