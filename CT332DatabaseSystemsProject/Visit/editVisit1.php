<!--Edit Visit Class -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h2>Visit Editor</h2>
<p>Enter visit id you wish to edit at the bottom of the page.<p> 
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}

$sql = "SELECT * FROM Visit";
$result = $conn->query($sql);

echo "<b>List Of Current Visits:</b><br>";
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

else{
	echo "0 results";
}
$conn->close();
?>

<br>
<form name="input" action="editVisit2.php" method="post"> 
Visit ID: <br><input type="number" name="editVID">
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>