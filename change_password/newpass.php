<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 3/24/18
 * Time: 11:41 PM
 */

session_start();

include "../db.php";

$username = $_SESSION['username'];

$newpassword = $_POST['newpass'];
$newp = md5($newpassword);


$sql = mysqli_query($conn, "UPDATE `user` SET `password` = '$newp' WHERE `username`='$username'");
session_destroy();


$array = array();
$array = array('result'=>'true5');

echo json_encode($array);



$pa = $_SESSION['password11'];

//
//$aa = fopen("newfile7777777777.txt","a");
//$txt =" $username.----.$pa.-----\n";
//fwrite($aa,$txt);
//fclose($aa);

















