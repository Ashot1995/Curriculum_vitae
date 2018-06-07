<?php


$img = $_POST['image2'];

if(file_exists($img) == TRUE){
    unlink($img);
}

if(file_exists($img) == FALSE) {
    $res = array("result"=>"false");
    echo json_encode($res);
}

?>
