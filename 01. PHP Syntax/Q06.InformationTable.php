<!--
Write a PHP script InformationTable.php which generates an HTML table by given information 
about a person (name, phone number, age, address). 
Styling the table is optional. Semantic HTML is required. 
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Information table</title>
	<style type="text/css">
        table{
			border-collapse: collapse;
        	margin: 25px;
            font-size: 24px;
        }
        thead{
            background-color: orange;
            text-align: left;
            font-weight: bold;
            display:inline-block;
        }
        tbody{
        	display:inline-block;
        }
        th, td{
        	border: 1px solid #000;
        	padding: 5px 10px;
        }

    </style>
</head>
<body>
<?php
	class Person{
		public $name;
		public $phoneNum;
		public $age;
		public $address;

		public function __construct($name, $phoneNum, $age, $address) {
			$this->name = $name;
			$this->phoneNum = $phoneNum;
			$this->age = $age;
			$this->address = $address;
		}
	}

	$person1 = new Person('Gosho', '0882-321-423', '24', 'Hadji Dimitar');
	$person2 = new Person('Pesho', '0884-888-888', '67', 'Suhata Reka');

	$people = array($person1, $person2);
	?>
	<?php
	for ($index = 0; $index < count($people); $index++) {
	?>
	<table>
        <thead>
            <tr>
                <th colspan="3">Name</th>
            </tr>
            <tr>
                <th colspan="3">Phone Number</th>
            </tr>
            <tr>
                <th colspan="3">Age</th>
            </tr>
            <tr>
            	<th colspan="3">Address</th>
            </tr>
        </thead>
        <tbody>
	<?php
		foreach ($people[$index] as $key => $value) {
	?>
			<tr>
                <td><?= $value; ?></td>
            </tr>
	<?php
		}
	?>
        </tbody>
    </table>	
<?php
	}
?>
</body>
</html>