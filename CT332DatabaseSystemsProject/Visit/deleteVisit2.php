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
$deleteVID = $_POST['deleteVID'];

$_SESSION["deleteVID"] = $deleteVID;
$sql = "SELECT * 
FROM Visit
WHERE visitID = '$deleteVID'";
$result = $conn->query($sql);
?>
<body>
<h2>Visit Deletor</h2>
<?php
echo "<b>Click DELETE if you want to delete the patient below.</b>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Visit ID: " . $row["visitID"]. 
				"</b><br> - Date: " . $row["date"]. 
				" <br> - Time: " . $row["time"]. 
				"<br> - Practitioner ID:" .$row["pracID"].
				"<br> - Patient ID:" .$row["patID"].
				"<br> - Assignment Type:" .$row["AssignmentType"].
				"<br><br>";
	}
}
$conn->close();
?>
<form name="input" action="deleteVisit3.php" method="post"> 
<input type="submit" value="DELETE">
</form>
</body>

</html>