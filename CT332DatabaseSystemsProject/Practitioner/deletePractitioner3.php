<html>
<h2>Practitioner Deletor</h2>
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

$sql1 = "DELETE FROM Visit
		WHERE pracID = " . $_SESSION['deletePracID'] . "";
$sql2 = "DELETE FROM Practitioner
		WHERE practitionerID = " . $_SESSION['deletePracID'] . "";

if (mysqli_query($conn, $sql1)) {
    echo "<br>Visit records containing Practitioner ID were deleted.<br>";
} else {
    echo "<br>Visit Delete Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
		
if (mysqli_query($conn, $sql2)) {
    echo "<br>Practitioner Record deleted successfully!";
} else {
    echo "<br>Practitioner Delete Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

session_unset();
session_destroy();
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>
</html>