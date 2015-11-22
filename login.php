<?php
	include("connection.php");
	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		$password = $_POST['password'];
		$mail = $_POST['mail'];

		if ($result = $connection->query("SELECT idUser , name FROM user WHERE mail = '$mail' AND password = '$password';"))
		{
			$user = $result->fetch_assoc();

			if ($user)
			{
				$id = $user['idUser'];
				echo json_encode(array("response" => true, "user_id" => $id));
			}
			else
			{
				echo json_encode(array('response' => false));
			}
		}
		else
		{
			echo json_encode(array('response' => false));
		}
	}

	$connection->close();
?>
