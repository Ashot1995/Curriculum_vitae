<?php

include_once "db.php";

if (!empty($_POST) ){
	foreach($_POST as $key => $value){
		if($value === "true") {
			$sql =" UPDATE `user` SET `user`.permission = '2' WHERE `user`.id= '$key'";



		}else {
			$sql = "UPDATE `user` SET `user`.permission = '1' WHERE `user`.id= '$key'";
		}
        $res = mysqli_query($conn,$sql);
	}
}


function getusers($conect){
	$users = "SELECT `id`, `username`,`permission` FROM `user` ";
	$resourse = mysqli_query($conect,$users);
	$arr =[];
	while($res = mysqli_fetch_assoc($resourse)) {
	$arr[] = $res;
	}
	return $arr;

}

$responce = getusers($conn);

echo json_encode($responce);





?>


