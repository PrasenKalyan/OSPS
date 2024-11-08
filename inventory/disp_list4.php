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

#customers2 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers2 td, #customers2 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}

#customers2 tr:hover {background-color: #ddd;}

#customers2 th {
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
								<div class="box-header with-border"><form name="frm" method="post">
								  <h3 class="box-title">  R/RL No:<input type="text" name="rno" class="form-control" required>
								  <input type="submit" style="cursor: pointer;" name="subm">
								  </h3>
								</div>
                               </form>
                                <?php
if(isset($_POST['subm'])){
    
    // $conn = mysqli_connect("localhost", "a16673ai_payamath", "Payamath@2016", "a16673ai_ospsbilling");
    $conn = mysqli_connect("localhost", "root", "", "a16673ai_osps");

 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $id=$_POST['rno'];

 //creating a query

  $stmt = mysqli_query($conn,"SELECT indus_id,req_ref, site_name,district,state,ptw,seeking_opt FROM 
 aprefferences where indus_id='$id' or req_ref='$id'");
 //executing the query 
 //$stmt->execute();
 
 //binding results to the query 
// $stmt->bind_result($indusid,$refno, $sname,$dis,$state,$ptw,$sopt);
$r2=mysqli_fetch_array($stmt);
 
?>
		  <form name="frm" method="post" action="disp_suc.php">
								      
								      <table id="customers" style="width:100%; border:1px solid;">
								          <input type="hidden" name="upby" id="upby" value="<?php echo $uname;?>">
								          <tr><td>DC No: <input type="text" name="dcno" id="dcno"></td><td>Reciever Name: <input type="text" name="issuername" id="issuername"></td></tr>
								          <tr>
								      <td><b>Indus ID:</b><input type="hidden" name="indid" value="<?php echo $r2['indus_id'];?>"><?php echo $r2['indus_id'];?></td>
								         <td><b>Ref No:</b><input type="hidden" name="refno" value="<?php echo $r2['req_ref'];?>"><?php echo $r2['req_ref'];?></td>
								          <td><b>Site Name:</b><input type="hidden" name="sitename" value="<?php echo $r2['site_name'];?>"><?php echo $r2['site_name'];?></td>
								           <td><b>District:</b><input type="hidden" name="district" value="<?php echo $r2['district'];?>"><?php echo $r2['district'];?></td>
								            <td><b>State:</b></b><input type="hidden" name="sitestate" value="<?php echo $r2['state'];?>"><?php echo $r2['state'];?></td>
								            <td><b>Ptw:</b><input type="hidden" name="ptw" value="<?php echo $r2['ptw'];?>"><?php echo $r2['ptw'];?></td>
								            <td><b>Seeking_opt:</b><input type="hidden" name="seeking_opt" value="<?php echo $r2['seeking_opt'];?>"><?php echo $r2['seeking_opt'];?></td>
								            </tr></table>
								            </br>
								            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for products..">
								            </br>
                                    <table id="customers2" style="width:100%; border:1px solid;"><tr>
                                    <tr><th>
                                        
                                        Product Name
                                    </th>   
                                    <th>Unit Name</th>
                                       <th>Qnty</th>
                             
                                    </tr>
                                    
                  <?php

                 
                                     
$id=$_POST['rno'];
    $a="select * from masterproducts ";
$sq=mysqli_query($link,$a);
 $cnt=mysqli_num_rows($sq);
 ?>
 <input type="hidden" name="cntk" value="<?php echo $cnt;?>">
<?php while($r=mysqli_fetch_array($sq)){
    ?>
    <tr><td align="center"><?php echo $r['product'];?></td>
    <td align="center"><?php echo $r['unit'];?></td>
  
    <td align="center">
        <input type="text" name="qty[]" value="">
        <input type="hidden" name="unit[]" value="<?php echo $r['unit'];?>">
        <input type="text" name="prd[]" value="<?php echo $r['product'];?>">
          <input type="hidden" name="id[]" value="<?php echo $r['id'];?>">
           <input type="hidden" name="sno[]" value="<?php echo $id;?>">
   </td>
   
    </tr>

    
    <?php 
}
?>

        
                                           
                                 <!-- <tr><td colspan="2"></td> <td><input type="submit" name="sub" value="Save"></td> </tr>-->
                               </table>
                               <table style="width:100%;">
                               <tr><td><a href="disp_list.php">Back To Products Page</a></td>
                               
                              
                               
                               
                                   
                               <td></td>
                               <td align="left">
                               
                                      <input type="hidden" name="sno" value="<?php echo $id;?>">  
                                       <input type="submit" style="cursor: pointer;" name="sub" value="Save">
                                   
                                  
                               
                                   
                                  </td>
                                  
                               </tr></table>
					</div>				
					</form>
                        <?php }?>
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

    <?php //include('template/footer.php'); ?>

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

</script>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers2");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<!-- inline scripts related to this page -->
</body>
</html>