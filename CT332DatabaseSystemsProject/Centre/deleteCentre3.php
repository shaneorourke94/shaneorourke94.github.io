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

$sql2 = "DELETE FROM Patient
		WHERE centreID = ". $_SESSION['deleteCID'] . "";
$sql1 = "DELETE FROM Centre
		WHERE ID = " . $_SESSION['deleteCID'] . "";
$sql3 = "DELETE FROM Trial
		WHERE centreID = ". $_SESSION['deleteCID'] . "";
$sql4 = "DELETE FROM Practitioner
		WHERE centreID = ". $_SESSION['deleteCID'] . "";
$sql0 = "DELETE `Visit` 
		FROM `Visit`, `Practitioner` 
		WHERE Visit.pracID = Practitioner.practitionerID AND Practitioner.centreID = ". $_SESSION['deleteCID'] . "";
	
//Deleted from Visit table.
if (mysqli_query($conn, $sql0)) {
    echo "<br>Visit records containing centre ID were deleted.<br>";
} else {
    echo "<br>Visit Delete Error: " . $sql0 . "<br>" . mysqli_error($conn) . "<br>";
}
	
	//Deleted from patient table.
if (mysqli_query($conn, $sql2)) {
    echo "<br>Patient records containing centre ID were deleted.<br>";
} else {
    echo "<br>Patient Delete Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>";
}	
	
//Deleted from trial table.	
if (mysqli_query($conn, $sql3)) {
    echo "<br>Trial records containing centre ID were deleted.<br>";
} else {
    echo "<br>Trial Delete Error: " . $sql3 . "<br>" . mysqli_error($conn) . "<br>";
}

//Deleted from Practitioner table.
if (mysqli_query($conn, $sql4)) {
    echo "<br>Practitioner records containing centre ID were deleted.<br>";
} else {
    echo "<br>Practitioner Delete Error: " . $sql4 . "<br>" . mysqli_error($conn) . "<br>";
}

//Deleted from centre table.
if (mysqli_query($conn, $sql1)) {
    echo "<br><b>Centre record deleted successfully!<b><br>";
} else {
    echo "<br>Centre Delete Error: " . $sql1 . "<br>" . mysqli_error($conn) . "<br>";
}

session_unset();
session_destroy();
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>