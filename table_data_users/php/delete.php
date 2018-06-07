<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 4/9/18
 * Time: 6:13 PM
 */


include "../../db.php";

$id = $_POST['user_id2'];
$aa = fopen("newfile77777777777777777.txt","a");
$txt = $id;
fwrite($aa,$txt);
fclose($aa);

$sql = "DELETE FROM `users_data` WHERE id= '$id'";
$res = mysqli_query($conn,$sql);
$sql1 = "DELETE FROM `user` WHERE users_data_id= '$id'";
$res1 = mysqli_query($conn,$sql1);
$sql2= "DELETE FROM `user_company` WHERE users_data_id= '$id'";
$res2 = mysqli_query($conn,$sql2);
$sql3 = "DELETE FROM `user_educat` WHERE users_data_id= '$id'";
$res3 = mysqli_query($conn,$sql3);
$sql4 = "DELETE FROM `user_languages` WHERE user_data_id= '$id'";
$res4 = mysqli_query($conn,$sql4);
$sql5 = "DELETE FROM `aboutUser` WHERE user_data_id= '$id'";
$res5 = mysqli_query($conn,$sql5);