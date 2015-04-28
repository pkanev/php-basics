<?php header('Content-type: text/HTML; charset=utf-8'); ?>
<!-- 
Write a PHP program SidebarBuilder.php that takes data from several input fields 
and builds 3 sidebars. The input fields are categories, tags and months. 
The first sidebar should contain a list of the categories, the second sidebar – 
a list of the tags and the third should contain the months. 
The entries in the input strings will be separated by a comma and space ", ". 
Styling the page is optional. Semantic HTML is required
 -->
 <!doctype html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Side bar builder</title>
 	<style>
 		main{
 			float: left;
 			width: 400px;
 			box-sizing: border-box;
 		}
 		label{
 			display: inline-block;
 			width: 100px;
 		}
 		input {
 			width: 250px;
 		}
 		#submit{
 			width: 75px;
 			display: block;
 			margin: 0 auto;
 		}
 		aside{
			float: left;
 		}
 		aside .subside{
 			border: 1px solid #000;
 			border-radius: 10px;
 			background-color: #add8e6;
 			color: tomato;
 			padding: 0 20px 20px;
 			margin-bottom: 15px;
 			font-size: 16px;
 		}
 		aside .subside h2{
		    text-transform: capitalize;
 			margin: 0, auto, 5px;
 			padding: 0;
 			text-decoration: underline;
 		}
 		aside .subside ul{
 			list-style: circle;
 			padding: 0;
 			margin: 0;
 		}
 		aside .subside ul li a{
 			color: tomato;
 		}
 	</style>
 </head>
 <body>
 	<main>
 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form">
		<label for="categories">Categories:</label>
		<input type="text" id="categories" name="categories">
		</div>
		<div class="form">
		<label for="tags">Tags:</label>
		<input type="text" id="tags" name="tags">
		</div>
		<div class="form">
		<label for="months">Months:</label>
		<input type="text" id="months" name="months">
		</div>
		<input type="submit" id="submit" name="submit" value="Generate">
 	</form>
 	</main>
<?php
 	if(isset($_POST['submit'])):
?>
<aside>
<?php
 		foreach ($_POST as $key => $value) :
 			if($key != "submit" && strlen($value) > 0) :
?>
<div class="subside">
	<h2><?= $key; ?></h2>
<?php
 				$tokens = preg_split("/, /", $value, -1, PREG_SPLIT_NO_EMPTY);
?>
<ul>
<?php
				foreach ($tokens as $item) :
?>
	<li><a href="#"><?= $item; ?></a></li>
<?php
				endforeach; //($tokens as $item)
?>
</ul>
</div>
<?php
 			endif; //($key != "submit")
 		endforeach; //($_POST as $key => $value)
 ?>
</aside>
 <?php
 	endif; //($key != "submit" && strlen($value) > 0)
 ?>
 </body>
 </html>