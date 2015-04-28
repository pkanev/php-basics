<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<?php
	function modify($str, $mod){
	 		switch ($mod) {
	 			case 'palindrome':
	 				$result = checkPalindrome($str);
	 				break;
	 			case 'reverse':
	 				$result = strrev($str);
	 				break;
				case 'split':
	 				$result = uSplit($str);
	 				break;
				case 'hash':
	 				$result = crypt($str, '$2a$07$usesomesillystringforsalt$');
	 				break;
				case 'shuffle':
					$result = str_shuffle($str);
	 				break;
	 			default:
	 				$result = "something bad happened";
	 				break;
	 		}
	 		return $result;
 		}
	function checkPalindrome($str1) {
		$str2 = strrev($str1);
		if($str1 == $str2) {
			$message = "$str1 is a palindrome!";
		} else {
			$message = "$str1 is not a palindrome!";
		}
		return $message;
	}
	function uSplit($str) {
		$arr = str_split($str);
		$result = '';
		foreach ($arr as $value) {
			$result .= $value . " ";
		}
		return $result;
	}
?>
<!-- 
Write a PHP script StringModifier.php which receives a string from an input form 
and modifies it according to the selected option (radio button). 
You should support the following operations: palindrome check, reverse string, 
split to extract leters only, hash the string with the default PHP hashing algorithm, 
shuffle the string characters randomly. 
The result should be displayed right under the input field. Styling the page is optional. 
Think about which of the modification can be achieved with already built-in functions in PHP. 
Where necessary, write your own algorithms to modify the given string. 
Hint: Use the crypt() function for the "Hash String" modification. 
 -->
 <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>String Modifier</title>
 </head>
 <body>
 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 		<input type="text" name="input" value="<?php if(isset($_POST['input'])){echo $_POST['input'];}?>">
 		<input type="radio" id="palindrome" name="modification" value="palindrome">
 		<label for="palindrome">Check Palindrome</label>
 		<input type="radio" id="reverse" name="modification" value="reverse">
 		<label for="reverse">Reverse String</label>
 		<input type="radio" id="split" name="modification" value="split">
 		<label for="split">Split</label>
 		<input type="radio" id="hash" name="modification" value="hash">
 		<label for="hash">Hash String</label>
 		<input type="radio" id="shuffle" name="modification" value="shuffle">
 		<label for="shuffle">Shuffle String</label>
 		<input type="submit" name="submit" value="Submit">
 	</form>
 <?php
 	if((isset($_POST['submit'])) && (strlen($_POST['input']) > 0) && (array_key_exists('modification', $_POST))) :
 		$result = modify($_POST['input'], $_POST['modification']);
 ?>
 		<p><?= $result; ?></p>
 <?php
	endif;
 ?>
 </body>
 </html>