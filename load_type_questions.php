<?php
	
	include("connection.php");
	$idExercise = $_POST['idExercise'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT type FROM question WHERE idExercise = $idExercise; "))
		{
			
			$result_array = array();
			while ($row = $result->fetch_assoc())
			{
				array_push($result_array, $row);
			}
			echo json_encode(array('response' => true, 'questions' => $result_array));
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}

	$connection->close();

?>