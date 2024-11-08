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

                     <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Warehouse</h3>
								</div>
                               
                                <form name="frm" method="post" acttion="">
								  
                                    <table id="customers" style="width:100%; border:1px solid;"><tr>
                                    <tr><th>
                                        
                                        Product Name
                                    </th>   
                                    <th>Unit Name</th>
                                       <th>Qnty</th>
                                    <th>View</th>
                                    </tr>
                                    
                                  
                                      <?php


$id=$_GET['id'];
   $a="select * from productsentry where sno='$id' and manager='materials' order by id desc";
$sq=mysqli_query($link,$a);
$cnt=mysqli_num_rows($sq);?>
<input type="hidden" name="cntk" value="<?php echo $cnt;?>">
<?php
while($r=mysqli_fetch_array($sq)){
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
<?php 
if(isset($_POST['sub'])){
   $qty=$_POST['qty']; 
   $id=$_POST['id'];
   $sno=$_POST['sno'];
   $prd=$_POST['prd'];
    
    $sq=mysqli_query($link,"update productsentry set qty='$qty' where id='$id'" );
    
    $ssq=mysqli_query($link,"select * from masterproducts where product='$prd'");
    $rr1=mysqli_fetch_array($ssq);
    $av_qty=$rr1['qty'];
    $tot=$av_qty+$qty;
    $sq=mysqli_query($link,"update masterproducts set qty='$tot' where product='$prd'");
    
    if($sq){
         print "<script>";
			print "alert('Quentity Successfully Updated');";
			print "self.location='disp_list2.php?id=$sno';";
			print "</script>";
    }
}
?>

                                        
                               
                                     
                                         
                                          
                                         
                                           
                                  
                               </table><table style="width:100%;">
                               <tr><td><a href="disp_list2.php">Back To Products Page</a></td>
                                  
                               <td><textarea name="comment"></textarea></td>
                               <td align="center">
                               
                                      <input type="hidden" name="sno" value="<?php echo $id;?>">  
                                       <input type="submit" name="sub1" value="Add to Warehouse">
                                   </form>
                                   
                            <?php 
if(isset($_POST['sub1'])){
 $cntk=$_POST['cntk'];
for($i=0;$i<$cntk;$i++){
    
    $qty=$_POST['qty'][$i]; 
   $id=$_POST['id'][$i];
   $sno=$_POST['sno'][$i];
  $prd=$_POST['prd'][$i];
    
    $sqnew1=mysqli_query($link,"update productsentry set qty='$qty' where id='$id'" );
    $ssq=mysqli_query($link,"select * from masterproducts where product='$prd'");
    $rr1=mysqli_fetch_array($ssq);
    $av_qty=$rr1['qty'];
    $tot=$av_qty+$qty;
    $sqnew=mysqli_query($link,"update masterproducts set qty='$tot' where product='$prd'");
    
}
    
  $comment=$_POST['comment'];
   $sno=$_POST['sno'];
    
    $sq=mysqli_query($link,"update productsentry set manager='addedtowearhouse',wherehouse_comment='$comment' where sno='$sno'" );
    if($sq){
         print "<script>";
			print "alert('Successfully Added to wearhouse Updated');";
			print "self.location='dispatch.php';";
			print "</script>";
    }
}
?>       
                                   
                                  </td>
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