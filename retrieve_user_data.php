<?php
	
	include("connection.php");
	$id = $_POST['idUser'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT name, idPhoto, rightAnswers, level, exercise, learnedTime FROM user WHERE idUser = $id;"))
		{
			$line = $result->fetch_assoc();
			
			echo json_encode($line);
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}

	$connection->close();

?>