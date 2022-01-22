<?php

include '../control/register_validation.php';
	$email= $_GET["email"];
	$user = checkUseremail($email);
	if($user){
        echo "Invalid email";
	}
	else echo "valid";

	