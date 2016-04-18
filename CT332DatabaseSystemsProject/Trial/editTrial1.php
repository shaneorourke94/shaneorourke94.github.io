<!--Edit Trial Class -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h2>Edit Trial</h2>
<p>Enter Trial id you wish to edit at the bottom of the page.<p> 
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}

$sql = "SELECT * FROM Trial";
$result = $conn->query($sql);

echo "<b>List Of Current trials:</b><br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Trial ID: " . $row["trialID"]. 
				"</b><br> - Name: " . $row["name"]. 
				"<br> - Centre ID:" .$row["centreID"].
				"<br><br>";
	}
}

else
{
	echo "0 results";
}
$conn->close();
?>

<br>
<form name="input" action="editTrial2.php" method="post"> 
Trial ID: <br><input type="number" name="trialEditID">
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>