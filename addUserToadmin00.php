<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "Admin00";
$password = "1234";
$dbname ="admin00";

//Connect to DB
try {
    $conn =new mysqli($servername, $username, $password, $dbname);
    // set the PDO error mode to exception
    echo "Connected successfully  \r\n";
	echo "<br>";
	if (isset($_POST["name"]) && isset( $_POST["diabetesType"])){ 
		$insertUserName = $_POST["name"];
		$insertDiabetesType = $_POST["diabetesType"];
		$stmt = $conn->prepare("INSERT INTO users (userName, diabetesType) VALUES (?, ?)");
		$stmt->bind_param("ss", $insertUserName,$insertDiabetesType);

		$stmt->execute();

		$stmt->close();
		echo $_POST["name"] . " added successfully with Diabetes Type: " . $_POST["diabetesType"];
	
	}else{
		echo "Please go back and try again";
		
	}

	
}


catch(Exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn->close();
?>
<li><a href='adminHome.php'>Go back Home</a></li>

</body>
</html>