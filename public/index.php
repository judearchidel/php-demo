<!DOCTYPE html>
<html>
<head>
<style>
    body{background-color: antiquewhite;}
    p{
     font-size: 1.5em;color: brown;font-family: cursive;}
   
</style>
</head>
<body>

<p>practice Section</p>
   <?php
   

   echo " Date is" .date("Y/m/d") ."<br>";
   echo " Date is" .date("Y-m-d") ."<br>";
   //date_default_timezone_set("America/California");
   echo " Time is" .date("h:i:sa") ."<br>";
   
   //$d = mktime(10, 11, 22, 4, 2, 2020);
   //echo "Created date is " . date("Y-m-d h:i:sa", $d);
   
   $d = strtotime("+5 Months");
   echo date("Y-m-d h:i:sa", $d) . "<br>";
   
   $start = strtotime("Saturday");
   $end = strtotime("+10 weeks", $start);
   
   while ($start < $end){
   	echo date("M d", $start), "<br>";
	   $start = strtotime("+1 week", $start);
	
	
   }

   ?>

</body>

</html> 