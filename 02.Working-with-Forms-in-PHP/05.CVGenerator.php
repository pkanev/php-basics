<!--
Write a PHP script CVGenerator.php which generates an HTML form like in the example below. 
When the information is submitted (via Generate CV), the script should print out a simple table-like CV. 
Semantic HTML is required. Styling is not required.
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>CV Generator</title>
	<style>
		form{
			display: block;
			width: 600px;
		}
		table, td, th{
			border: 1px solid #000;
		}
		td, th{
			padding: 2px 5px;
		}
	</style>
	<script>
	window.onload = function (){
	    var nextProgLang = 0,
	    	nextLang = 0;

	    function addPlang(){
	    	var inputDiv = document.createElement("div");
	        inputDiv.setAttribute("id", "pLang" + nextProgLang);
	        inputDiv.innerHTML = 
	        	"<input type='text' name='pLangs["+ nextProgLang + "][]'>" +
			 	"<select name='pLangs["+ nextProgLang + "][skill]' id='skillPLang" + nextProgLang + "'>" +
			 		"<option value='Beginner'>Beginner</option>" +
			 		"<option value='Programmer'>Programmer</option>" +
			 		"<option value='Ninja'>Ninja</option>" +
			 	"</select>";
			document.getElementById('pLangParent').appendChild(inputDiv); 	
	    	nextProgLang++;
	    };
	    
	    addPlang(); //to populate the form initially
	    
	    document.getElementById("addPLang").onclick = function() {addPlang(); return false;};

	    document.getElementById('remPLang').onclick = function(){
	    	if (nextProgLang > 0){
	    		nextProgLang --;
		    	var inputDiv = document.getElementById('pLang'+nextProgLang);
		        document.getElementById('pLangParent').removeChild(inputDiv);
	    	}
	        return false;
	    }

	    function addLang(){
	    	var inputDiv = document.createElement("div");
	        inputDiv.setAttribute("id", "lang" + nextLang);
	        inputDiv.innerHTML =
				"<input type='text' name='langs[" + nextLang + "][]'>" +
			 	"<select name='langs[" + nextLang + "][comprehension]' id='comprehensionLang" + nextLang +"'>" +
			 		"<option default' value='Not specified'>-Comprehension-</option>" +
			 		"<option value='Beginner'>Beginner</option>" +
			 		"<option value='Intermediate'>Intermediate</option>" +
			 		"<option value='Advanced'>Advanced</option>" +
			 		"<option value='Fluent'>Fluent</option>" +
			 	"</select>" +
			 	"<select name='langs[" + nextLang + "][reading]' id='ReadingLang" + nextLang + "'>" +
			 		"<option default value='Not specified'>-Reading-</option>" +
			 		"<option value='Beginner'>Beginner</option>" +
			 		"<option value='Intermediate'>Intermediate</option>" +
			 		"<option value='Advanced'>Advanced</option>" +
			 		"<option value='Fluent'>Fluent</option>" +
			 	"</select>" +
			 	"<select name='langs[" + nextLang + "][writing]' id='writingLang" + nextLang + "'>" +
			 		"<option default value='Not specified'>-Writing-</option>" +
			 		"<option value='Beginner'>Beginner</option>" +
			 		"<option value='Intermediate'>Intermediate</option>" +
			 		"<option value='Advanced'>Advanced</option>" +
			 		"<option value='Fluent'>Fluent</option>" +
			 	"</select>";
			document.getElementById('langParent').appendChild(inputDiv); 	
	    	nextLang++;
	    };
	    
	    addLang(); //to populate the form initially
	    
	    document.getElementById("addLang").onclick = function() {addLang(); return false;};

	    document.getElementById('remLang').onclick = function(){
	    	if (nextLang > 0){
	    		nextLang --;
		    	var inputDiv = document.getElementById('lang'+nextLang);
		        document.getElementById('langParent').removeChild(inputDiv);
	    	}
	        return false;
	    }
	}
	</script>
</head>
<body>
	<main>
		<section id="form">
		<form method="POST" action=<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
			<fieldset>
				<legend>Personal information</legend>
				<input type="text" name="fName" placeholder="First Name"><br>
				<input type="text" name="lName" placeholder="Last Name"><br>
				<input type="email" name="email" placeholder="Email"><br>
				<input type="text" name="phone" placeholder="Phone Number"><br>
				<label for="female">Female</label><input type="radio" name="gender" id="female" value='Female'>
				<label for="male">Male</label><input type="radio" name="gender" id="male" value='Male'><br>
				<label for="dob">Date of Birth</label><br>
				<input type="text" name="dob" placeholder="dd/mm/yyyy"><br>
				<label for="nationality">Nationality</label><br>
				<select name="nationality">
					<option value="Bulgarian">Bulgarian</option>
					<option value="Greek">Greek</option>
					<option value="Romanian">Romanian</option>
					<option value="Serbian">Serbian</option>
					<option value="other">other</option>
				</select>
			 </fieldset>
			 <fieldset>
			 	<legend>Last Work Position</legend>
			 	<label for="firm">Company Name</label>
				<input type="text" name="firm"><br>
			 	<label for="lwpFrom">From</label>
				<input type="text" name="lwpFrom" placeholder="dd/mm/yyyy"><br>
				<label for="lwpTo">To</label>
				<input type="text" name="lwpTo" placeholder="dd/mm/yyyy"><br>
			 </fieldset>
			 <fieldset>
			 	<legend>Computer Skills</legend>
			 	<div>Programming Languages</div>
			 	<div id="pLangParent">
			 	</div>
			 	<button id="remPLang">Remove Language</button>
			 	<button id="addPLang">Add Language</button>
			 </fieldset>
			 <fieldset>
			 	<legend>Other Skills</legend>
			 	<div>Languages</div>
			 	<div id="langParent">
			 		
			 	</div>
			 	<button id="remLang">Remove Language</button>
			 	<button id="addLang">Add Language</button>
			 	<div>Driver's License</div>
				<label for="catB">B</label><input type="checkbox" id="catB" name="license[]" value="B">
			 	<label for="catA">A</label><input type="checkbox" id="catA" name="license[]" value="A">
				<label for="catC">C</label><input type="checkbox" id="catC" name="license[]" value="C">
			 </fieldset>
			<input type="submit" name="submit" value="Generate CV" />
		</form>
		</section>
		<section id="cv">
<?php
	$computerLanguages = array();
	$languages = array();
	$driverLicence = array();

	if(isset($_POST['submit'])){
		$message = '';
		// start of validation
		$regex = "/^[a-zA-Z]{2,20}$/"; //regex for first name, last name and languages
		if (preg_match_all($regex, $_POST['fName'])) {
		    $fName = $_POST['fName'];
		} else {
			$fName = "Not specified";
		    $message .= "The first name should be between 2 and 20 symbols and should contain only letters<br>";
		}
		if (preg_match_all($regex, $_POST['lName'])) {
		    $lName = $_POST['lName'];
		} else {
			$lName = "Not specified";
		    $message .= "The last name should be between 2 and 20 symbols and should contain only letters<br>";
		}
		foreach ($_POST['langs'] as $key => $language) {
			if (preg_match_all($regex, $language[0])) {
		    	// create an array with language information
		    	$languages[] = $language;
			} else {
			    $message .= "The language should be between 2 and 20 symbols and should contain only letters<br>";
			}
		}
		$regex = "/^([0-9a-zA-Z]+)@([0-9a-zA-Z]+)\.([0-9a-zA-Z]+)$/"; //regex for emails
		if (preg_match_all($regex, $_POST['email'])) {
		    $email = $_POST['email'];
		} else {
			$email = "Not specified";
		    $message .= "Please enter a valid email.<br>";
		}
		$regex = "/^[0-9+\-\s]+$/"; //regex for phone numbers
		if (preg_match_all($regex, $_POST['phone'])) {
		    $phone = $_POST['phone'];
		} else {
			$phone = "Not specified";
		    $message .= "The phone number can contains numbers and '+', '-' and ' '.<br>";
		}
		$regex = "/^[a-zA-Z0-9]{2,20}$/"; //regex for company name
		if (preg_match_all($regex, $_POST['firm'])) {
		    $firm = $_POST['firm'];
		} else {
			$firm = "Not specified";
		    $message .= "The company name should be between 2 and 20 symbols and should contain letters or numbers<br>";
		}
		if(array_key_exists ('gender', $_POST)){
			$gender = $_POST['gender'];
		} else {
			$gender = 'Not specified';
		}
		$regex = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/"; //regex for dates
		if(preg_match_all($regex, $_POST['dob'])) {
		    $dob = $_POST['dob'];
		    $dob = substr($dob, -4) . '-' . substr($dob, 3, -5) . '-' . substr($dob, 0, -8);
		} else {
			$dob = "Not specified";
		    $message .= "Please enter the date of birth in the specified format<br>";
		}
		if($firm!="Not specified" && preg_match_all($regex, $_POST['lwpFrom'])) {
		    $lwpFrom = $_POST['lwpFrom'];
		    $lwpFrom = substr($lwpFrom, -4) . '-' . substr($lwpFrom, 3, -5) . '-' . substr($lwpFrom, 0, -8);
		} else {
			$lwpFrom = "Not specified";
		    $message .= "Please enter the start date of your last workplace in the specified format<br>";
		}
		if($firm!="Not specified" && preg_match_all($regex, $_POST['lwpTo'])) {
		    $lwpTo = $_POST['lwpTo'];
		    $lwpTo = substr($lwpTo, -4) . '-' . substr($lwpTo, 3, -5) . '-' . substr($lwpTo, 0, -8);
		} else {
			$lwpTo = "Not specified";
		    $message .= "Please enter the end date of your last workplace in the specified format<br>";
		}
		$nationality = ($_POST['nationality']);
		foreach ($_POST['pLangs'] as $key => $language) {
			if (strlen($language[0]) > 0) {
		    	$computerLanguages[] = $language;
			}
		}
		if(array_key_exists ('license', $_POST)){
			foreach ($_POST['license'] as $key => $value) {
				$driverLicence[] = $value;
			}
		}
	}
	if(isset($message) && strlen($message) > 0) {
		echo $message;
	}
	if(isset($_POST['submit']) && strlen($message) == 0) {
		// this will build a table if data has been entered correctly
?>
			<h1>CV</h1>
			<table>
				<tr><th colspan="2">Personal Information</th></tr>
				<tr>
					<td>First Name</td>
					<td><?= htmlentities($fName); ?></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><?= htmlentities($lName); ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= htmlentities($email); ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?= htmlentities($phone); ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?= htmlentities($gender); ?></td>
				</tr>
				<tr>
					<td>Birth Date</td>
					<td><?= htmlentities($dob); ?></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td><?= htmlentities($nationality); ?></td>
				</tr>
			</table>
			<br>
			<table>
				<tr><th colspan="2">Last Work Position</th></tr>
				<tr>
					<td>Company name</td>
					<td><?= htmlentities($firm); ?></td>
				</tr>
				<tr>
					<td>From</td>
					<td><?= htmlentities($lwpFrom); ?></td>
				</tr>
				<tr>
					<td>To</td>
					<td><?= htmlentities($lwpTo); ?></td>
				</tr>
			</table>
			<br>
			<table>
				<tr><th colspan="2">Computer Skills</th></tr>
				<tr>
					<td>Programming Languages</td>
					<td>
						<table>
							<tr>
								<th>Language</th>
								<th>Skill Level</th>
							</tr>
							<?php
								foreach ($computerLanguages as $key => $value) {
							?>
							<tr>
								<td><?= htmlentities($value[0]); ?></td>
								<td><?= htmlentities($value['skill']); ?></td>
							</tr>
							<?php
								}
							?>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr><th colspan="2">Other Skills</th></tr>
				<tr>
					<td>Langages</td>
					<td>
						<table>
							<tr>
								<th>Language</th>
								<th>Comprehension</th>
								<th>Reading</th>
								<th>Writing</th>
							</tr>
							<?php
								foreach ($languages as $key => $value) {
							?>
							<tr>
								<td><?= htmlentities($value[0]); ?></td>
								<td><?= htmlentities($value['comprehension']); ?></td>
								<td><?= htmlentities($value['reading']); ?></td>
								<td><?= htmlentities($value['writing']); ?></td>
							</tr>
							<?php
								}
							?>
						</table>
					</td>
				</tr>
				<tr>
					<td>Driver's Licence</td>
					<td><?= implode(", ", $driverLicence); ?></td>
				</tr>
			</table>
	<?php } ?>
		</section>
	</main>
</body>
</html>