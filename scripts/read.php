<?php
	
	require_once('database.php');


	$dbh = new Database(); //dbh - Database Handler
	$conn = $dbh->getConnection();

	$sql = "SELECT N_ID, S_FIRSTNAME, S_LASTNAME, S_EMAIL FROM `users`";

	$stmnt = $conn->prepare($sql);
	$stmnt->execute();
	$users = $stmnt->fetchAll();


	$output = '';
	$currentNumberOfUsers = count($users);

	$users = json_encode($users);

	echo $users;

	$stmnt->closeCursor();

	$dbh = null;
