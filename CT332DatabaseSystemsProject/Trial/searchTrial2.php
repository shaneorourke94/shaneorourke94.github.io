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

	if ($conn->connect_error)
	{
		die("Error PHP: " .$conn->connect_error);
	}

	$tid = $_POST['tid'];
	$sql = "SELECT * FROM Trial WHERE trialID = '$tid'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			echo "<br> - Trial ID: " . $row["trialID"]. "<br> - Name: " 
		. $row["name"]. " <br> - Centre ID: " . $row["centreID"]. "<br>";
		echo "<br>
		<br>
		<a href='../index.html'>Return to Home Page</a>";
		}
	}
	else
	{
		echo "0 results";
		echo "<br>
		<br>
		<a href='../index.html'>Return to Home Page</a>";
	}
	$conn->close();
?>

</html>
