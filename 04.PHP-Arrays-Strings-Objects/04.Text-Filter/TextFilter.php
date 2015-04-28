<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program TextFilter.php that takes a text from a textfield 
and a string of banned words from a text input field. 
All words included in the ban list should be replaced with 
asterisks "*", equal to the word’s length. 
The entries in the banlist will be separated by a comma and space ", ".
 -->
 <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Text filter</title>
 	<style>
 		#text, #ban{
 			display: block;
 			width: 350px;
 		}
 		label, textarea, input{
 			font-size: 26px;
 		}
 		p {
 			width: 350px;
 		}
 	</style>
 </head>
 <body>
 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 		<label for="text">Enter text:</label>
 		<textarea name="text" id="text" cols="30" rows="4"></textarea>
 		<label for="ban">Enter words to be banned:</label>
 		<input type="text" id="ban" name="ban">
 		<input type="submit" name="submit" value="Ban!">
 	</form>
<?php
if(isset($_POST['submit']) && strlen($_POST['text']) > 0 && strlen($_POST['ban']) > 0 ) :
	$banned = preg_split("/, /", $_POST['ban'], -1, PREG_SPLIT_NO_EMPTY);
	$text = $_POST['text'];
	foreach ($banned as $value) {
		$replacement = str_repeat("*", strlen($value));
		$pattern = "/\b$value\b/i";
		$text = preg_replace($pattern, $replacement, $text);
	}
	
?> 
 	<p><?= $text;?></p>
 <?php
endif; //(isset($_POST['submit']) && strlen($_POST['text']) > 0 && strlen($_POST[ban]) > 0 )
 ?>
 </body>
 </html>