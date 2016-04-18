<!--Search for centre by ID -->
<!DOCTYPE html> 
<html>
<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<?php
$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}
$selectCID = "SELECT ID FROM Centre";
$centreIDResult = $conn->query($selectCID);
?>
<body>
<h2>
Select the centre's id below.
</h2>  
<br>
<form name="input" action="searchCentre2.php" method="post"> 
<?php
if($centreIDResult->num_rows > 0){
echo '<label>Centre ID: <br>';
echo '<select name = "centreID">';
	
	while($row = $centreIDResult->fetch_assoc()){
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
?>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>