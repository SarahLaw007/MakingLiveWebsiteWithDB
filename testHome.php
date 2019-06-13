<?PHP
$proceed = FALSE;

while($proceed === FALSE){
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
		//find user and password in authorizedAdminViewers
		
		$stmt = $conn->prepare("Select * FROM authorizedAdminViewers WHERE adminUserName = ? AND
		adminPassWord = ?");
		$stmt->bind_param("ss", $_POST["adminName"], $_POST["password"]);

	
		$stmt->execute();

		$result = $stmt->get_result();
		$stmt->close();


		if ($result->num_rows > 0) {
			$proceed = TRUE;
		
		} else {
			echo "Please try again";
			header('Location: login.php'); 

		}
	
	} catch(Exception $e){
		echo "Connection failed: " . $e->getMessage();
	}
}

?>
<html>
<head>
      <title>admin00 Databaase Main Test Website</title>
</head>
<body>
<h2>Membership website</h2>
<ul>
<li><a href='addUserForm.php'>Add person to users Table in admin00 Database</a></li>
<li><a href='displayAdmin00Test.php'>See all people in users table in admin00 Database</a></li>
<li><a href='login.php'>Logout</a></li>

</ul>
</body>
</html>



