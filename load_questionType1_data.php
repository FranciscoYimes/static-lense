<?php
	
	include("connection.php");
	$idQuestion = $_POST['idQuestion'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("SELECT title, text1 ,text2 ,text3 ,text4  FROM questionType1 WHERE idQuestion = $idQuestion;"))
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