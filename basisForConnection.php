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
    //Show everythign in DB
	
}


catch(Exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn->close();
?>
</body>
</html>