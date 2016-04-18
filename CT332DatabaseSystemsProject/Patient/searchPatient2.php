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

$id = $_POST['id'];
$sql = "SELECT patientID, dob, gender FROM Patient WHERE patientID = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo "<br> - Patient ID: " . $row["patientID"]. "<br> - Date of Birth: " 
. $row["dob"]. " <br> - Gender: " . $row["gender"]. "<br>";
	}
}
else{
echo "0 results";
echo "<br>
		<br>
		<a href='../index.html'>Return to Home Page</a>";
}
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>
