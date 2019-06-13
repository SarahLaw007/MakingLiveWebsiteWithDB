<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
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
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
			echo "Results:";
			
    		echo "<table>
					<tr>
						<th>userID</th>
						<th>userName</th>
						<th>diabetesType</th>
					</tr>";
    		// output data of each row
    			while($row = $result->fetch_assoc()) {
        			echo "<tr>
							<td>".$row["userID"]."</td>
							<td>".$row["userName"]."</td>
							<td>".$row["diabetesType"]."</td>
						  </tr>";
   			}
			echo "</table>";
			
	} else {
    		echo "0 results";
	}
}


catch(Exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn->close();
?>
<li><a href='adminHome.php'>Go back Home</a></li>
<li><a href='login.php'>Logout</a></li>


</body>
</html>