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
$deleteTrialID = $_POST['deleteTrialID'];

$_SESSION["deleteTrialID"] = $deleteTrialID;
$sql = "SELECT * FROM Trial WHERE trialID = '$deleteTrialID'";
$result = $conn->query($sql);
?>
<body>
<h2>Delete Trial</h2>
<?php
echo "Click <b>DELETE</b> if you want to delete the Trial below.<br>";
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo "<br><b> - Trial ID: " . $row["trialID"]. 
				"</b><br> - Name: " . $row["name"]. 
				"<br> - Centre ID:" .$row["centreID"].
				"<br><br>";
	}
}
$conn->close();
?>
<form name="input" action="deleteTrial3.php" method="post"> 
<input type="submit" value="DELETE">
</form>
</body>

</html>