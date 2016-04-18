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
$editVID = $_SESSION["visitEditID"];
$dateUpdate = $_POST['date'];
$timeUpdate = $_POST['time'];
$pracIDUpdate = $_POST['pracID'];
$patientIDUpdate = $_POST['pID'];
$aTypeUpdate = $_POST['aType'];

$sql = "UPDATE Visit 
		SET date ='$dateUpdate',
		time ='$timeUpdate',
		pracID = '$pracIDUpdate',
		patID = '$patientIDUpdate',
		AssignmentType = '$aTypeUpdate'
		WHERE visitID = " . $_SESSION['visitEditID'] . "";
		
if (mysqli_query($conn, $sql)) {
    echo "<br>Visit record updated successfully!<br>";
	echo "<br><b> - Visit ID: " . $editVID . 
				"</b><br> - Date: " . $dateUpdate . 
				" <br> - Time: " . $timeUpdate .
				"<br> - Practitioner ID:" . $pracIDUpdate .
				"<br> - Patient ID:" . $patientIDUpdate .
				"<br> - Assignment Type:" . $aTypeUpdate .
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