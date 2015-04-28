<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<?php
	function sumDigits($str){
		if(ctype_digit($str)){
			$arr = str_split($str);
			$sum = array_sum($arr);
			return $sum;
		} else {
			return "I cannot sum that";
		}
	}
?>
<!-- 
Write a PHP script SumOfDigits.php which receives a comma-separated list of integers 
from an input form and creates a two-column table. 
The first column should contain each of the values from the input. 
The second column should contain the sum of the digits of each value. 
If the value is not an integer number, print "I cannot sum that". 
Styling the page is optional. 
 -->
<!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Sum of Digits</title>
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
 	<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 		<label for="input">Input string: </label>
 		<input type="text" id="input" name="input">
 		<input type="submit" name="submit" value="Submit">
 	</form>
<?php
if(isset($_GET['submit'])) :
	if(strlen($_GET['input'])>0) :
	$inputArr = explode(", ", $_GET['input']);
?>
	<table>
<?php
	foreach ($inputArr as $value) {
?>
		<tr>
			<td><?= $value; ?></td>
			<td><?= sumDigits($value); ?></td>
		</tr>
<?php
	}
	endif; //if(strlen($_GET['input'])>0) :
?>
	</table>
<?php
endif; //if(isset($_GET['submit'])) :
?>
 </body>
 </html>