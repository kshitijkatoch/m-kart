<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$phoneNumber = $_POST['phoneNumber'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	// echo "<script>console.log({$firstName})</script>";

	// Database connection
	$conn = new mysqli('localhost','root','mkart');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into account(firstName, lastName, phoneNumber, email, address) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $firstName, $lastName, $phoneNumber, $email, $address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>