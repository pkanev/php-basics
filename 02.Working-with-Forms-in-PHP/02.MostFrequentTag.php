<!--
Write a PHP script MostFrequentTag.php which generates an HTML input text field and a submit button. 
In the text field the user must enter different tags, separated by a comma and a space (", "). 
When the information is submitted, the script should generate a list of the tags, sorted by frequency. 
Then you must print: "Most Frequent Tag is: [most frequent tag]". 
Semantic HTML is required. Styling is not required. 
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Most Frequent Tag</title>
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
			$countedTags = array();
			foreach ($tags as $key => $value) {
				if (array_key_exists($value, $countedTags)) {
					$countedTags[$value] += 1;
				} else {
					$countedTags[$value] = 1;
				}
			}
			arsort($countedTags);
			foreach ($countedTags as $key => $value) {
				echo htmlentities($key). " : $value times <br>";
			}
			// rewind the pointer to position 0
			reset($countedTags);
			$mostFrequent = htmlentities(key($countedTags));

			echo "Most Frequent Tag is: $mostFrequent";
		} else {
			echo "Please, enter some tags.";
		}
	} 
?>			
		</div>
	</main>
</body>
</html>