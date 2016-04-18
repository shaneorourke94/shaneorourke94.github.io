<!DOCTYPE html> 
<html>

<?php
echo '<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>';
echo "<h2>Practitioner Editor</h2>";

$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}
session_start();
$pracEditID = $_POST['pracEditID'];

$_SESSION["practitionerEditID"] = $pracEditID;
$sql = "SELECT practitionerID, name, centreID 
FROM Practitioner
WHERE practitionerID = '$pracEditID'";
$result = $conn->query($sql);

$selectCentre = "SELECT * FROM Centre";
$centreResult = $conn->query($selectCentre);
?>

<body>
<h2>Selected Practitioner Details.</h2>
<?php
if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo " - Practitioner's ID: " . $row["practitionerID"]. 
	" <br> - Name: " . $row["name"]. 
	"<br> - Centre ID:" .$row["centreID"].
	"<br>";
	}
}
else{
echo "0 results";
}
?>
<h2>Enter practitioner's new details below.</h2>
<form name="input" action="editPractitioner3.php" method="post"> 

Practitioner Name:<br><input type="text" name="pNameUpdate"><br>

<?php
if($centreResult->num_rows > 0){
echo '<label>Centre ID: <br>';
echo '<select name = "cIDUpdate">';
	
	while($row = $centreResult->fetch_assoc()){
		$cid = $row['ID'];
		echo'<option value"' .$cid. '">' .$cid. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Centre Table Empty.";
}

$conn->close();
?>	
<br>
<input type="submit" value="Submit"> 
</form>
</body>
</html>