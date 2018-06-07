<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 4/13/18
 * Time: 1:39 PM
 */

include "../../db.php";

$desc = $_POST['description'];
$id = $_POST['users_data_id'];

$sqlS = "SELECT `note`FROM aboutUser WHERE `users_data_id`=$id";
$resS = mysqli_query($conn, $sqlS);
$row = mysqli_fetch_assoc($resS);

if ($row>0) {
    $sqlU = "UPDATE aboutUser SET `note` = '$desc' WHERE `users_data_id` = $id";
    $resU = mysqli_query($conn, $sqlU);
}else {
    $sqlA = "INSERT INTO aboutUser (`note`,`users_data_id`) VALUES ('$desc','$id')";
    $resA = mysqli_query($conn, $sqlA);
}



//$aa = fopen("newfile77777777777777777.txt","a");
//$txt = json_encode($row).$sqlS;
//fwrite($aa,$txt);
//fclose($aa);



