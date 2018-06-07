<?php
/**
 * Created by PhpStorm.
 * User: Mic-User-09
 * Date: 1/18/2018
 * Time: 3:07 PM
 */


$data = $_POST['image'];

list($type, $data) = explode(';', $data);
list($type, $data) = explode(',', $data);

$data = base64_decode($data);
$imageName = time();
$rand = rand();
$filename =  $imageName . '_' . $rand . '.jpg';
file_put_contents('imageUser/'.$filename, $data);

$ret['status'] = true;
//$ret['msg'] = "File Uploaded to root folder, Tanks For Watching CODZON-TECH";
$ret['img_name'] = "image/imageUser/".$filename;

echo json_encode($ret);
exit;


?>






