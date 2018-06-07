<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 5/30/18
 * Time: 10:29 AM
 */


include "../../db.php";

session_start();
$username = $_SESSION['username'];
//
$user_id55 = "SELECT `users_data_id` FROM `user` WHERE `username` = '$username'";
$res4 = mysqli_query($conn, $user_id55);

while ($row = $res4->fetch_assoc()) {
    $i = $row['users_data_id'];

}
$user_id5 = "SELECT `image_path` FROM `users_data` WHERE `id` = '$i'";
$res5 = mysqli_query($conn, $user_id5);

while ($row = $res5->fetch_assoc()) {
    $path = $row['image_path'];

}



$sql = "UPDATE users_data SET `image_path`='' WHERE image_path='$path'";
$d = mysqli_query($conn, $sql);

//$aa = fopen("newfile77777777777777777.txt", "a");
//$txt = "-------$sql-------.\n";
//fwrite($aa, $txt);
//fclose($aa);

$img = $_POST['image2'];

if(file_exists($img) == TRUE){
    unlink($img);
}

if(file_exists($img) == FALSE) {
    $res = array("result"=>"false");
    echo json_encode($res);
}