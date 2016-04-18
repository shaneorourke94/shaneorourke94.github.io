<!--Delete Centre Class -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
<h2>Centre Deletor</h2>
<p>Enter centre id you wish to delete at the bottom of the page.<p> 
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}

$sql = "SELECT * FROM Centre";
$result = $conn->query($sql);

echo "<b>List Of Current Centres:</b><br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Centre ID: " . $row["ID"]. 
				"</b><br> - City: " . $row["City"]. 
				" <br> - Centre Name: " . $row["centreName"].
				"<br> - Assignment Type:" .$row["assignmentType"].
				"<br><br>";
	}
}
else{
	echo "0 results";
}
$conn->close();
?>

<br>
<form name="input" action="deleteCentre2.php" method="post"> 
Centre ID: <br><input type="number" name="deleteCID">
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>