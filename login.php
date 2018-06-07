<?php
session_start();
include_once('db.php');
//if(empty($_POST)) {
//    header("location:index.php");
//}


function isUser ($conect,$date) {
    $username = $date['username'];
    $password = md5($date['password']);

    $errorUser = [];

    $getUser = "SELECT * FROM `user` WHERE `username`= '$username' ";
    $response = mysqli_query($conect,$getUser);
//    $isUserCount = mysqli_num_rows($response);


    while($user = mysqli_fetch_array($response) ){

        if( $user['username'] == $username ){

            $errorUser = array("result"=>"userT");

            $getUser2 = "SELECT * FROM `user` WHERE `username`= '$username' AND `password` = '$password' ";
            $response2 = mysqli_query($conect,$getUser2);
//            $isUserCount = mysqli_num_rows($response2);

            while( $user2 = mysqli_fetch_array($response2) ){

                if( $user['username'] == $user2['username'] ){

                    $errorUser = array("result1"=>"userTrue");
//
//                    $a = fopen("newfile.txt","a");
//                    fwrite($a,$getUser2." =-- ".$user2['username']."------".$user2['password']."--=\n");
//                    fclose($a);

                    $_SESSION['username'] = $user['username'];
                    if( $user2['permission'] == "2") {
                        $errorUser = array("result"=>"true","permission"=>"2");
                        $_SESSION['permission'] = md5(777);

                    }else if($user2['permission'] == "1"){
                        $errorUser = array("result"=>"true","permission"=>"1");
                    }
                }
            }
        }
    }
    echo json_encode($errorUser);
}
$user = isUser ($conn,$_POST);

?>























