<!--Search for trial by ID -->
<!DOCTYPE html> 
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
	<title>Search for a practitioner</title>
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

$selectTrialID = "SELECT * FROM Trial";
$trialIDResult = $conn->query($selectTrialID);

?>
<body>
	<h2>
		Enter the trial's details below.
	</h2>  
	<br>
	<form name="input" action="searchTrial2.php" method="post"> 

<?php
if($trialIDResult->num_rows > 0){
echo '<label>Trial ID: <br>';
echo '<select name = "tid">';
	
	while($row = $trialIDResult->fetch_assoc()){
		$tid = $row['trialID'];
		echo'<option value"' .$tid. '">' .$tid. '</option>';
	}
echo '</select>';
echo '</label>';
} else
{
	echo "Trial Table Empty.";
	echo "<br>
		<br>
		<a href='../index.html'>Return to Home Page</a>";
}
echo '<br>';
?>
		<input type="submit" value="Submit"> 
	</form>

</body> 
</html>