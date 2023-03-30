<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$date = $_POST['date'];
	$number = $_POST['number'];
	$department = $_POST['department'];
	$doctor = $_POST['doctor'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, date, number, department, doctor, message) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $date, $number, $department, $doctor, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Appointment successfully...";
		$stmt->close();
		$conn->close();
	}
?>
