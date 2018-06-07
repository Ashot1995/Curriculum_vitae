<?php

ini_set('display errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("localhost","root","root","cv_db");
	if(!$conn) {
		exit("Connection error: " . mysqli_connect_error());
	}
mysqli_set_charset($conn,"utf8");
