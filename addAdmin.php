<?PHP
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
		
		$stmt = $conn->prepare("Select * FROM authorizedAdminViewers WHERE adminUserName = ? ");
		$stmt->bind_param("s", $_POST["adminName"]);

	
		$stmt->execute();

		$result = $stmt->get_result();
		$stmt->close();


		if ($result->num_rows > 0) {
		   header("Location: register.php");
		   exit;
		} else {
			if (isset($_POST["adminName"]) && isset( $_POST["password"])){ 
				$insertAdminName = $_POST["adminName"];
				$insertPassword = $_POST["password"];
				$stmt = $conn->prepare("INSERT INTO authorizedAdminViewers (adminUserName , adminPassWord ) VALUES (?, ?)");
				$stmt->bind_param("ss", $insertAdminName,$insertPassword);

				$stmt->execute();

				$stmt->close();
				header("Location: login.php");
			}else{
				header("Location: register.php");

			}

		}
	
	} catch(Exception $e){
		echo "Connection failed: " . $e->getMessage();
	}

?>

