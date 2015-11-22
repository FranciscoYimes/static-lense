<?php

	include("connection.php");
	$name = $_POST['name'];
	$password = $_POST['password'];
	$mail = $_POST['mail'];

	if ($connection->connect_errno) 
	{
		printf(array('response' => false, 'errno' => $connection->connect_errno));
	}
	else
	{
		if ($result = $connection->query("INSERT INTO user(name, mail, password) VALUES ('$name', '$mail', '$password');"))
		{
			//enviar mail validación

				$titulo    = 'Valida tu cuenta';
				$link = 'validation.php?id=';
				$mensaje   = 'Ya puedes validar tu cuenta haciendo click en el siguiente enlace:';
				$cabeceras = 'Lense App';

				mail($mail, $titulo, $mensaje, $cabeceras);
				echo json_encode(array('response' => true));
		}
		else
		{

				$titulo    = 'Valida tu cuenta';
				$link = 'validation.php?id=';
				$mensaje   = 'Ya puedes validar tu cuenta haciendo click en el siguiente enlace:';
				$cabeceras = 'Lense App';

				mail($mail, $titulo, $mensaje, $cabeceras);
				echo json_encode(array('response' => flase));
		}
	}

	$connection->close();
?>