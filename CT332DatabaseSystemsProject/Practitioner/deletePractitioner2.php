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
$deletePracID = $_POST['deletePracID'];

$_SESSION["deletePracID"] = $deletePracID;
$sql = "SELECT practitionerID, name, centreID
FROM Practitioner
WHERE practitionerID = '$deletePracID'";
$result = $conn->query($sql);
?>
<body>
<h2>Practitioner Deletor</h2>
<?php
echo "<b>Click DELETE if you want to delete the practitioner below.</b><br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Practitioner ID: " . $row["practitionerID"]. 
				"</b><br> - Name: " . $row["name"]. 
				"<br> - Centre ID:" .$row["centreID"].
				"<br><br>";
	}
}
$conn->close();
?>
<form name="input" action="deletePractitioner3.php" method="post"> 
<input type="submit" value="DELETE">
</form>
<br>
<p><b>Note that when a practitioner record is deleted all <u>VISIT</u> records 
overseen by the practitioner will also be removed.<b></p>
</body>

</html>