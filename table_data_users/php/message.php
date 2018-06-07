<?php
include "../../db.php";
$id=$_POST['con_id'];
$x = $_POST['email'];
$y = $_POST['mass'];

$to = 'ashotgharakeshishyan@gmail.com'.','.$x;//admin mail;
$subject = 'admin';
$message = $y;
$headers = 'From: Admin <admin@gmail.com>' . "\r\n" .
    'Reply-To: for you' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8' . "\r\n" .
    'Content-Transfer-Encoding: quoted-printable';
    mail($to, $subject, $message, $headers);

$sel = "SELECT `content`,`users_data_id` FROM `contact_user` Where users_data_id=$id";
$result = mysqli_query($conn,$sel);

$array = array();
$res = mysqli_fetch_assoc($result);



if($res>0){
    $sqlupd = "UPDATE contact_user SET content='1' WHERE users_data_id=$r";
    $result1 = mysqli_query($conn,$sqlupd);

    $array = array('result'=>'true');


}else{
    $sql = "INSERT INTO `contact_user` (`content`,`users_data_id`)  VALUES ('1','$id')";
    $query = mysqli_query($conn,$sql);
    $array = array('result'=>'false');
}


$sel5 = "SELECT `id` FROM `users_data` ";
$result5 = mysqli_query($conn,$sel5);

while($row = mysqli_fetch_assoc($result5))
{
   $array[]=$row;

}
//    $aa = fopen("new.txt","a");
//    $txt =" --".$sqlupd."----\n";
//    fwrite($aa,$txt);
//    fclose($aa);

echo json_encode($array);





