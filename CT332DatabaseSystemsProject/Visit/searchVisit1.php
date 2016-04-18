<!--Search for visit by ID -->
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
$selectVisitID = "SELECT * FROM Visit";
$visitIDResult = $conn->query($selectVisitID);
?>
<body>
<h2>
Enter the visit's id below.
</h2>  
<br>
<form name="input" action="searchVisit2.php" method="post"> 


<?php
if($visitIDResult->num_rows > 0){
echo '<label>Visit ID: <br>';
echo '<select name = "vid">';
	
	while($row = $visitIDResult->fetch_assoc()){
		$vid = $row['visitID'];
		echo'<option value"' .$vid. '">' .$vid. '</option>';
	}
echo '</select>';
echo '</label>';
} else
{
	echo "Visit Table Empty.";
	echo "<br>
		<br>
		<a href='../index.html'>Return to Home Page</a>";
}
echo '<br>';
?>
<br>
<input type="submit" value="Submit"> 
</form>

</body> 
</html>