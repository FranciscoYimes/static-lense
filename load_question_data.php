<?php
	
	include("connection.php");
	$idExercise = $_POST['idExercise'];
	$numQuestion = $_POST['question'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT idQuestion, numQuestion, type, image  FROM question WHERE idExercise = $idExercise AND numQuestion = $numQuestion;"))
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