<!--
Write a PHP script HTMLTagsCounter.php which generates an HTML form like in the example below. 
It should contain a label, an input text field and a submit button. 
The user enters HTML tag in the input field. 
If the tag is valid, the script should print “Valid HTML tag!”, and if it is invalid – “Invalid HTML Tag!”. 
On the second line, there should be a score counter. 
For every valid tag entered, the score should increase by 1.
Hint: You may use sessions. Use an array to store all valid HTML5 tags. 
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Print tags</title>
</head>
<body>
	<main>
		<form method="GET" action=<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
			<label for="tag">Enter HTML tags:</label> <input type="text" id="tag" name="tag" />
			<input type="submit" name="submit" />
		</form>
		<h1>
<?php
	$validTags = array("!DOCTYPE","a","abbr","acronym","address","embed","object","area","article","aside","audio","b","base","basefont","bdi","bdo","big","blockquote","body","br","button","canvas","caption","center","cite","code","col","colgroup","datalist","dd","del","details","dfn","dialog","dir","ul","div","dl","dt","em","fieldset","figcaption","figure","font","footer","form","frame","frameset","h1","h6","head","header","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","main","map","mark","menu","menuitem","meta","meter","nav","noframes","noscript","ol","optgroup","option","output","p","param","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","video","span","strike","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","tt","u","var","wbr");
	if(isset($_GET['submit'])){
	session_start();
	if(!isset($_SESSION['count'])){
		$_SESSION['count'] = 0;	
	}
		if (isset($_GET['tag']) && strlen($_GET['tag'])>0){
			if (in_array($_GET['tag'], $validTags)){
				echo "Valid HTML tag!";
				$_SESSION['count'] += 1;
			} else {
				echo "Invalid HTML tag!";
			}
		} else {
			echo "Please, enter a tag name.";
		}
	}
?>			
		</h1>
		<?php if(isset($_SESSION['count'])) { ?>
		<h1>Score: <?= $_SESSION['count']; ?></h1>
		<?php } ?>
	</main>
</body>
</html>