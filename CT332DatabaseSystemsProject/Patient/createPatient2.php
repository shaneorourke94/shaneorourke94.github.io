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

$dob = $_POST['dob'];
$gender = $_POST['gender'];
$cID = $_POST['cID'];
$tID = $_POST['tID'];

$sql = "INSERT INTO Patient (dob, gender, centreID, trialID) 
VALUES ('$dob','$gender', '$cID', '$tID')";

if (mysqli_query($conn, $sql)) {
    echo "Patient record created successfully!";
} else {
    echo "Insert Error: " . $sql . "<br>" . mysqli_error($conn);
}
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>