<?php

include "../../../db.php";

$email = $_POST['email'];
$name = $_POST['username'];


$data = " SELECT * FROM `user` WHERE `username`= '$name' ";
$db = mysqli_query($conn,$data);

$data5 = array();

while( $row = mysqli_fetch_array($db) ){

    if( $row['email'] == $email  &&  $row['username'] == $name ){
        $data5 = array("result"=>"true");
    }
    if( $row['email'] != $email  &&  $row['username'] == $name ){
        $data5 = array("result"=>"false_email");
    }
    if( $row['email'] == $email  &&  $row['username'] != $name ){
        $data5 = array("result"=>"false_username");
    }
    if( $row['email'] != $email  &&  $row['username'] != $name ){
        $data5 = array("result"=>"false_email_username");
    }
}

echo json_encode($data5);

//$aa = fopen("name.txt","a");
//$txt = " ----".$data5['result']."----\n";
//fwrite($aa,$txt);
//fclose($aa);


//exit;
