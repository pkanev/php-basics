<?php
/*
Write a PHP script LazySundays.php which prints the dates of all Sundays in the current month.
*/

$dayAsString = date("Y-m") . "-01"; //first day of the month
$date = new DateTime($dayAsString); //this is a day object
while($date->format("n") < (date("n")+1)) { //checks while the month is still the present month
	if($date->format("w") == 0) {
		// it is a Sunday
		echo $date->format("jS F, Y") . "<br>";
	}
	$date->modify("+1 day");
}
?>