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

$date = $_POST['date'];
$time = $_POST['time'];
$pracID = $_POST['pracID'];
$pID = $_POST['pID'];
$aType = $_POST['aType'];

$sql = "INSERT INTO Visit (date, time, pracID, patID, AssignmentType) 
VALUES ('$date','$time', '$pracID', '$pID', '$aType')";

if (mysqli_query($conn, $sql)) {
    echo "New visit record created successfully!";
} else {
    echo "Visit insert Error: " . $sql . "<br>" . mysqli_error($conn);
}
$conn->close();
?>

<br>
<br>
<a href="../index.html">Return to Home Page</a>