<!--Search for patient by ID -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}
$selectPatientID = "SELECT * FROM Patient";
$patientIDResult = $conn->query($selectPatientID);
?>
<body>
<h2>
Enter the patient's id below.
</h2>  
<br>
<form name="input" action="searchPatient2.php" method="post"> 
<!--Patient ID: <br><input type="text" name="id">-->

<?php
if($patientIDResult->num_rows > 0){
echo '<label>Patient ID: <br>';
echo '<select name = "id">';
	
	while($row = $patientIDResult->fetch_assoc()){
		$pid = $row['patientID'];
		echo'<option value"' .$pid. '">' .$pid. '</option>';
	}
echo '</select>';
echo '</label>';
} else
{
	echo "Patient Table Empty.";
}
echo '<br>';
?>
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>