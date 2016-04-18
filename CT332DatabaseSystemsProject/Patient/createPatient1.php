<!-- Create new patient --> 
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
$selectCentre = "SELECT * FROM Centre";
$centreResult = $conn->query($selectCentre);
$selectTrial = "SELECT * FROM Trial";
$trialResult = $conn->query($selectTrial);
?>

<h2>Enter the patient's details below.</h2>
<body> 
<br>
<form name="input" action="createPatient2.php" method="post"> 

DOB:<br><input type="date" name="dob"><br>

Gender:<br>
	<select name = "gender">
               <option type = "text" value = "F">F</option>
               <option type = "text" value = "M">M</option>
    </select>
<br>

<?php
if($centreResult->num_rows > 0){
echo '<label>Centre ID: <br>';
echo '<select name = "cID">';
	
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
echo '<select name = "tID">';
	
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