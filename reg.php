<?php
session_start();
include_once "db.php";


function issetUser2 ($conect,$data) {
    $username = $data['username'];
    $mail = $data['email'];



    $getUser = "SELECT * FROM `user` WHERE `username`= '$username' ";
    $response = mysqli_query($conect,$getUser);
    $usernameCount = mysqli_num_rows($response);
    $issetUser = [];

    if($usernameCount != 0){
        while( $user = mysqli_fetch_assoc($response) ){
            if( $username = $user["username"] ){
                $issetUser = array("result"=>"false","alert_text" => "user name not found ");
            }
        }
    }
    else if($usernameCount == 0){
        $issetUser = array("result" => "true", "alert_text" => "yes");
        $pass = md5($data["password1"]);
        $sql = "INSERT INTO `user` (`username`,`password`,`permission`,`email`)  VALUES ('$username','$pass','1','$mail')";

        $query = mysqli_query($conect,$sql);
        $_SESSION['prev'] = 'user';
        $_SESSION['username'] = $data['username'];
    }

    echo json_encode($issetUser) ;
}
$user = issetUser2 ($conn,$_POST);
?>
