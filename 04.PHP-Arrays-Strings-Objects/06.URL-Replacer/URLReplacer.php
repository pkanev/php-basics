<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program URLReplacer.php that takes a text from a textarea 
and replaces all URLs with the HTML syntax <a href= "…" ></a> 
with a special forum-style syntax [URL=…][/URL].
 -->
 <!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>URL Replacer</title>
	<style>
		textarea{
			display: block;
			height: 100px;
			width: 300px;
		}
		p{
			width: 300px;
		}
	</style>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<textarea name="text" cols="30" rows="5"><?php if(isset($_POST['text']) && strlen($_POST['text']) > 0){echo $_POST['text'];}?></textarea>
		<br>
		<input type="submit" name="submit" value="Replace!">
	</form>
<?php
	if(isset($_POST['submit']) && strlen($_POST['text']) > 0) :
		$text = $_POST['text'];
		$pattern ="/<a href=(\")(.+?)(\\1)>/";
		preg_match_all($pattern, $text, $matches, PREG_PATTERN_ORDER);
		for ($i=0; $i < count($matches[0]); $i++) { 
			$text = str_replace($matches[0][$i], "[URL=".$matches[2][$i]."]", $text);
		}
		$text = str_replace("</a>", "[/URL]", $text);
?>
	<p><?= htmlentities($text); ?></p>
<?php
	endif; //(isset($_POST['submit']) && strlen($_POST['text']) > 0)
?>
</body>
</html>