<!--Delete Patient Class -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h2>Patient Deletor</h2>
<p>Enter Patient ID you wish to delete at the bottom of the page.<p> 
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}

$sql = "SELECT * FROM Patient";
$result = $conn->query($sql);

echo "<b>List Of Current Patients:</b><br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Patient ID: " . $row["patientID"]. 
				"</b><br> - Date of Birth: " . $row["dob"]. 
				" <br> - Gender: " . $row["gender"]. 
				"<br> - Centre ID:" .$row["centreID"].
				"<br> - Trial ID:" .$row["trialID"].
				"<br><br>";
	}
}
else{
	echo "0 results";
}
$conn->close();
?>

<br>
<form name="input" action="deletePatient2.php" method="post"> 
Patient ID: <br><input type="number" name="deleteID">
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>