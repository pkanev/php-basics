<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program TextColorer.php that takes a text from a textfield, 
colors each character according to its ASCII value and prints the result. 
If the ASCII value of a character is odd, the character should be printed in blue. 
If it’s even, it should be printed in red.
 -->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>text colorer</title>
	<style>
		.blue{
			color: blue;
		}
		.red{
			color: red;
		}
	</style>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<textarea name="text" id="text" cols="30" rows="3"></textarea>
		<br>
		<input type="submit" name="submit" value="Color text">
	</form>
<?php
	if(isset($_POST['submit'])) {
		$text = $_POST['text'];
		if (strlen($text) > 0) :
			$chars = str_split($text);
			foreach ($chars as $char) :
?>
			<span class="<?= ord($char) % 2 == 1 ? "blue" : "red" ; ?>"><?= "$char "; ?></span>
<?php
			endforeach;
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