<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<?php 
	function checkPrime($num){
	    if($num == 1)
	        return false;
	    if($num == 2)
	        return true;
	    if($num % 2 == 0) {
	        return false;
	    }
	    for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
	        if($num % $i == 0)
	            return false;
	    }
	    return true;
	}
?>
<!-- 
Write a PHP script PrimesInRange.php that receives two numbers – start and end – 
from an input field and displays all numbers in that range as a comma-separated list. 
Prime numbers should be bolded. 
Styling the page is optional. 
 -->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Primes in range</title>
	<style>
	</style>
</head>
<body>
	<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="start">Starting index: </label>
		<input type="text" id="start" name="start" value="<?php if(isset($_GET['start'])) {echo $_GET['start'];} ?>">
		<label for="end">End: </label>
		<input type="text" id="end" name="end" value="<?php if(isset($_GET['end'])) {echo $_GET['end'];} ?>">
		<input type="submit" name="submit" value="submit">
	</form>
<?php
if(isset($_GET['submit'])) :
	$regex = "/^\d+$/"; //regex for numbers
	if(preg_match_all($regex, $_GET['start']) && preg_match_all($regex, $_GET['end'])) :
		$index = $_GET['start'];
		$end = $_GET['end'];
		if($index < $end) :
?><p><?php
			while($index < $end) :
				if(checkPrime($index)) :
?><strong><?=  $index; ?></strong><?php
				else : //if(checkPrime($index)) :
				echo $index;
				endif; //if(checkPrime($index)) :
				if($index < $end - 1){
					echo ", ";
				}
				$index ++;
			endwhile; //while($index < $end) :
?></p><?php
		else : //if($index >= $end) :
?>
	<p>The starting number should be lower than the ending number</p>
<?php
		endif; //if($index >= $end) :
?>
<?php
	else : //if(preg_match_all($regex, $_GET['start']) && preg_match_all($regex, $_GET['start'])) :
?>
	<p>Please enter two integers in the spaces provided.</p>
<?php
	endif; //if(preg_match_all($regex, $_GET['start']) && preg_match_all($regex, $_GET['start'])) :
endif; //if(isset($_GET['submit'])) :
?>
</body>
</html>