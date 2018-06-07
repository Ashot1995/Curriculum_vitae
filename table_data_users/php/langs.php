<?php


include "../../db.php";
if(empty($_POST)) {
    header("location:index.php");
}

$id = $_POST['user_id'];

$sql6666 = "SELECT * FROM `user_languages` 
INNER JOIN `languages` ON `user_languages`.`language_id` = `languages`.`id` 
WHERE `user_languages`.`user_data_id` = '$id'";

$result6666 = mysqli_query($conn,$sql6666);

$data = array();
while ($r = mysqli_fetch_assoc($result6666)){
    $data[] = $r;
}

//$aa = fopen("newfilyhyhye.txt","a");
//$txt = " -----".json_encode($data)."----\n";
//fwrite($aa,$txt);
//fclose($aa);


echo json_encode($data);
exit;


?>

















