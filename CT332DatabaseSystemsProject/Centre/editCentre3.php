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
$cEditID = $_SESSION["centreEditID"];
$city = $_POST['city'];
$cName = $_POST['cName'];
$aType = $_POST['aType'];

$sql = "UPDATE Centre 
		SET City ='$city',
		centreName ='$cName',
		assignmentType = '$aType'
		WHERE ID = " . $_SESSION['centreEditID'] . "";
		
if (mysqli_query($conn, $sql)) {
    echo "Centre record updated successfully!<br>";
	echo "<br><b> - Centre ID: " . $cEditID . 
				"</b><br> - City: " . $city . 
				" <br> - Centre Name: " . $cName .
				"<br> - Assignment Type:" . $aType .
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