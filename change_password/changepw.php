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

$password0 = $_POST['pass'];
$password = md5($_POST['pass']);


$result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$username'");

$array = array();
$pass = mysqli_fetch_assoc($result);

if($password == $pass['password'] ){
    $array = array('result'=>'true');
}else{
    $array = array('result'=>'false');
}


echo json_encode($array);




?>