<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<?php
	function sum($num = 0) {
		static $sum = 0;
		$sum += $num;
		return $sum;
	}
?>
<!--
Write a PHP script C that displays a table in your browser with 2 columns.
The first column should contain a number (even numbers from 0 to 100) and
the second column should contain the square root of that number,
rounded to the second digit after the decimal point.
The last row of the table should contain the sum of all values in the Square column.
Styling the page is optional.
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Square Root Sum</title>
	<style>
		table, tr, td, th{
			border: 1px solid #000;
		}
		td.total{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Number</th>
			<th>Square</th>
		</tr>
<?php
	$count = 0;
	while ($count <= 100):
?>
	<tr>
		<td><?= $count; ?></td>
		<?php 
			$square = round(sqrt($count),2);
			sum($square);
		?>
		<td><?= $square ?></td>
	</tr>
<?php
    $count +=2;
	endwhile;

?>
	<tr>
		<td class="total">Total:</td>
		<td><?php echo sum(); ?></td>
	</tr>
	</table>
</body>
</html>