<!DOCTYPE html> 
<html>

<?php
echo '<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>';
echo "<h2>Edit Trial</h2>";

$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}
session_start();
$trialEditID = $_POST['trialEditID'];

$_SESSION["trialEditID"] = $trialEditID;
$sql = "SELECT * FROM Trial WHERE trialID = '$trialEditID'";
$result = $conn->query($sql);

$selectCentre = "SELECT * FROM Centre";
$centreResult = $conn->query($selectCentre);
?>

<body>
<h2>Selected Trial Details.</h2>
<?php
if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo " - Trial's ID: " . $row["trialID"]. 
	" <br> - Name: " . $row["name"]. 
	"<br> - Centre ID:" .$row["centreID"].
	"<br>";
	}
}
else{
echo "0 results";
}
?>
<h2>Enter trial's new details below.</h2>
<form name="input" action="editTrial3.php" method="post"> 


Trial Name:<br><input type="text" name="tNameUpdate"><br>

<?php
if($centreResult->num_rows > 0){
echo '<label>Centre ID: <br>';
echo '<select Name = "cIDUpdate">';
	
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