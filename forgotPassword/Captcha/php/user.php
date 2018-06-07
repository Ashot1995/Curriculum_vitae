<?php
session_start();
include_once "../../../db.php";
//if(empty($_POST)) {
//header("location:registration.php");
//}


function issetUser ($conect,$data) {

    $username = $data['username'];

//    $a = fopen("newfile.txt","a");
//    fwrite($a,$username." =--- ".$mail." --=\n");
//    fclose($a);

    $getUser = "SELECT *  FROM `user` WHERE `username`= '$username' ";
    $response = mysqli_query($conect,$getUser);
    $usernameCount = mysqli_num_rows($response);
    $issetUser = [];


    if($usernameCount != 0){
        while( $user = mysqli_fetch_assoc($response) ){
            if( $username = $user["username"] ){
                $issetUser = array("result"=>"true");
            }
        }
    }
    else{
        $issetUser = array("result"=>"false");
    }


    echo json_encode($issetUser) ;
}

$user = issetUser ($conn,$_POST);