<html>
<?php
echo '<head>
<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>';
echo "<h2>Practitioner Editor</h2>";

$servername = "danu6.it.nuigalway.ie";
$username = "mydb1478mn";
$password = "fo2juz";
$dbname = "mydb1478";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
die("Error PHP: " .$conn->connect_error);
}

session_start();
$editID = $_SESSION["practitionerEditID"];
$pNameUpdate = $_POST['pNameUpdate'];
$cIDUpdate = $_POST['cIDUpdate'];

$sql = "UPDATE Practitioner 
		SET name ='$pNameUpdate',
		centreID = '$cIDUpdate'
		WHERE practitionerID = " . $_SESSION['practitionerEditID'] . "";
		
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully!<br>";
	echo "<br><b> - Practitioner ID: " . $editID .
				" <br> - Name: " . $pNameUpdate .
				"<br> - Centre ID:" . $cIDUpdate .
				"<br><br>";
} else {
    echo "Update Error: " . $sql . "<br>" . mysqli_error($conn);
}

session_unset();
session_destroy();
$conn->close();
?>
<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>