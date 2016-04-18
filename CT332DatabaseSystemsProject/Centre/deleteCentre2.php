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
$deleteCID = $_POST['deleteCID'];

$_SESSION["deleteCID"] = $deleteCID;
$sql = "SELECT * 
FROM Centre
WHERE ID = '$deleteCID'";
$result = $conn->query($sql);
?>
<body>
<h2>Centre Deletor</h2>
<?php
echo "<b>Click DELETE if you want to delete the patient below.</b><br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Centre ID: " . $row["ID"]. 
				"</b><br> - City: " . $row["City"]. 
				" <br> - Centre Name: " . $row["centreName"].
				"<br> - Assignment Type:" .$row["assignmentType"].
				"<br><br>";
	}
}
$conn->close();
?>
<form name="input" action="deleteCentre3.php" method="post"> 
<input type="submit" value="DELETE">
</form>
<p><b>Note that when a centre is deleted then all <u>Patients, Practitioners and Trials</u> associated with the Centre will also be removed.</b></p>
<br>
<p><b>Also because if a Practitioner is removed then all <u>Visits</u> with that Practitioner will also be removed.</b></p>
</body>

</html>