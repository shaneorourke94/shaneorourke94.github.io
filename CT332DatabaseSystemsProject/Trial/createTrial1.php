<!-- Create new trial --> 
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
?>

<h1>Enter the trial's details below.</h1>
<body> 
<br>
<form name="input" action="createTrial2.php" method="post"> 

Name:<br><input type="text" name="name"><br>

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

$conn->close();
?>	
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>