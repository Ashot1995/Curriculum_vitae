<?php

include "../../db.php";
session_start();
$username = $_SESSION['username'];
$user_id = "SELECT `users_data_id` FROM `user` WHERE `username` = '$username'";
$res = mysqli_query($conn, $user_id);

while ($row = $res->fetch_assoc() ) {
    $id = $row['users_data_id'];
}

if (empty($_POST)) {
    header("location:index.php");
}

if (!isset($id) || $username=='admin') {

    $address = $_POST['value2'][8]["value"];
    $city = $_POST['value2'][7]["value"];

    $sqlAddr = "INSERT INTO `address`(`address`,`city_id`) VALUES ('$address','$city')";
    $resultAddr = mysqli_query($conn, $sqlAddr);
    $address_id = mysqli_insert_id($conn);


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

    $aa = fopen("newfile7.txt","a");
    $txt =" ----".$_POST['value2']."- --\n";
    fwrite($aa,$txt);
    fclose($aa);

    if ($nationality == "") {
        $nationality = 202;
    }
    if($marital_status==""){
        $marital_status='NULL';
    }

    $sql_1 = "INSERT INTO `cv_db`.`users_data`(`first_name`,`last_name`,`middle_name`,`mail`,`telephone`,
`date_of_birth`,`gender`,`marital_status`,`nationality_id`,`pers_description`,`address_id`,`image_path`,`telephone1`,
`telephone2`,`telephone3`,`telephone4`)
VALUES ('$first_name','$last_name','$middle_name','$email','$telephone0','$date','$gender','$marital_status','$nationality','$pers_description','$address_id','$image','$telephone1','$telephone2','$telephone3','$telephone4')";
    $result1 = mysqli_query($conn, $sql_1);
    $users_data_id = mysqli_insert_id($conn);




    $Institution_name = $_POST['value3'][0]["value"];
    $Institution_name2 = $_POST['value3'][5]["value"];
    $Institution_name3 = $_POST['value3'][10]["value"];
    $Institution_name4 = $_POST['value3'][15]["value"];
    $profession_name = $_POST['value3'][1]["value"];
    $profession_name2 = $_POST['value3'][6]["value"];
    $profession_name3 = $_POST['value3'][11]["value"];
    $profession_name4 = $_POST['value3'][16]["value"];

    $sql_2 = "INSERT INTO `education`(`institution_name`,`Profession_name`,`institution_name1`,
`Profession_name1`,`institution_name2`,`Profession_name2`,`institution_name3`,`Profession_name3`) 
VALUES ('$Institution_name','$profession_name','$Institution_name2','$profession_name2','$Institution_name3',
'$profession_name3','$Institution_name4','$profession_name4')";
    $result2 = mysqli_query($conn, $sql_2);
    $education_id = mysqli_insert_id($conn);


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

    $sql_3 = "INSERT INTO `user_educat`(`users_data_id`,`education_id`,`academic_name`,`start_date`,`end_date`,
`academic_name1`,`start_date1`,`end_date1`,`academic_name2`,`start_date2`,`end_date2`,`academic_name3`,`start_date3`,
`end_date3`) VALUES ('$users_data_id','$education_id','$academic_degree','$start_date1','$end_date1','$academic_degree2',
'$start_date12','$end_date12','$academic_degree3','$start_date13','$end_date13','$academic_degree4','$start_date14',
'$end_date14')";
    $result3 = mysqli_query($conn, $sql_3);


    $company = $_POST['value4'][0]["value"];
    $company2 = $_POST['value4'][5]["value"];
    $company3 = $_POST['value4'][10]["value"];
    $company4 = $_POST['value4'][15]["value"];

    $sql_4 = "INSERT INTO `company`(`company_name`,`company_name1`,`company_name2`,`company_name3`)
VALUES ('$company','$company2','$company3','$company4')";
    $result4 = mysqli_query($conn, $sql_4);
    $company_id = mysqli_insert_id($conn);

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

    $sql_6 = "INSERT INTO `user_company`(`main_res`,`position_name`,`start_date2`,`end_date2`,`users_data_id`,
`company_id`,`main_res1`,`position_name1`,`start_date2_1`,`end_date2_1`,`main_res2`,`position_name2`,`start_date2_2`,
`end_date2_2`,`main_res3`,`position_name3`,`start_date2_3`,`end_date2_3`) 
VALUES ('$main_res','$position_name','$start_date2','$end_date2','$users_data_id','$company_id','$main_res2',
'$position_name2','$start_date22','$end_date22','$main_res3','$position_name3','$start_date23','$end_date23',
'$main_res4','$position_name4','$start_date24','$end_date24')";
    $result6 = mysqli_query($conn, $sql_6);
    $user_company_id = mysqli_insert_id($conn);


    $skills_name = $_POST['value5'][0]["value"];
    $skills_name2 = $_POST['value5'][2]["value"];
    $skills_name3 = $_POST['value5'][4]["value"];
    $skills_name4 = $_POST['value5'][6]["value"];

    $sql_5 = "INSERT INTO `cv_db`.`skills`(`skills_name`,`skills_name1`,`skills_name2`,`skills_name3`) 
VALUES ('$skills_name','$skills_name2','$skills_name3','$skills_name4')";
    $result5 = mysqli_query($conn, $sql_5);
    $skills_id = mysqli_insert_id($conn);

    $level_name = $_POST['value5'][1]["value"];
    $level_name2 = $_POST['value5'][3]["value"];
    $level_name3 = $_POST['value5'][5]["value"];
    $level_name4 = $_POST['value5'][7]["value"];

    if ($level_name == "") {
        $level_name = "No skills";
    } if ($level_name2 == "") {
        $level_name2 = "No skills";
    }if ($level_name3 == "") {
        $level_name3 = "No skills";
    } if ($level_name4 == "") {
        $level_name4 = "No skills";
    }


    $sql_7 = "INSERT INTO `user_company_skills`(`level_name`,`level_name1`,`level_name2`,`level_name3`,
`user_company_id`,`skills_id`) VALUES ('$level_name','$level_name2','$level_name3','$level_name4','$user_company_id',
'$skills_id')";

    $result7 = mysqli_query($conn, $sql_7);


    $language = $_POST['value6'][0]["value"];
    $language1 = $_POST['value6'][2]["value"];
    $language2 = $_POST['value6'][4]["value"];
    $language3 = $_POST['value6'][6]["value"];
    $lang_level = $_POST['value6'][1]["value"];
    $lang_level1 = $_POST['value6'][3]["value"];
    $lang_level2 = $_POST['value6'][5]["value"];
    $lang_level3 = $_POST['value6'][7]["value"];
    $sql_8 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
VALUES ('$users_data_id','$language','$lang_level')";
    $result8 = mysqli_query($conn, $sql_8);

    if ($language1 != "" && $lang_level1 != "") {
        $sql_9 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$users_data_id','$language1','$lang_level1')";
        $result9 = mysqli_query($conn, $sql_9);
    }

    if ($language2 != "" && $lang_level2 != "") {
        $sql_10 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$users_data_id','$language2','$lang_level2')";
        $result10 = mysqli_query($conn, $sql_10);
    }

    if ($language3 != "" && $lang_level3 != "") {
        $sql_11 = "INSERT INTO `user_languages`(`user_data_id`,`language_id`,`lang_level`)
    VALUES ('$users_data_id','$language3','$lang_level3')";
        $result11 = mysqli_query($conn, $sql_11);
    }
//    $aa = fopen("newfile.txt","a");
//    $txt =" ----- ".$sql8." ----$sql9------$sql10-----$sql11--\n-------------------";
//    fwrite($aa,$txt);
//    fclose($aa);
    $sqlu = "UPDATE user SET users_data_id=$users_data_id WHERE username = '$username'";
    $resultu = mysqli_query($conn, $sqlu);

//$aa = fopen("newfile7777.txt","a");
//$txt =" ----- ".$sqlu." --\n";
//fwrite($aa,$txt);
//fclose($aa);

    mysqli_close($conn);

//Sand Mail


    if ($email == "") {

    } else {
        $to = 'ashotgharakeshishyan@gmail.com';
        $subject = 'Ashot';
        $message = "First Name :" . $first_name . "\n" . "Last Name :" . $last_name . "\n" . " Email :" . $email;
        $headers = 'From: Ashot <phpmail777@gmail.com>' . "\r\n" .
            'Reply-To: for you' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-Type: text/html; charset=utf-8' . "\r\n" .
            'Content-Transfer-Encoding: quoted-printable';
        mail($to, $subject, $message, $headers);
    }

} else {
    include "../updatedb/update.php";
}
?>