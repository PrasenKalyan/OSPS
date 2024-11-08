<script type="text/javascript">
var myJavascriptVar='123';
    document.cookie = myJavascriptVar;
</script>

<?php 
   $phpVar =  $_COOKIE['myJavascriptVar'];

   echo $phpVar;
?>