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
$deleteID = $_POST['deleteID'];

$_SESSION["deleteID"] = $deleteID;
$sql = "SELECT patientID, dob, gender, centreID, trialID 
FROM Patient
WHERE patientID = '$deleteID'";
$result = $conn->query($sql);
?>
<body>
<h2>Patient Deletor</h2>
<?php
echo "<b>Click DELETE if you want to delete the patient below.</b><br>";
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
$conn->close();
?>
<form name="input" action="deletePatient3.php" method="post"> 
<input type="submit" value="DELETE">
</form>
</body>

</html>