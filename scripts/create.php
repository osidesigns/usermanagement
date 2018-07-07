<?php
	
	require_once('database.php');

	$firstname = $_POST['firstName'];
	$lastname = $_POST['lastName'];
	$emailaddress = $_POST['email'];

	if($firstname == '' || $lastname == ''){
		exit();
	}

	$dbh = new Database(); //dbh - Database Handler
	$conn = $dbh->getConnection();

	$sql = "INSERT INTO `users` (S_FIRSTNAME, S_LASTNAME, S_EMAIL) VALUES (:firstname, :lastname, :email)";

	$stmnt = $conn->prepare($sql);
	$stmnt->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':email' => $emailaddress
	));

	$stmnt->closeCursor();

	$dbh = null;
