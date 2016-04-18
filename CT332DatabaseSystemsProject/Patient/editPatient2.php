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
$editID = $_POST['editID'];

$_SESSION["patientEditID"] = $editID;
$sql = "SELECT patientID, dob, gender, centreID, trialID 
FROM Patient
WHERE patientID = '$editID'";
$result = $conn->query($sql);

$selectCentre = "SELECT * FROM Centre";
$centreResult = $conn->query($selectCentre);
$selectTrial = "SELECT * FROM Trial";
$trialResult = $conn->query($selectTrial);
?>

<body>
<h2>Selected Patient Details.</h2>
<?php
if ($result->num_rows > 0){
while ($row = $result->fetch_assoc()){
echo " - Patient ID: " . $row["patientID"]. 
	"<br> - Date of Birth: " . $row["dob"]. 
	" <br> - Gender: " . $row["gender"]. 
	"<br> - Centre ID:" .$row["centreID"].
	"<br> - Trial ID:" .$row["trialID"].
	"<br>";
	}
}
else{
echo "0 results";
}
?>
<h2>Enter patient's new details below.</h2>
<form name="input" action="editPatient3.php" method="post"> 


DOB:<br><input type="date" name="dobUpdate"><br>

Gender:<br>
	<select name = "genderUpdate">
               <option type = "text" value = "F">F</option>
               <option type = "text" value = "M">M</option>
    </select>
<br>

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
echo '<br>';

if($trialResult->num_rows > 0){
echo '<label>Trial ID: <br>';
echo '<select name = "tIDUpdate">';
	
	while($row = $trialResult->fetch_assoc()){
		$tid = $row['trialID'];
		echo'<option value"' .$tid. '">' .$tid. '</option>';
	}
	
echo '</select>';
echo '</label>';
} else
{
	echo "Trial Table Empty.";
}
$conn->close();
?>	
<br>
<input type="submit" value="Submit"> 
</form>
</body>
</html>