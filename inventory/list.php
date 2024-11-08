<?php include("head.php");?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
</script>
<?php include("header.php");?>

</head>
<title>Osps Billing</title>
<body>
   
<div class="">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="margin-left:20px; width:10%">S.no</th>
									<th class="cell100 column1" style="width:70%">Product</th>
									<th class="cell100 column3" style="width:20%">Qty</th>
									
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php include("connection.php");
$sq=mysqli_query($link,"select * from masterproducts order by id asc");
while($r=mysqli_fetch_array($sq)){

?>
								<tr class="row100 body">
									<td class="cell100 column1" style="margin-left:20px; width:10%"><?php echo $r['sno'];?></td>
									<td class="cell100 column1"  style="width:70%"><?php echo $r['product'];?></td>
									<td class="cell100 column3"  style="width:20%"><?php echo $r['qty'];?></td>
									
								</tr>
<?php }?>

								
							</tbody>
						</table>
						
						
						
					</div>
					<table>
						<tr>
          <td height="100" colspan="3" align="center">
		 
		  <input type="button" value="Close" id="cls" class="btn btn-danger" onclick="javascript:location.href='add_prd.php'"/></td><td>
		   <input type="button" value="Print" id="prnt" class="btn btn-primary" onclick="prnt();"/> </td><td>
		   <a href="report_printexcel.php"><input type="button" value="DownloadXL" id="" class="btn btn-primary" /> </a>
		  </td>
      </tr></table>
				</div>	</div>	</div>



</body>
</html>



<!--
<table border="1"><tr><th>S.no</th><th>Product</th><th>Qty</th></tr>
 
<tr><td><?php echo $r['sno'];?></td><td><?php echo $r['product'];?></td><td><?php echo $r['qty'];?></td></tr>
<?php //}?>


      
</table>
-->
