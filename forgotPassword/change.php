<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 4/10/18
 * Time: 12:36 PM
 */

include "../db.php";

$password = "";
$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

for ($i = 0; $i < 10; $i++) {
    $random_int = mt_rand();
    $password .= $charset[$random_int % strlen($charset)];
}

echo $password."\n";


$username = $_POST['username'];
$email = $_POST['email'];


//$aa = fopen("name.txt","a");
//$txt = " -$username- ttttgge--".$email."----\n";
//fwrite($aa,$txt);
//fclose($aa);



$x = "SELECT `password` FROM `user` WHERE `username`= $username";
$result = mysqli_query($conn, $x);

//if (!$result1) {
//    echo "The username you entered does not exist";
//} else if ($password != mysqli_result($conn, $result, 0)) {
//    echo "You entered an incorrect password";
//}

$newp = md5($password);
echo $newp;

$sql = mysqli_query($conn, "UPDATE `user` SET `password` = '$newp' WHERE `username`= '$username'");
//
//$aa = fopen("name.txt","a");
//$txt = " -$sql--$newp--\n";
//fwrite($aa,$txt);
//fclose($aa);

$data = " SELECT * FROM `user` WHERE `username`='$username' ";
$db = mysqli_query($conn,$data);

$row = mysqli_fetch_array($db);

$to = $row["email"];
$subject = 'Admin';
$message = 'Your new password  '.$password.' ';
$headers = 'From: Admin <tigran.maghlodjyan@mail.ru>' . "\r\n" .
    'Reply-To: for you' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable';


mail($to, $subject, $message, $headers);


header("Location:../index.php");



