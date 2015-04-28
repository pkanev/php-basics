<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
You are a very rich billionaire with an unhidden passion for cars. 
You like certain car manufacturers but you don’t really care about anything else, 
and that’s why you need your own randomizing algorithm that helps you decide how many 
and what color cars you should buy. 
Write a PHP script CarRandomizer.php that receives a string of cars 
from an input HTML form, separated by a comma and space (“, “). 
It then prints each car, a random color and a random quantity 
in a table like the one shown below. 
Use colors by your choice. Use as quantity a random number in range [1...5]. 
 -->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Car Randomizer</title>
	<style>
		table, th, td {
			border: 1px solid #000;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
		}
	</style>
</head>
<body>
<?php
	function randomizeColor(){
		$colors = array("red", "blue", "yellow", "black", "black", "green", "grey", "orange", "brown", "white");
		$rNum = rand(0, count($colors)-1);
		return $colors[$rNum];
	}
?>
	<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="cars">Enter cars</label><input type="text" id="cars" name="cars">
		<input type="submit" name="submit" value="Show result">
	</form>
<?php
if (isset($_GET['submit'])) :
	if(strlen($_GET['cars'])>0) :
		$cars = explode(", ", $_GET['cars']);	
?>
	<table>
		<tr>
			<th>Car</th>
			<th>Color</th>
			<th>Count</th>
		</tr>
<?php
foreach ($cars as $value) :
?>
		<tr>
			<td><?= $value ?></td>
			<td><?= rand(1, 5) ?></td>
			<td><?= randomizeColor() ?></td>
		</tr>
<?php
endforeach;
?>
	</table>
<?php
endif;
endif;
?>
</body>
</html>