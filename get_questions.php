<?php

	include("connection.php");
	$exerciseId = $_POST['exerciseId'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT * FROM question WHERE id_exercise = '$exerciseId' ;"))
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

?>
