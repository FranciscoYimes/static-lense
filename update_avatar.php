<?php
	
	$id = $_POST['user_id'];
	$direc = "avatar/";
	opendir($direc);
	$id1= $id.".png";
	$destination = $direc.$id1;

	if ($result = $connection->query("UPDATE user SET idPhoto = '$id' WHERE idUser ='$id' ; "))
	{
		copy($_FILES['foto']['tmp_name'] , $destination );
		echo json_encode(array('response' => true));
	}else echo json_encode(array('response' => false));
?>