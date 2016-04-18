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
$editID = $_SESSION["patientEditID"];
$dobUpdate = $_POST['dobUpdate'];
$genderUpdate = $_POST['genderUpdate'];
$cIDUpdate = $_POST['cIDUpdate'];
$tIDUpdate = $_POST['tIDUpdate'];

$sql = "UPDATE Patient 
		SET dob ='$dobUpdate',
		gender ='$genderUpdate',
		centreID = '$cIDUpdate',
		trialID = '$tIDUpdate'
		WHERE patientID = " . $_SESSION['patientEditID'] . "";
		
if (mysqli_query($conn, $sql)) {
    echo "Patient record updated successfully!<br>";
	echo "<br><b> - Patient ID: " . $editID . 
				"</b><br> - Date of Birth: " . $dobUpdate . 
				" <br> - Gender: " . $genderUpdate .
				"<br> - Centre ID:" . $cIDUpdate .
				"<br> - Trial ID:" . $tIDUpdate .
				"<br><br>";
} else {
    echo "<br>Update Error: " . $sql . "<br>" . mysqli_error($conn);
}

session_unset();
session_destroy();
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>