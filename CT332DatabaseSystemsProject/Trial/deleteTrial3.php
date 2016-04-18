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

$sql1 = "DELETE FROM Patient
		WHERE centreID = ". $_SESSION['deleteTrialID'] . "";
$sql2 = "DELETE FROM Trial
		WHERE centreID = ". $_SESSION['deleteTrialID'] . "";
		
		
//Deleted from patient table.
if (mysqli_query($conn, $sql1)) {
    echo "<br>Patient records containing trial ID were deleted.<br>";
} else {
    echo "Patient Delete Error: " . $sql1 . "<br>" . mysqli_error($conn);
}	
	
//Deleted from trial table.	
if (mysqli_query($conn, $sql2)) {
    echo "<br><b>Trial record deleted.<b>";
} else {
    echo "Trial Delete Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

session_unset();
session_destroy();
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>