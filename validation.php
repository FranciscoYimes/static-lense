<?php

	include("connection.php");
	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
   		exit();
	}
	else
	{
		if ($result = $connection->query("UPDATE user SET validation = 0 WHERE idUser = $id;"))
		{
			echo json_encode(array('response' => true));	
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}
?>