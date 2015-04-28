<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program WordMapper.php that takes a text from a textarea 
and prints each word and the number of times it occurs in the text. 
The search should be case-insensitive. 
The result should be printed as an HTML table.
 -->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Word mapper</title>
	<style>
		table, td {
			border: 1px solid #000;
			border-collapse: collapse;
			background-color: #DDD;
			padding: 5px;
		}
	</style>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<textarea name="text" id="text" cols="30" rows="3"></textarea>
		<br>
		<input type="submit" name="submit" value="Count words">
	</form>
	<br>
<?php
	if(isset($_POST['submit'])) {
		$text = $_POST['text'];
		if (strlen($text) > 0) :
?>
	<table>
<?php
			$tokens = preg_split("/\W+/", $text, -1, PREG_SPLIT_NO_EMPTY);
			$lowercase = array();
			foreach ($tokens as $token) {
				$lowercase[] = strtolower($token);
			}
			$counted = array_count_values($lowercase);
			foreach ($counted as $key => $value) :
?>
			<tr>
				<td><?= $key; ?></td>
				<td><?= $value; ?></td>
			</tr>
<?php
			endforeach;
?>
	</table>
<?php
		else : //(strlen($text) > 0) :
			$message = "Please enter some text";
		endif; //(strlen($text) > 0) :
	}
	if (isset($message)) :
?>
	<p><?= $message; ?></p>
<?php
	endif; //if (isset($message)) :
?>
</body>
</html>