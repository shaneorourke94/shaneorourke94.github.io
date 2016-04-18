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
session_start();
$editVID = $_POST['editVID'];

$_SESSION["visitEditID"] = $editVID;
$sql = "SELECT visitID, date, time, pracID, patID, AssignmentType 
FROM Visit
WHERE visitID = '$editVID'";
$result = $conn->query($sql);

$selectPrac = "SELECT * FROM Practitioner";
$pracResult = $conn->query($selectPrac);
$selectPatient = "SELECT * FROM Patient";
$patientResult = $conn->query($selectPatient);
$selectAssignment = "SELECT * FROM Assignment";
$aTypeResult = $conn->query($selectAssignment);
?>

<body>
<h2>Selected Visit Details.</h2>
<?php
if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo "<br> - Visit ID: " . $row["visitID"]. 
	"<br> - Date: " . $row["date"]. 
	" <br> - Time: " . $row["time"]. 
	"<br> - Practitioner ID:" .$row["pracID"].
	"<br> - Patient ID:" .$row["patID"].
	"<br> - Assignment Type:" .$row["AssignmentType"].
	"<br>";
	}
}
else{
echo "0 results";
}
?>
<h2>Enter visit's new details below.</h2>
<form name="input" action="editVisit3.php" method="post"> 


Date:<br><input type="date" name="date"><br>

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