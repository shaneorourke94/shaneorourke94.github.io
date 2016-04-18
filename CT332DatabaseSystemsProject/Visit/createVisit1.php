<!-- Create new visit --> 
<!DOCTYPE html>
<html> 
<?php
echo '<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>';
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}
$selectPrac = "SELECT * FROM Practitioner";
$pracResult = $conn->query($selectPrac);
$selectPatient = "SELECT * FROM Patient";
$patientResult = $conn->query($selectPatient);
$selectAssignment = "SELECT * FROM Assignment";
$aTypeResult = $conn->query($selectAssignment);
?>

<h2>Enter the visit's details below.</h2>
<body> 
<br>
<form name="input" action="createVisit2.php" method="post"> 

DOB:<br><input type="date" name="date"><br>

Time:<br><input type="time" name="time"><br>

<?php
if($pracResult->num_rows > 0){
echo '<label>Practitioner ID: <br>';
echo '<select name = "pracID">';
	
	while($row = $pracResult->fetch_assoc()){
		$pracID = $row['practitionerID'];
		echo'<option value"' .$pracID. '">' .$pracID. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Practitioner Table Empty.";
}
echo '<br>';

if($patientResult->num_rows > 0){
echo '<label>Patient ID: <br>';
echo '<select name = "pID">';
	
	while($row = $patientResult->fetch_assoc()){
		$pID = $row['patientID'];
		echo'<option value"' .$pID. '">' .$pID. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Patient Table Empty.";
}

echo '<br>';

if($aTypeResult->num_rows > 0){
echo '<label>Assignment Type: <br>';
echo '<select name = "aType">';
	
	while($row = $aTypeResult->fetch_assoc()){
		$aType = $row['type'];
		echo'<option value"' .$aType. '">' .$aType. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Assignment Table Empty.";
}

$conn->close();
?>	
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>