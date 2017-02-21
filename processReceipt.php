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
/* create only one class since the various items 
share properties
*/
	class cafeMeals{
		//properties
		public $price;
		public $description;
	}
	//object tea
	$tea = new cafeMeals;
	//set properties
	$tea->price=30;
	$tea->description="Tea: Kshs.30";
	//object coffee
	$coffee = new cafeMeals;
	$coffee->price=40;
	$coffee->description="Coffee: Kshs.40";
	//object milk
	$milk = new cafeMeals;
	$milk->price=60;
	$milk->description="Milk: Kshs.60";
	//object espresso
	$espresso = new cafeMeals;
	$espresso->price=50;
	$espresso->description="Espresso Mug: Kshs.90";
		//object blackforest
	$blackforest = new cafeMeals;
	$blackforest->price=150;
	$blackforest->description="Blackforest: Kshs.150";
		//object lemoncake
	$lemoncake = new cafeMeals;
	$lemoncake->price=100;
	$lemoncake->description="Lemon cake: Kshs.100";
		//object carrotcake
	$carrotcake = new cafeMeals;
	$carrotcake->price=120;
	$carrotcake->description="Carrot Cake: Kshs.120";
			//object chickenburger
	$chickenburger = new cafeMeals;
	$chickenburger->price=320;
	$chickenburger->description="Chicken Burger: Kshs.320";
			//object periperichips
	$periperichips = new cafeMeals;
	$periperichips->price=180;
	$periperichips->description="Periperi chips: Kshs.180";
			//object liverrice
	$liverrice = new cafeMeals;
	$liverrice->price=380;
	$liverrice->description="Liver Rice: Kshs.380";
			//object steakroll
	$steakroll = new cafeMeals;
	$steakroll->price=400;
	$steakroll->description="Steakroll: Kshs.400";
	
	/* function to print selected item 
	and update the total variable
	*/
	function printDetails($menuItem)
	{
		global $total;
		$total+=$menuItem->price;
		echo "<li> $menuItem->description </li>";
	}
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
		printDetails($coffee);
	 }else if($drink==='tea')
	 {
		printDetails($tea);
     }else if($drink==='milk')
	 {
		printDetails($milk);
     }else if($drink==='espresso'){
		printDetails($espresso);
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
		printDetails($blackforest);
     }else if($t==='lemoncake'){
		printDetails($lemoncake);
     }else if($t==='carrotcake'){
		printDetails($carrotcake);	
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
		printDetails($chickenburger);
	 }else if($meals==='periperichips')
	 {
		printDetails($periperichips);
     }else if($meals==='liverrice')
	 {
		printDetails($liverrice);
     }else if($meals==='steakroll'){
		printDetails($steakroll);
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