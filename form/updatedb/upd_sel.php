<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 4/26/18
 * Time: 2:14 PM
 */
include "../../db.php";
session_start();
$username = $_SESSION['username'];
$user_info = array();
$user_id = "SELECT users_data_id FROM user WHERE username = '$username'";
$res = mysqli_query($conn, $user_id);
$a = mysqli_fetch_assoc($res);
$user_info[] = $a;


$sel = "SELECT  * From user 
         INNER JOIN users_data ON user.users_data_id =users_data.id
         INNER JOIN nationality AS nat ON users_data.nationality_id = nat.id
         INNER JOIN address ON users_data.address_id = address.id
         INNER JOIN cities as ci ON address.city_id= ci.city_id
         INNER JOIN regions as reg ON ci.region_id= reg.region_id
         INNER join countries ON ci.country_id = countries.country_id
         INNER JOIN user_educat ON users_data.id = user_educat.users_data_id
         INNER JOIN education ON user_educat.education_id = education.id
         INNER JOIN user_company ON users_data.id = user_company.users_data_id 
         INNER JOIN company ON user_company.company_id = company.id
         INNER JOIN user_company_skills ON user_company.id = user_company_skills.user_company_id
         INNER JOIN skills  ON user_company_skills.skills_id = skills.id 
         
         WHERE username = '$username'";

$selQ = mysqli_query($conn, $sel);



while ($row_user0 = mysqli_fetch_assoc($selQ)) {
    $user_info[] = $row_user0;
}



$selL =  "SELECT * FROM user_languages WHERE user_data_id= $a[users_data_id]";
$selLQ = mysqli_query($conn,$selL);
while ($row_user1 = mysqli_fetch_assoc($selLQ)) {
    $user_info[] = $row_user1;
}
//$aa = fopen("newfile444444444.txt", "a");
//$txt = $selL . " ----dddd--\n";
//fwrite($aa, $txt);
//fclose($aa);

echo json_encode($user_info);



