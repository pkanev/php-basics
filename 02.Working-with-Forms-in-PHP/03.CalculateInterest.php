<!--
Write a PHP script CalculateInterest.php which generates an HTML page that contains:
•	An input text field to hold the amount of money
•	Radio buttons to choose the currency
•	An input text field to enter the compound annual interest amount
•	A dropdown menu to choose the period of time
•	A submit button
When the information is submitted, the script should print out the amount of money you will have 
after the selected period, rounded to 2 decimal places. 
Semantic HTML is required. Styling is not required. 
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Calculate Interest</title>
</head>
<body>
	<main>
		<form method="GET" action=<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
			<label for="amount">Enter Amount:</label> <input type="text" id="amount" name="amount" />
			<br>
			<input type="radio" name="currency" id="usd" value="&#36;"><label for="usd">USD</label>
			<input type="radio" name="currency" id="eur" value="&#8364;"><label for="eur">EUR</label>
			<input type="radio" name="currency" id="bgn" value="BGN"><label for="bgn">BGN</label>
			<br>
			<label for="interest">Compound interest amount:</label> <input type="text" id="interest" name="interest" />
			<br>
			<select name="timePeriod">
				<option value="6">6 Months</option>
				<option value="12">1 Year</option>
				<option value="24">2 Years</option>
				<option value="60">5 Years</option>
			</select>
			<input type="submit" name="submit" />
		</form>
		<div>
<?php
	if(isset($_GET['submit'])){
		$message = '';
		if (strlen($_GET['amount']) == 0){
			$message .= "Please, enter the amount.<br>";
		}
		if (!is_numeric($_GET['amount'])) {
			$message .= "Please, use numbers for the amount.<br>";	
		}
		if (strlen($_GET['interest']) == 0){
			$message .= "Please, enter the interest.<br>";	
		}
		if (!is_numeric($_GET['interest'])) {
			$message .= "Please, use numbers for the interest.<br>";	
		}
		if (!array_key_exists('currency', $_GET)){
			$message .= "Please, select a currency.<br>";	
		}
		if (!array_key_exists('timePeriod', $_GET)){
			$message .= "Please, select a time period.<br>";	
		}

		if(strlen($message) == 0){
			$presentValue = $_GET['amount'];
			$interest = $_GET['interest'];
			$currency = $_GET['currency'];
			$timePeriod = $_GET['timePeriod'];
			$futureValue = $presentValue * pow((1+($interest/12)/100), $timePeriod);
			echo $currency . ' ' . number_format($futureValue, 2);
		} else {
			echo $message;
		}	} 
?>			
		</div>
	</main>
</body>
</html>