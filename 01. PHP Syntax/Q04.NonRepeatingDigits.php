<?php
/*
Write a PHP script NonRepeatingDigits.php that declares an integer variable N,
and then finds all 3-digit numbers that are less or equal than N (<= N) 
and consist of unique digits. Print "no" if no such numbers exist. 
*/

function showNonRepeatingDigits($x){
	$index = 102;
	$output = '';
	while ($index <= $x) {
		if ($index >= 1000) {
			break;
		}
		$firstDigit = floor(($index % 1000)/100);
		$secondDigit = floor(($index % 100)/10);
		$thirdDigit = $index % 10;
		if (($firstDigit != $secondDigit) && ($secondDigit != $thirdDigit) && ($firstDigit != $thirdDigit)) {
			$output = $output . $index . ", ";
		}
		$index ++;
	}
	if($x > 101) {
		echo substr($output, 0, -2);
	} else {
		echo 'no';
	}
	echo "<br>";
}

$input = 1234;
echo $input . "<br>";
showNonRepeatingDigits($input);
echo "<br>";
$input = 145;
echo $input . "<br>";
showNonRepeatingDigits($input);
echo "<br>";
$input = 15;
echo $input . "<br>";
showNonRepeatingDigits($input);
echo "<br>";
$input = 247;
echo $input . "<br>";
showNonRepeatingDigits($input);
?>