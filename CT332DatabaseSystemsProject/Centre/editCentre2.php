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
$editCID = $_POST['editCID'];

$_SESSION["centreEditID"] = $editCID;
$sql = "SELECT * 
FROM Centre
WHERE ID = '$editCID'";
$result = $conn->query($sql);

$selectAssignment = "SELECT * FROM Assignment";
$assignmentResult = $conn->query($selectAssignment);

?>

<body>
<h2>Selected Centre Details.</h2>
<?php
if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo " - Centre ID: " . $row["ID"]. 
	"<br> - City: " . $row["City"]. 
	" <br> - Centre Name: " . $row["centreName"]. 
	"<br> - Assignment Type:" .$row["assignmentType"].
	"<br>";
	}
}
else{
echo "0 results";
}
?>
<h2>Enter centre's new details below.</h2>
<form name="input" action="editCentre3.php" method="post"> 


City:<br><input type="text" name="city"><br>

Centre Name:<br><input type="text" name="cName"><br>

<?php
if($assignmentResult->num_rows > 0){
echo '<label>Assignment Type: <br>';
echo '<select name = "aType">';
	
	while($row = $assignmentResult->fetch_assoc()){
		$aType = $row['type'];
		echo'<option value"' .$aType. '">' .$aType. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Assignment Table Empty.";
}
echo '<br>';
$conn->close();
?>	
<br>
<input type="submit" value="Submit"> 
</form>
</body>
</html>