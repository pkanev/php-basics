<html>
<head>
	<meta charset="UTF-8">
	<title>Dump variable</title>
</head>
<body>
<?php
/*
Write a PHP script DumpVariable.php that declares a variable. 
If the variable is numeric, print it by the built-in function var_dump(). 
If the variable is not numeric, print its type at the input. 
*/
function checkVariable($x) {
	if(is_numeric($x)) {
		var_dump($x);
	} else {
		echo gettype($x);
	}
}
?>
<p><?php
$var = "hello";
checkVariable($var);
?></p>
<p><?php
$var = 15;
checkVariable($var);
?></p>
<p><?php
$var = 1.234;
checkVariable($var);
?></p>
<p><?php
$var = array(1,2,3);
checkVariable($var);
?></p>
<p><?php
$var = (object)[2,34];
checkVariable($var);
?></p>
</body>
</html>