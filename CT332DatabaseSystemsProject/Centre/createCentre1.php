<!-- Create new centre --> 
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
$selectAssignment = "SELECT * FROM Assignment";
$AssignmentResult = $conn->query($selectAssignment);
?>

<h2>Enter the centre's details below.</h2>
<body> 
<br>
<form name="input" action="createCentre2.php" method="post"> 

City:<br><input type="text" name="city"><br>

Centre Name:<br><input type="text" name="cName"><br>

<?php
if($AssignmentResult->num_rows > 0){
echo '<label>Assignment Type: <br>';
echo '<select name = "aType">';
	
	while($row = $AssignmentResult->fetch_assoc()){
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