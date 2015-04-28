<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP script AnnualExpenses.php that receives n years from an input HTML form 
and creates a table (like the one shown below) with random expenses by months 
and the corresponding years (n years back). 
For example, if N is 10, create a table that shows the expenses 
for each month for the last 10 years. 
Add a "Total" column at the end, showing the total expenses for the same year. 
The random expenses in the table should be in the range [0…999]. 
Styling the page is optional. 
 -->
 <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Annual expenses</title>
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
 		<label for="years">Enter number of years: </label>
 		<input type="text" id="years" name="years">
 		<input type="submit" name="submit" value="Show costs">
 	</form>
 	<br>
 <?php
if(isset($_GET['submit'])) :
	$regex = "/^\d+$/"; //regex for numbers
	$currentYear = date("Y");
	if(strlen($_GET['years']) > 0 && preg_match_all($regex, $_GET['years'])) :
		$years = $_GET['years'];
?>
	<table>
		<tr>
			<th>Year</th>
			<th>January</th>
			<th>February</th>
			<th>March</th>
			<th>April</th>
			<th>May</th>
			<th>June</th>
			<th>July</th>
			<th>August</th>
			<th>September</th>
			<th>October</th>
			<th>November</th>
			<th>December</th>
			<th>Total:</th>
		</tr>
<?php
	for ($i=0; $i<$years ; $i++) :
	$cost = 0; 
?>
		<tr>
			<td><?= $currentYear - $i; ?></td>
<?php
	for ($month=0; $month < 12; $month++) : 
?>
			<td>
<?php
	$r = rand(0, 999);
	$cost+= $r;
	echo $r;
?>
			</td>
<?php
	endfor; //for ($month=0; $month < 12; $month++)
?>
			<td><?= $cost; ?></td>
		</tr>
<?php
	endfor; //for ($i=$years; $i>=0 ; $i--)
?>
	</table>
<?php
		else : //if(strlen($_GET['years']) > 0 && preg_match_all($regex, $_GET['years']))
?>
	<p>Please enter a digit that equals to the number of years</p>
<?php
		endif; //if(strlen($_GET['years']) > 0 && preg_match_all($regex, $_GET['years']))
endif; //if(isset($_GET['submit']))
 ?>
 </body>
 </html>