<?php

	include("connection.php");
	$cont = 0;

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT word FROM translate_words ;"))
		{
			$result_array = array();
			while ($row = $result->fetch_assoc())
			{
				$cont = $cont + 1;
				array_push($result_array, $row);
			}
			echo json_encode($cont);
			echo json_encode(array('response' => true, 'questions' => $result_array));
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}

?>
