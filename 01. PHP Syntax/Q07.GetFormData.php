<!--
Write a PHP script GetFormData.php which retrieves the input data from an HTML form,
and displays it as string. The input fields should hold name, age and gender (radio buttons).
The returned string should be a message containing the information submitted by the form. 
100% accuracy is NOT required. Semantic HTML is required.
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Get Form Data</title>
	<style>
		form{
			font-size: 20px;
			width: 150px;
			box-sizing: border-box;
			display: block;		
		}
		input.textBox, input.btn {
			display: block;
			width: 150px;
			line-height: 24px;
			vertical-align: middle;
		}
		input.radio{
			display: inline-block;
			line-height: 24px;
			width: 20px;
		}
		label{
			display: inline-block;
			line-height: 24px;
			width: 120px;
		}
		div{
			font-size: 24px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<main>
		<form action="GetFormData.php" method="POST">
			<input type="text" class="textBox" name="name" placeholder="Name" required>
			<input type="text" class="textBox" name="age" placeholder="Age" required>
			<input type="radio" class="radio" name="sex" id="male" value="male" required><label for="male">Male</label>
			<input type="radio" class="radio" name="sex" id="female" value="female"><label for="female">Female</label>
			<input type="submit" class="btn" name="submit" value="Submit">
		</form>
		<div>
		<?php
			if(isset($_POST['submit'])){
				$name = $_POST['name'] ? htmlentities($_POST['name']) : null;
				$age = $_POST['age'] ? htmlentities($_POST['age']) : null;
				if($_POST['sex']) {
					$sex = $_POST['sex'];
				} else {
					$sex = null;
				}

				if($name != null) {
					echo 'My name is ' . $name . ". ";
				}
				if($age != null) {
					echo 'I am ' . $age . " old. ";	
				}
				if($sex != null) {
					echo 'I am ' . $sex . ". ";	
				}
			}
		?>
		</div>
	</main>
</body>
</html>