<?php
session_start();
  $conn = mysqli_connect("conceptgrammarschool.com", "a16673ai_payamath", "Payamath@2016", "a16673ai_osps") or die("unable to connect to database");
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 $statei="TS";
 $itemcount="30";
 $pagenumber="1";
 $counti=1;
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>
 <div class="wrapper">
        <!-- Sidebar  -->
        <?php include('sidemenu.php'); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include('hmenu.php'); ?>

            <div class="row">
                
			<?php
			while($stmt->fetch()){?>
			<style>
			.mySlides<?php echo $counti;?> {display: none}</style>
			<div class="col-sm-4">
        <div class="slideshow-container">

<div class="mySlides<?php echo $counti;?>">
  <div class="numbertext">1 / 3</div>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo1<?php echo $iid ?>.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides<?php echo $counti;?>">
  <div class="numbertext">2 / 3</div>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo2<?php echo $iid ?>" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides<?php echo $counti;?>">
  <div class="numbertext">3 / 3</div>
  <img src="http://conceptgrammarschool.com/osps/uploads/photo3<?php echo $iid ?>" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div>
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
        
			<?php $counti++; }?>
        </div>
        </div>
    </div>
<script>
var slideIndex = 1;
showSlides(slideIndex,"mySlides<?php echo $counti;?>");

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n,iu) {
  var i;
  var slides = document.getElementsByClassName(iu);
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
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