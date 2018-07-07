<?php
	
	require_once('database.php');


	$dbh = new Database(); //dbh - Database Handler
	$conn = $dbh->getConnection();

	$task_id = $_GET['id'];
	if(isset($task_id)){

		$sql = "DELETE FROM `users` where N_ID = :task_id";

		$stmnt = $conn->prepare($sql);
		$stmnt->execute(array(
			':task_id' => $task_id
		));

		$stmnt->closeCursor();

		$dbh = null;
	}else{

		$sql = "DELETE FROM `users` where N_ID >= 1";

		$stmnt = $conn->prepare($sql);
		$stmnt->execute();

		$stmnt->closeCursor();

		$dbh = null;
	}
