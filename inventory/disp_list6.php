<?php include("head.php");?>
<html lang="en">
     <style>
	#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
	</style>
   
<?php


$id=$_GET['id'];
$namei=$_GET['name'];
   $a="select * from productsentry where sno='$id' order by id desc";
$sq=mysqli_query($link,$a);
$r=mysqli_fetch_array($sq);
?>
   

                     <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								
								</div>
                               <table style="width:100%;"><tr><td>Inv No:<?php echo $r['uid'];?></td><td>Site Name:<?php echo $r['sitename'];?></td><td>Indus ID:<?php echo $r['indid'];?></td>
                               <td>R.No:<?php echo $r['sno'];?></td><td>Date:<?php $d= $r['data']; echo date('d-m-Y', strtotime($d));?></td>
                               </tr></table>
                               
                               
								  <form name="frm" method="post" action="">
                                    <table id="customers" style="width:100%; border:1px solid;"><tr>
                                    <tr><th>
                                        
                                        Product Name
                                    </th>   
                                    <th>Unit Name</th>
                                       <th>Qnty</th>
                             
                                    </tr>
                                    
                                  
                                      <?php


$id=$_GET['id'];
   $a="select * from productsentry where sno='$id' and uploadby='$namei' and manager='allstates' order by id desc";
$sq=mysqli_query($link,$a);
 $cnt=mysqli_num_rows($sq);
 ?>
 <input type="hidden" name="cntk" value="<?php echo $cnt;?>">
<?php while($r=mysqli_fetch_array($sq)){
    ?>
    <tr><td align="center"><?php echo $r['product'];?></td>
    <td align="center"><?php echo $r['unit'];?></td>
  
    <td align="center">
        <input type="text" name="qty[]" value="<?php echo $r['qty'];?>">
        <input type="hidden" name="prd[]" value="<?php echo $r['product'];?>">
          <input type="hidden" name="id[]" value="<?php echo $r['id'];?>">
           <input type="hidden" name="sno[]" value="<?php echo $id;?>">
   </td>
   
    </tr>

    
    <?php 
}
?>
         
                                 <!-- <tr><td colspan="2"></td> <td><input type="submit" name="sub" value="Save"></td> </tr>-->
                               </table><table style="width:100%;">
                               <tr><td><a href="disp_list.php">Back To Products Page</a></td>
                               
                              
                               
                               
                                   
                               <td><textarea name="comment"></textarea></td>
                               <td align="left">
                               
                                      <input type="hidden" name="sno" value="<?php echo $id;?>">  
                                       <input type="submit" name="sub1" value="Approve Request">
                                   </form>
                                   
                            <?php 
if(isset($_POST['sub1'])){
    
    
     $cntk=$_POST['cntk'];
   

	
for($i=0;$i<$cntk;$i++){
    
      $sql1="UPDATE productsentry SET qty='" . $_POST['qty'][$i] . "' WHERE id='" . $_POST['id'][$i] . "'";
$result1=mysqli_query($link,$sql1);


//      $ssq=mysqli_query($link,"select * from masterproducts where product='" . $_POST['prd'][$i] . "'");
//     $rr1=mysqli_fetch_array($ssq);
//      $av_qty=$rr1['qty'];
//   $tot=$av_qty- $_POST['qty'][$i];
//     $aa="update masterproducts set qty='$tot' where product='" . $_POST['prd'][$i] . "'";
//     $sq=mysqli_query($link,$aa);

}
     
  $comment=$_POST['comment'];
   $sno=$_POST['sno'];
    
    $sq=mysqli_query($link,"update productsentry set manager='approved',manager_comment='$comment' where sno='$sno' and uploadby='$namei' and manager='allstates'" );
    if($sq){
         print "<script>";
			print "alert('Succesfully Updated');";
			print "self.location='dispatch.php';";
			print "</script>";
    }
}
?>       
                                   
                                  </td>
                                  <td><a href="disp_print.php?id=<?php echo $id;?>">Print</a></td>
                               </tr></table>
					</div>				
					
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {
                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
<?php 

//}else
//{
//session_destroy();

//session_unset();

//header('Location:index.php?authentication failed');

//}

?>