<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program SentenceExtractor.php that takes a text from a textarea 
and a word from an input field and prints all sentences from the text, 
containing that word. A sentence is any sequence of words ending with ., ! or ?.
 -->
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sentence Extractor</title>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<textarea name="text" cols="30" rows="3"><?php if(isset($_POST['text']) && strlen($_POST['text']) > 0){echo $_POST['text'];}?></textarea>
		<br>
		<input type="text" name="word" value="<?php 
		if(isset($_POST['word']) && strlen($_POST['word']) > 0){
			echo $_POST['word'];
		}
		?>">
		<br>
		<input type="submit" name="submit" value="Extract!">
	</form>
<?php
	if(isset($_POST['submit']) && strlen($_POST['text']) > 0 && strlen($_POST['word']) > 0) :
		$text = $_POST['text'];
		$word = $_POST['word'];
		$pattern ="/[\w,;\–\’\"\s]+[.?!]/";
		preg_match_all($pattern, $text, $sentences, PREG_PATTERN_ORDER);
		foreach ($sentences[0] as $sentence) :
			//case insensitive is done on purpose
			// to be case sensive, use "/\b$word\b/" instead
			if (preg_match("/\b$word\b/i", $sentence) > 0) :
?>
		<p><?= $sentence; ?></p>
<?php
			endif; //(preg_match("/\b$word\b/", $sentence) > 0)
		endforeach; //($sentences[0] as $sentence)
	endif; //(isset($_POST['submit']) && strlen($_POST['text']) > 0 && strlen($_POST['word']) > 0)
?>
</body>
</html>