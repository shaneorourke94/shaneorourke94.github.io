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

$sql = "DELETE FROM Patient
		WHERE patientID = " . $_SESSION['deleteID'] . "";
		
if (mysqli_query($conn, $sql)) {
    echo "Patient record deleted successfully!";
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