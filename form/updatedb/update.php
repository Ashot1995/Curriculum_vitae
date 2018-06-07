<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date:5/23/18
 * Time: 11:51 AM
 */
session_start();
include "../../db.php";
$username = $_SESSION["username"];

$user_id1 = "SELECT address_id FROM users_data WHERE id = '$id'";
$res4 = mysqli_query($conn,$user_id1);
while ($row = $res4->fetch_assoc()) {
    $address_id = $row['address_id'];

}

$user_id2 = "SELECT `id`,`company_id` FROM user_company WHERE users_data_id = '$id'";
$res3 = mysqli_query($conn,$user_id2);
while ($row = $res3->fetch_assoc()) {
    $user_company_id=$row['id'];
    $company_id = $row['company_id'];

}
$user_id3 = "SELECT `skills_id` FROM user_company_skills WHERE user_company_id = ' $user_company_id'";
$res4 = mysqli_query($conn,$user_id3);
while ($row = $res4->fetch_assoc()) {
    $skills_id = $row['skills_id'];

}
$user_id4 = "SELECT `id` FROM user_educat WHERE users_data_id = ' $id'";
$res5 = mysqli_query($conn,$user_id4);
while ($row = $res5->fetch_assoc()) {
    $educat_id = $row['id'];

}

$address = $_POST['value2'][8]["value"];
$city = $_POST['value2'][7]["value"];
$sql = "UPDATE address SET address = '$address',city_id = '$city' WHERE id ='$address_id'";
$res = mysqli_query($conn, $sql);

$company = $_POST['value4'][0]["value"];
$company1 = $_POST['value4'][5]["value"];
$company2 = $_POST['value4'][10]["value"];
$company3 = $_POST['value4'][15]["value"];
$sql1 = "UPDATE company SET company_name = '$company',company_name1 = '$company1',
    company_name2 = '$company2',company_name3 = '$company3' WHERE id = $company_id";
$res1 = mysqli_query($conn, $sql1);



$Institution_name = $_POST['value3'][0]["value"];
$Institution_name1 = $_POST['value3'][5]["value"];
$Institution_name2 = $_POST['value3'][10]["value"];
$Institution_name3 = $_POST['value3'][15]["value"];
$profession_name = $_POST['value3'][1]["value"];
$profession_name1= $_POST['value3'][6]["value"];
$profession_name2 = $_POST['value3'][11]["value"];
$profession_name3 = $_POST['value3'][16]["value"];
$sql2 = "UPDATE education SET 
`institution_name`='$Institution_name',`Profession_name`='$profession_name',
`institution_name1`='$Institution_name1',`Profession_name1`='$profession_name1',
`institution_name2`='$Institution_name2',`Profession_name2`='$profession_name2',
`institution_name3`='$Institution_name3',`Profession_name3`='$profession_name3' 
 WHERE id = $educat_id";
$res2 = mysqli_query($conn, $sql2);



$skills_name = $_POST['value5'][0]["value"];
$skills_name2 = $_POST['value5'][2]["value"];
$skills_name3 = $_POST['value5'][4]["value"];
$skills_name4 = $_POST['value5'][6]["value"];

$sql3 = "UPDATE skills SET `skills_name`='$skills_name',`skills_name1`='$skills_name2',
`skills_name2`='$skills_name3',`skills_name3`='$skills_name4'
 WHERE id = $skills_id";
$res3 = mysqli_query($conn, $sql3);



$first_name = $_POST['value1'][0]["value"];
$last_name = $_POST['value1'][1]["value"];
$middle_name = $_POST['value1'][2]["value"];
$email = $_POST['value1'][3]["value"];
$image = $_POST["image28"];
$telephone0 = $_POST['value1'][4]["value"];
$telephone1 = $_POST['value1'][5]["value"];
$telephone2 = $_POST['value1'][6]["value"];
$telephone3 = $_POST['value1'][7]["value"];
$telephone4 = $_POST['value1'][8]["value"];
$pers_description = $_POST['value2'][0]["value"];
$date = $_POST['value2'][1]["value"];
$gender = $_POST['value2'][2]["value"];
$marital_status = $_POST['value2'][3]["value"];
$nationality = $_POST['value2'][4]["value"];
if ($nationality == "") {
    $nationality = 202;
}
if($image==""){
    $user_id99 = "SELECT image_path FROM users_data WHERE id = '$id'";
    $res99 = mysqli_query($conn,$user_id99);
    while ($row = $res99->fetch_assoc()) {
        $image = $row['image_path'];

    }

}

//$aa = fopen("newfile.txt","a");
//$txt =" ----- ". $image." --\n";
//fwrite($aa,$txt);
//fclose($aa);



$sql4 = "UPDATE users_data SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',
`mail`='$email',`telephone`='$telephone0',`date_of_birth`='$date',`gender`='$gender',
`marital_status`='$marital_status',`nationality_id`='$nationality',`pers_description`='$pers_description',
`address_id`='$address_id',`image_path`='$image',`telephone1`='$telephone1',
`telephone2`='$telephone2',`telephone3`='$telephone3',`telephone4`='$telephone4'
 WHERE id = $id";
$res4 = mysqli_query($conn, $sql4);


$main_res = $_POST['value4'][4]["value"];
$main_res2 = $_POST['value4'][9]["value"];
$main_res3 = $_POST['value4'][14]["value"];
$main_res4 = $_POST['value4'][19]["value"];
$position_name = $_POST['value4'][1]["value"];
$position_name2 = $_POST['value4'][6]["value"];
$position_name3 = $_POST['value4'][11]["value"];
$position_name4 = $_POST['value4'][16]["value"];
$start_date2 = $_POST['value4'][2]["value"];
$start_date22 = $_POST['value4'][7]["value"];
$start_date23 = $_POST['value4'][12]["value"];
$start_date24 = $_POST['value4'][17]["value"];
$end_date2 = $_POST['value4'][3]["value"];
$end_date22 = $_POST['value4'][8]["value"];
$end_date23 = $_POST['value4'][13]["value"];
$end_date24 = $_POST['value4'][18]["value"];
$sql5 = "UPDATE user_company SET `main_res`='$main_res',`position_name`='$position_name',
`start_date2`='$start_date2',`end_date2`='$end_date2',`users_data_id`='$id',
`company_id`='$company_id',`main_res1`='$main_res2',`position_name1`='$position_name2',
`start_date2_1`='$start_date22',`end_date2_1`='$end_date22',`main_res2`='$main_res3',
`position_name2`='$position_name3',`start_date2_2`='$start_date23',
`end_date2_2`='$end_date23',`main_res3`='$main_res4',`position_name3`='$position_name4',
`start_date2_3`='$start_date24',`end_date2_3`='$end_date24'
 WHERE company_id = $company_id";
$res5 = mysqli_query($conn, $sql5);

//$aa = fopen("newfile.txt","a");
//$txt =" ----- ". $sql5." --\n";
//fwrite($aa,$txt);
//fclose($aa);

$level_name = $_POST['value5'][1]["value"];
$level_name1 = $_POST['value5'][3]["value"];
$level_name2 = $_POST['value5'][5]["value"];
$level_name3 = $_POST['value5'][7]["value"];
if($level_name==""){
    $level_name="No Skills";
}
if($level_name1==""){
    $level_name1="No Skills";
}
if($level_name2==""){
    $level_name2="No Skills";
}
if($level_name3==""){
    $level_name3="No Skills";
}
$sql6 = "UPDATE user_company_skills SET `level_name`='$level_name',`level_name1`='$level_name1',
`level_name2`='$level_name2',`level_name3`='$level_name3',
`user_company_id`='$user_company_id',`skills_id`='$skills_id'
 WHERE id = $skills_id";
$res6 = mysqli_query($conn, $sql6);

//$aa = fopen("newfile.txt","a");
//$txt = "-$sql6 -\n";
//fwrite($aa,$txt);
//fclose($aa);


$academic_degree = $_POST['value3'][2]["value"];
$academic_degree2 = $_POST['value3'][7]["value"];
$academic_degree3 = $_POST['value3'][12]["value"];
$academic_degree4 = $_POST['value3'][17]["value"];
$start_date1 = $_POST['value3'][3]["value"];
$start_date12 = $_POST['value3'][8]["value"];
$start_date13 = $_POST['value3'][13]["value"];
$start_date14 = $_POST['value3'][18]["value"];
$end_date1 = $_POST['value3'][4]["value"];
$end_date12 = $_POST['value3'][9]["value"];
$end_date13 = $_POST['value3'][14]["value"];
$end_date14 = $_POST['value3'][19]["value"];
$sql7 = "UPDATE user_educat SET `users_data_id`='$id',`education_id`='$educat_id',
`academic_name`='$academic_degree',`start_date`='$start_date1',`end_date`='$end_date1',
`academic_name1`='$academic_degree2',`start_date1`='$start_date12',`end_date1`='$end_date12',
`academic_name2`='$academic_degree3',`start_date2`='$start_date13',`end_date2`='$end_date13',
`academic_name3`='$academic_degree4',`start_date3`='$start_date14',`end_date3`='$end_date14'
 WHERE id = $educat_id";
$res7 = mysqli_query($conn, $sql7);



$language = $_POST['value6'][0]["value"];
$language1 = $_POST['value6'][2]["value"];
$language2 = $_POST['value6'][4]["value"];
$language3 = $_POST['value6'][6]["value"];
$lang_level = $_POST['value6'][1]["value"];
$lang_level1 = $_POST['value6'][3]["value"];
$lang_level2 = $_POST['value6'][5]["value"];
$lang_level3 = $_POST['value6'][7]["value"];


$user_id88 = "SELECT id FROM user_languages WHERE user_data_id = $id";
$res88 = mysqli_query($conn,$user_id88);



$arr = array();
while ($row = $res88->fetch_assoc()) {
    $l_id = $row['id'];
    $arr[]=$l_id;
}




if( $language != ""){
    if($arr[0]!=""){
        $sql177 = "UPDATE user_languages SET `language_id`='$language',`lang_level`='$lang_level'
 WHERE id = '$arr[0]'";
        $res177 = mysqli_query($conn, $sql177);

    }else {
        $sql_88 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$id','$language','$lang_level')";
        $result88 = mysqli_query($conn, $sql_88);
    }
}else{
    $sql8 = "Delete from user_languages 
 WHERE id ='$arr[0]'";
    $res8 = mysqli_query($conn, $sql8);
}

if( $language1 != ""){
    if($arr[1]!=""){
        $sql177 = "UPDATE user_languages SET `language_id`='$language1',`lang_level`='$lang_level1'
 WHERE id = '$arr[1]'";
        $res177 = mysqli_query($conn, $sql177);

    }else {
        $sql_88 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$id','$language1','$lang_level1')";
        $result88 = mysqli_query($conn, $sql_88);
    }
}else{
    $sql8 = "Delete from user_languages 
 WHERE id ='$arr[1]'";
    $res8 = mysqli_query($conn, $sql8);
}

if( $language2 != ""){
    if($arr[2]!=""){
        $sql88 = "UPDATE user_languages SET `language_id`='$language2',`lang_level`='$lang_level2'
 WHERE id = '$arr[2]'";
        $res88 = mysqli_query($conn, $sql88);

    }else {
        $sql_888 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$id','$language2','$lang_level2')";
        $result888 = mysqli_query($conn, $sql_888);
    }
}else{
    $sql88 = "Delete from user_languages 
 WHERE id ='$arr[2]'";
    $res88 = mysqli_query($conn, $sql88);
}

if( $language3 != ""){
    if($arr[3]!=""){
        $sql99 = "UPDATE user_languages SET `language_id`='$language3',`lang_level`='$lang_level3'
 WHERE id = '$arr[3]'";
        $res99 = mysqli_query($conn, $sql99);

    }else {
        $sql_99 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$id','$language3','$lang_level3')";
        $result99 = mysqli_query($conn, $sql_99);
    }
}else{
    $sql99 = "Delete from user_languages 
 WHERE id ='$arr[3]'";
    $res99 = mysqli_query($conn, $sql99);
}

$conn->close();

if ($email == "") {

} else {
    $to = $email;
    $subject = 'Ashot';
    $message = "First Name :" . $first_name . "\n" . "Last Name :" . $last_name . "\n" . " Email :" . $email;
    $headers = 'From: Ashot <phpmail777@gmail.com>' . "\r\n" .
        'Reply-To: for you' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Type: text/html; charset=utf-8' . "\r\n" .
        'Content-Transfer-Encoding: quoted-printable';

    mail($to, $subject, $message, $headers);

}