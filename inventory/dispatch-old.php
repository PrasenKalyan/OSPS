<?php //include('config.php');
session_start();
include('connection.php');
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php';
//include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
      <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
       
        h1{
        color:blue;
        }
        
    </style>
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
   
  
                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                           <h1 align="center">
                          <img src="logo.jpg" class="img-responsive">

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">  Warehouse</h3>
								</div>
                               
                               
								  
                                    <table style="width:100%;"><tr>
                                        
                                        <td align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td> <a href="disp_list.php">Dispatch From Warehouse</a></td></tr></table>
                                          
                                           </td>
                                           <td>&nbsp;</td>
                                            <td  align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td><a href="disp_list2.php"> Add to Warehouse</td></tr></table>
                                          
                                           </td>
                                           
                                  
                                    </tr></table>
                                     <table style="width:100%;"><tr>
                                        
                                        <td align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td> <a href="list.php">Stock Report</a></td></tr></table>
                                          
                                           </td>
                                           <td>&nbsp;</td>
                                            <td  align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td><a href="add_prd.php"> Add New Product</td></tr></table>
                                          
                                           </td>
                                           
                                  
                                    </tr></table>
                                    <table style="width:100%;"><tr>
                                        
                                        <td align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td> <a href="disp_list4.php">Raise New Request</a></td></tr></table>
                                          
                                           </td>
                                           <td>&nbsp;</td>
                                            <td  align="center" style="width:50%; font-size:20px; height:150px;  border:1px solid;">
                                            <table><tr><td><a href=""> Approve Request</td></tr></table>
                                          
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