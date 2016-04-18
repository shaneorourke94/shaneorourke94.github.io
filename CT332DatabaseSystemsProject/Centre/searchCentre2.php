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

$centreID = $_POST['centreID'];
$sql = "SELECT ID, City, centreName, assignmentType 
	FROM Centre 
	WHERE ID = '$centreID'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo "<br> - Centre ID: " . $row["ID"]. 
	"<br> - City: " . $row["City"]. 
	"<br> - Centre Name: " . $row["centreName"]. 
	"<br> - Assignment Type: " . $row["assignmentType"].
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
