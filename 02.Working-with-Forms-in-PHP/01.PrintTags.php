<!--
Write a PHP script PrintTags.php which generates an HTML input text field and a submit button. 
In the text field the user must enter different tags, separated by a comma and a space (", "). 
When the information is submitted, the script should split the tags, put them in an array and print out the array. Semantic HTML is required. Styling is not required. 
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Print tags</title>
</head>
<body>
	<main>
		<form method="GET" action=<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
			<label for="tags">Enter Tags:</label> <input type="text" id="tags" name="tags" />
			<input type="submit" name="submit" />
		</form>
		<div>
<?php
	if(isset($_GET['submit'])){
		if (isset($_GET['tags']) && strlen($_GET['tags'])>0){
			$tags = explode(", ", $_GET['tags']);
			foreach ($tags as $key => $value) {
							echo $key . " : " . htmlentities($value) . "<br>";
						}			
		} else {
			echo "Please, enter some tags.";
		}
	} 
?>			
		</div>
	</main>
</body>
</html>