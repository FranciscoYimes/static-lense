<?php

	include("connection.php");
	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT * FROM level;"))
		{
			echo json_encode($result);
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}

?>