<?php 
$x=$_GET['x'];
$y=$_GET['y'];
  error_reporting(E_ALL);
ini_set('display_errors', 1);
require "Geocoding.php";
use myPHPnotes\Geocoding;
$geo=new Geocoding("AIzaSyB2SYwTIY8VtfkR65iyqw8KI7SG4jPA_HM");

$address=$geo->getAddress($x,$y);
echo ":" .$x;
?>