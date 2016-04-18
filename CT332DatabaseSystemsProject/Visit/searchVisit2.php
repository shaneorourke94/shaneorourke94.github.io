<html>
<h2>Visit Details</h2>
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

$vid = $_POST['vid'];
$sql = "SELECT * FROM Visit WHERE visitID = '$vid'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo "<br> - Visit ID: " . $row["visitID"]. 
	"<br> - Date: " . $row["date"]. 
	" <br> - Time: " . $row["time"].
	" <br> - Practitioner ID: " . $row["pracID"].	
	" <br> - Patient ID: " . $row["patID"].
	" <br> - Assignment Type: " . $row["AssignmentType"].
	"<br>";
	}
	echo "<br>
	<br>
	<a href='../index.html'>Return to Home Page</a>";
}
else{
echo "0 results";
echo "<br>
	<br>
	<a href='../index.html'>Return to Home Page</a>";
}
$conn->close();
?>

</html>
