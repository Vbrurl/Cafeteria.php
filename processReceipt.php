<!doctype html>
<html lang="en">
<head> 
	<meta charset="utf-8">
	<title> CoffeeLounge Receipt </title>
</head>
<body> 
<?php 
$total=0;
$cashGiven = $_POST['cashGiven'];
$balanceDue = 0;
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('Africa/Nairobi');
$time = time();
$currentDate = date('l, jS F Y', $time);

$currentTime = date('h:i a', $time);

?>

<h2>CoffeeLounge Cafe: </h2>
Date: <?php echo $currentDate?>
<br/>
Time: <?php echo $currentTime?>
<h3>Beverages Selected: </h3>
     <ol>  <?php  
		//check whether selection was made
		if(!empty($_POST['beverages'])){
	 foreach ($_POST['beverages'] as $drink) { 
	 if($drink==='coffee'){
		$total+=40;
		echo "<li>$drink Kshs 40</li>"; 
	 }else if($drink==='tea')
	 {
		echo "<li>$drink Kshs 30</li>";
		$total+=30;
     }else if($drink==='milk')
	 {
        echo "<li>$drink Kshs 60</li>";
		$total+=60;
     }else if($drink==='porrigde'){
        echo "<li>$drink Kshs 50</li>"; 
		$total+=50;
	 }
	 }
		}else{
			echo 'No beverages selected';
		}
	 ?> </ol>
<h3>Snacks selected: </h3>  
     <ol>  
	 <?php 
		if(!empty($_POST['snacks'])){
	 foreach ($_POST['snacks'] as $t) {
     if($t==='blackforest'){
        $total+=150;		 
	    echo "<li>$t kshs 150</li>";
     }else if($t==='lemoncake'){
		 $total+=100;
        echo "<li>$t Kshs 100</li>"; 
     }else if($t==='carrotcake'){
		 $total+=120;
        echo "<li>$t Kshs 120</li>"; 		 
	 }
	 }
		}else{
			echo 'No Snacks selected';
		}
	?> </ol>
	 <br/>
<h3>Main Meals Selected: </h3>
     <ol>  
	 <?php    
     if(!empty($_POST['mainmeals']))
	 {	 
	 foreach ($_POST['mainmeals'] as $meals) { 
	 if($meals==='chickenburger'){
		$total+=320;
		echo "<li>$meals Kshs 320</li>"; 
	 }else if($meals==='periperichips')
	 {
		echo "<li>$meals Kshs 180</li>";
		$total+=180;
     }else if($meals==='liverrice')
	 {
        echo "<li>$meals Kshs 380</li>";
		$total+=380;
     }else if($meals==='steakroll'){
        echo "<li>$meals Kshs 400</li>"; 
		$total+=400;
	 } 
	 }
	 }else{
		 echo 'No MainMeals selected';
	 }
	 ?> 
	 </ol>	 
	 
Total Cost: <?php echo $total;
			//calculate change due
			$balanceDue=$cashGiven-$total;
			echo '<br/>';
			echo 'Cash Received is: Kshs.'.$cashGiven;
			echo '<br/>';
			echo 'Balance is Kshs.'.$balanceDue;
			//reset total to zero
			$total=0;
			?>
</body>
</html>