<?php include("head.php");?>
<html lang="en">
<head>
  

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
  </head>
  <body>
   

              
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">  Warehouse</h3>
								</div>
                               
                               
								  
                                    <table id="customers" style="width:100%; border:1px solid;">
                                    <thead>
                                    <tr><th>
                                        
                                        S.no
                                    </th>   <th>Site Name</th><th>Indus ID</th>
                                   <th> Date</th>
                                    <th>Uploaded By</th>
                                    <th>View</th>
                                    <th>Print</th>
                                    <a href="export_to_excel2.php" class="btn btn-primary" style="float: right; margin-bottom: 5px; ">Export to Excel</a>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php



  $a="select * from productsentry where manager='approved' group by id";
$sq=mysqli_query($link,$a);
while($r=mysqli_fetch_array($sq)){
    ?>
    <tr><td align="center"><?php echo $r['sno'];?></td>
    <td align="center"><?php echo $r['sitename'];?></td>
    <td align="center"><?php echo $r['indid'];?></td>
    <td align="center"><?php $d= $r['data']; echo date('d-m-Y', strtotime($d));?></td>
    <td align="center"><?php echo $r['uploadby'];?></td>
    <td align="center"><a href="disp_list1.php?id=<?php echo $r['sno'];?>">View</a></td>
    <td align="center"><a href="disp_printpdf2.php?id=<?php echo $r['sno']?>"><img src="../img/pdf.jpg" width="30" height="30"></a></td>
    </tr>
    <?php 
}
?>
</tbody>

    
   
     <script>
$(document).ready(function() {
    $('#customers').DataTable({
      "pageLength": 10 
    });
    
});
</script>                                   
                                                              
                               </table>
					</div>				
					 <tr><td><a href="dispatch.php">Back To Warehouse Page</a></td></tr>
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