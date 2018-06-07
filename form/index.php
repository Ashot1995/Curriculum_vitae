<?php
session_start();
$username = $_SESSION['username'];

include_once "../db.php";
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:index.php?err=1');
    header('location:../index.php');
    unset($_SESSION['password']);
    session_destroy();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YOUR CV</title>
    <link rel="shortcut icon" href="img/image1.gif">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="image/imageJs/bootstrap3.min.css">-->
    <link rel="stylesheet" href="image/imageJs/croppie.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="fonts/glyphicons-halflings-regular.svg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="new_js/jquery.js"></script>
    <script src="new_js/jquery-ui.js"></script>

    <!--    <script src="image/imageJs/imageJquery.js"></script>-->
    <script src="image/imageJs/imageCroppie.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

</head>
<body>


<nav class="navbar navbar-default">
    <div class=" navbar2">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <?php

            if ($username == "admin") {
                ?>
                <a href="../admin.php"><img src="img/image1.jpg" class="imgCv imgCv2"></a>
                <?php
            } else if ($username != "admin") {
                ?>
                <a class="navbar-brand" href="">
                    <a href="index.php"><img src="img/image1.jpg" class="imgCv imgCv2"></a>
                </a>
                <?php
            }

            ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">

            <?php

            if ($username == "admin") {
                ?>
                <a class="navbar-brand" href="../admin.php">
                    <h3 class="navbar-brand2 h3nav">MyWebSite</h3>
                </a>
                <a href="../table_data_users/table.php" class="navbar-brand users">
                    <h4 class="navbar-brand2 h4nav"> Users</h4>
                </a>
                <?php
            } else if ($username != "admin") {
                ?>
                <a class="navbar-brand" href="">
                    <h3 class="navbar-brand2">MyWebSite</h3>
                </a>
                <?php
            }

            ?>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="dropdown row">
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                        <img src="../form/img/new.jpg" class="img" id="menuImg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 colName">
                    <a href="#" class="yourUsername"><b><?= $_SESSION['username'] ?></b></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </div>

                <div class="dropdown-content">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../change_password/changepass.php">
                                <h4 class="logOut"><span class="glyphicon glyphicon-lock"></span>Change password</h4>
                            </a>
                        </li>
                        <hr class="miniImg">
                        <li>
                            <a href="../logout.php">
                                <h4 class="logOut"><span class="glyphicon glyphicon-log-in"></span> Log out</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<div class="">

    <div class="col-md-2 col-sm-1"></div>

    <div class="col-md-8 col-sm-10 col-xs-12 div1">
        <div class="col-md-12 col-sm-12 col-xs-12 form">
            <h1 id="cv" class="panel-body"><b>Curriculum Vitae (CV)</b></h1>

            <div class="col-md-12 col-sm-12 col-xs-12 ">

                <div class="col-md-5 col-sm-12 name">
                    <form class=" x" id="one">
                        <div class="col-md-12 col-sm-12 col-xs-12 inputs" id="fn">
                            <label>First Name <span class="mandatory">*</span></label>

                            <input type="text" class="btn btn-default target letters border_color" id="first" placeholder="e.g John"
                                   name="first_name">
                            <span class="error1 error" style="display: none"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inputs" id="l">
                            <label>Last Name <span class="mandatory">*</span></label>
                            <input type="text" class=" btn btn-default target letters border_color" id="last"
                                   placeholder="e.g Smith" name="last_name">
                            <span class="error2 error" style="display: none"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inputs" id="m">
                            <label>Middle Name <span class="mandatory">*</span></label>
                            <input type="text" class="btn btn-default target letters border_color" id="middle"
                                   placeholder="e.g Jorge" name="middle_name">
                            <span class="error3 error" style="display: none"></span>
                        </div>
                        <div id="eMail" class="col-md-12 col-sm-12 col-xs-12 inputs">
                            <label>Email <span class="mandatory">*</span></label>
                            <input type="email" class="btn btn-default target" id="email" placeholder="e.g jonesmith@gmail.com"
                                   name="mail">
                            <span class="error4 error" style="display: none"></span>
                        </div>
                        <div class="row input_fields_wrap2 col-md-12 col-sm-12 col-xs-12 inputs">
                            <div class=" col-md-8 col-sm-8 col-xs-8" id="t">
                                <label>Telephone <span class="mandatory">*</span></label>
                                <input type="text" class="btn btn-default target numbers" placeholder="(+374)77-99-99-99"
                                       id="txtChar0" value="" name="telephone0" id="teldis">
                                <span class="error5 error" style="display: none"></span>

                            </div>
                            <div class=" col-md-4 col-sm-4 col-xs-4">
                                <button class=" add_field_button2 add_field openLabel">
                                    Add  <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-7 col-sm-12" id="none">
                    <div id="upload-demo" class="my-text-field2"></div>
                    <div id="upload-demo-i" class="my-text-field">

                    </div>
                    <div id="note" style="display: none"><h4>Image uploaded </h4></div>
                    <div class="col-md-1" id="aa"></div>
                    <div class="col-md-10 " id="bb">
                        <label for="upload" class="openL openLabel">Open <i class="fa fa-file-image-o"></i></label>
                        <input type="file" class="hide inputfile" id="upload" name="image_path" multiple/>
                        <label class="btn2 upload-result">Crop <span class="fa fa-scissors"></span></label>
                        <label class="deletImage"></label>
                    </div>
                    <div class="col-md-1" id="cc"></div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <form id="two">
                    <div >
                        <br>

                        <label id="persTit">Personal skills</label>
                        <textarea class="btn btn-default target about border_color" id="persSkills" rows="5"
                                  name="pers_description"
                                  placeholder="e.g Intelligent,professional,sense of humor , ․․․․․․"></textarea>
                    </div>

                    <hr>

                    <h3 class="title">Personal information <span class="mandatory">*</span></h3>
                    <div class="persInf">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12" id="d">
                                <label>Date of Birth <span class="mandatory">*</span></label>
                                <input type="text" id="birthdate" class="btn btn-default target date"
                                       placeholder="yyyy-mm-dd" name="date">
                                <span class="error10 error" style="display: none"></span>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12" id="g">
                                <label>Gender <span class="mandatory">*</span></label>
                                <select class="btn btn-default target " id="gender" name="gender">
                                    <option value="">Select your gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <span class="error11 error" style="display: none"></span>

                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label>Maritial status</label>
                                <select class="btn btn-default target" id="marStatus" name="marital_status">
                                    <option value="">Select Marital status</option>
                                    <option>Married</option>
                                    <option>Single</option>
                                    <option>Separated</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
                                </select>

                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label>Nationality</label>
                                <select class="btn btn-default target" id="national" name="nationality">
                                    <option value="">Select your Nationality</option>
                                    <?php
                                    include "../select/nationality.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12" id="c">
                                <label for="">Country <span class="mandatory">*</span></label>
                                <select id="country" class="btn btn-default target selectOpt" name="country_id">
                                    <option value="" class="country">Select your country</option>
                                    <?php
                                    include "../select/country.php";
                                    ?>
                                </select>
                                <span class="error12 error" style="display: none"></span>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12" id="r">
                                <label for="">Region <span class="mandatory">*</span></label>
                                <select id="region" class="btn btn-default target " name="region_id">
                                    <option value="" class="region">Select your region</option>
                                </select>
                                <span class="error13 error" style="display: none"></span>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12" id="c_v">
                                <label for="">City / Village <span class="mandatory">*</span></label>
                                <select id="city" class="btn btn-default target " name="city_id">
                                    <option value="" class="city"> Select your City/Village</option>
                                </select>
                                <span class="error14 error" style="display: none"></span>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12" id="a">
                                <label>Address <span class="mandatory">*</span></label>
                                <input type="text" class="btn btn-default target border_color" id="address"
                                       placeholder="e.g 1 Main Street." name="address">
                                <span class="error15 error" style="display: none"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <form id="three">
                    <h3 class="title">Education and training <span class="mandatory">*</span></h3>
                    <div class="educDel ">
                        <div class="persInf ">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Institution name <span class="mandatory">*</span></label>
                                <input type="text" class="btn btn-default target letters border_color" id="institut0"
                                       placeholder="e.g Harvard" name="name"/>
                                <span class="error16 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Profession <span class="mandatory">*</span></label>
                                <input type="text" class="btn btn-default target letters border_color" id="prof0"
                                       placeholder="e.g Economist" name="Profession_name"/>
                                <span class="error17 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Academic Degree <span class="mandatory">*</span></label>
                                <input type="text" class="btn btn-default target letters border_color" id="academic0"
                                       placeholder="e.g Master" name="academic_degree"/>
                                <span class="error18 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <label>From <span class="mandatory">*</span></label>
                                <input class="date1 btn btn-default target " id="from0" type="text"
                                       placeholder="yyyy-mm-dd" name="start_date1">
                                <span class="error19 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-4 col-sm-9 col-xs-9">
                                <label>To <span class="mandatory">*</span></label>
                                <input class="date1 btn btn-default target p0 " id="to0" type="text"
                                       placeholder="yyyy-mm-dd" name="end_date1">
                                <span class="error20 error"  style="display: none"></span>
                            </div>

                            <div class="col-md-2 col-sm-3 col-xs-3">
                                <input type="checkbox" class="ongoing0 ong ">
                                <p class="pp0" style="display: inline" id="going">Ongoing</p>
                                <p class="ppp0" style="display: none" id="going">Going</p>
                            </div>

                            <div class="col-md-2 col-sm-12 col-xs-12 newAdd0">
                                <button class="educDel2 openLabel" id="">
                                    Add <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <form id="four">
                    <h3 class="title">Work experience</h3>
                    <div class="delWork">
                        <div class="persInf ">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Company</label>
                                <input type="text" id="company0" class="btn btn-default target letters w0 border_color"
                                       placeholder="e.g Microsoft" name="company">
                                <span class="error36 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <label>Position</label>
                                <input type="text" id="position0" class="btn btn-default target letters w1 border_color"
                                       placeholder="e.g Web Developer" name="position_name">
                                <span class="error37 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <label>From</label>
                                <input class="date1 btn btn-default target w2 " id="from2_0" type="text"
                                       placeholder="yyyy-mm-dd" name="start_date2">
                                <span class="error38 error"  style="display: none"></span>
                            </div>
                            <div class="col-md-4 col-sm-9 col-xs-9 ">
                                <label>To</label>
                                <input class="date1 btn btn-default target s0 w3 " id="to2_0" type="text"
                                       placeholder="yyyy-mm-dd" name="end_date2">
                                <span class="error39 error"  style="display: none"></span>
                            </div>

                            <div class="col-md-4 col-sm-3 col-xs-3">
                                <input type="checkbox" class="ongoing20">
                                <p class="ss0" style="display: inline" id="going">Ongoing</p>
                                <p class="sss0" style="display: none" id="going">Going</p>
                            </div>
                            <div class="col-md-10">
                                <label >Main activities and responsibilities </label>
                            </div>
                            <div class="x2 col-md-9 col-sm-12 col-xs-12">
                            <textarea class="btn btn-default target about w4 border_color" id="actResp0" name="main_res"
                                      placeholder="e.g Programist senior developer..."></textarea>
                                <span class="error40 error"  style="display: none"></span>
                            </div>

                            <div class="col-md-3 col-sm-12 col-xs-12 newAdd2_0">
                                <button class="delWork2 openLabel" id="">
                                    Add <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </div>

                        </div>
                        <input type="hidden" id="text5" style="display: block">
                    </div>
                </form>
                <hr>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <form id="five">
                    <h3 class="x">Professional skills</h3>
                    <div class=" persInf input_fields_wrap3" id="skill">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Skills</label>
                            <input type="text" id="skills0" class="btn btn-default target letters border_color"
                                   placeholder="e.g JavaScript" name="skills_name">
                            <span class="error56 error"  style="display: none"></span>

                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <label>Level</label>
                            <select class="btn btn-default target selectOpt" id="skillsLev0" name="level_name">
                                <option value="">Select level</option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                                <option>Expert</option>
                            </select>
                            <span class="error57 error"  style="display: none"></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <button class="add_field_button3 add_field openLabel" id="skills">
                                Add
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div >
                <img src="img/load.gif" alt="" id="load" style="height: 100px;width: 100px;z-index: 1000;margin:-120px auto;display: none">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <form id="six">
                    <h3 class="title">Language skills<span class="mandatory">*</span></h3>
                    <div class=" persInf input_fields_wrap" id="lang">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Language<span class="mandatory">*</span></label>
                            <select class="btn btn-default target selectOpt" id="langs1" name="language">
                                <option value="">Language</option>
                            </select>
                            <span class="error64 error" style="display: none"></span>

                        </div>


                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <label>Level<span class="mandatory">*</span></label>
                            <select class="btn btn-default target selectOpt" id="langsLev1" name="lang_level">
                                <option value="">Select level</option>
                                <option>Basic User</option>
                                <option>Independent User</option>
                                <option>Fluent User</option>
                                <option>Proficient User</option>
                            </select>
                            <span class="error65 error" style="display: none"></span>

                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <button class="add_field_button add_field openLabel" id="">
                                Add <span class="glyphicon glyphicon-plus"></span>
                            </button>

                        </div>
                    </div>

                </form>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 click" >
                <input type="button" class="btn btn-success openLabel" id="submit" name="submit111"
                       value="- S U B M I T -">
            </div>

        </div>
    </div>

    <div class="col-md-2 col-sm-1"></div>

</div>


<div id="basicModal" class="col-md-8 col-sm-8 col-xs-10">
    <h4 class="titleTable">Personal information </h4>

    <table style="width:100%">
        <tbody>
        <tr>
            <th>First Name</th>
            <td id="firstTd"></td>
            <td class="imageTh" rowspan="5">
                <img src="img/img.png" id="imageTd" width="60%">
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td id="lastTd"></td>
        </tr>
        <tr>
            <th>Middle Name</th>
            <td id="middleTd"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td id="emailTd"></td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td id="mobileTd"></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td id="datepickerTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td id="genderTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td id="nationalTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Country</th>
            <td id="countryTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Region</th>
            <td id="regionTd" colspan="2"></td>
        </tr>
        <tr>
            <th>City</th>
            <td id="cityTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Address</th>
            <td id="addressTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Maritial status</th>
            <td id="marStatusTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Personal skills</th>
            <td id="persSkillsTd" colspan="2"></td>
        </tr>
        </tbody>
    </table>

    <br>

    <h4 class="titleTable">Education and training </h4>
    <div id="insts"></div>

    <h4 class="titleTable" id="workTitle">Work experience </h4>
    <div id="works"></div>

    <h4 class="titleTable" id="profTitle">Professional skills </h4>
    <div id="profTable">
        <table style="width:100%">
            <tr>
                <th>Skills</th>
                <th>Level</th>
            </tr>
        </table>
    </div>
    <br>

    <h4 class="titleTable">Language skills </h4>
    <div id="langTable">
        <table style="width:100%">
            <tr>
                <th>Language</th>
                <th>Level</th>
            </tr>
        </table>
    </div>
</div>

</body>

<script src="js/index.js"></script>
<script src="js/jquery.js"></script>
<script src="image/image.js"></script>
<script>


    $(window).load(function () {

        $.ajax({
            url: 'updatedb/upd_sel.php',
            type: 'post',
            dataType: "json",
            success: function (data) {
                // console.log(data);
                for (var i = 1; i < data.length; i++) {

                    if (data[i]['users_data_id'] == data[0]['users_data_id']) {

                        $("#first").val(data[i]['first_name']);
                        $("#last").val(data[i]['last_name']);
                        $("#middle").val(data[i]['middle_name']);
                        $("#email").val(data[i]['mail']);
                        if(data[i]['image_path']!=""){
                        $("#menuImg").attr('src',data[i]['image_path'])
                        }
                        $("#txtChar0").val(data[i]['telephone']);

                        for(var j=1; j<5; j++){

                            if( data[i]['telephone'+j ] != "" ){

                                $(".input_fields_wrap2").append('<div class="numb" ><div class="col-md-8 col-sm-8 col-xs-8 border_color" id="telo" >' +
                                    '<input type="text" class="btn btn-default target numbers border_color" placeholder="(+374)-77-99-99-99" ' +
                                    'id="txtChar'+j+'" name="telephone'+j+'"><span class="error'+(j+5)+'  error" style="display:none"></span></div>' +
                                    '<div class="col-md-4 col-sm-4 col-xs-4" ><button class="remove_field xxx" >' +
                                    'Delete <i class="fa fa-remove"></i></button></div></div>');
                                $("#txtChar"+j).val(data[i]['telephone'+j]);

                                $('input').keyup(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                            }

                        }


                        var img_src = data[i]["image_path"];

                        if (  data[i]["image_path"] == ""  && $(".croppie-container").css({ backgroundImage : "img/new.jpg" } )) {
                            $("#imageTd").attr("src") == "img/new.jpg";
                            $("#menuIm").html("<img src = 'img/new.jpg' class='img'>");

//                            console.log( "ggg" )
                        }

                        if( data[i]["image_path"] != "" ) {

                            $("#upload-demo").css("display","none");
//                            $(".deletImage").css("display") == "none";
                            $(".openL").css("display","none");
                            $(".btn2").css("display","none");

                            $("#upload-demo-i").css("display") == "block";
                            $(".deletImage").html('<button type="reset" id="del" class="xx">' +
                                'Delete  <span class="fa fa-remove"></span></button>');
                            $('#note').css("display","block");
                            $(".imageTh").html('<img src='+ img_src +' width="60%">');

                            $("#upload-demo-i").html('<img src=' + img_src + ' class="newImg"  ' +
                                'alt="cropImage" name="imageName" style="width: 65%;' +
                                ' border: 7px solid rgb(70, 104, 166); padding: 5px;">');
                        }


//                        var img_src = data[i]["image_path"];
//                        console.log(data[i])
//                        if (data[i]["image_path"] == "") {
//
//                        } else {
//                            $("#upload-demo").css("display", "none");
//                            $(".deletImage").css("display", "block");
//                            $(".openL").css("display", "none");
//                            $(".btn2").css("display", "none");
//                            $("#upload-demo-i").css("display", "block");
//                            $(".deletImage").html('<button type="reset" id="del" class="xx">' +
//                                'Delete  <span class="fa fa-remove"></span></button>');
//                            // $(".cr-vp-square").css("marginLeft", "1px")
//                            $("#upload-demo-i").html('<img src=' + img_src + ' class="newImg"  alt="cropImage" name="imageName" style="width: 65%; border: 7px solid rgb(70, 104, 166); padding: 5px;">');
//                        }



                        $("#persSkills").val(data[i]['last_name']);
                        $("#birthdate").val(data[i]['date_of_birth']);
                        $("#gender").val(data[i]['gender']);
                        $("#marStatus").val(data[i]['marital_status']);

                        var nat_name = data[i]['nationality_name'];

                        $("#national option").each(function () {
                            if ( $(this).text() == nat_name && nat_name != "" ) {
                                $(this).attr("selected", "selected");
                            }
                        });

                        var country_name = data[i]['country_id'];
                        $("#country option").each(function () {
                            if ($(this).val() == country_name) {
                                $(this).attr("selected", "selected");
                                $(this).change();

                            }
                        });
                        var region_id = data[i]['region_id'];
                        setTimeout(function () {

                            $("#region option").each(function () {
                                if ($(this).val() == region_id) {
                                    $(this).attr("selected", "selected");
                                    $(this).change();
                                }
                            })
                        }, 700);
                        var city_id = data[i]['city_id'];
                        setTimeout(function () {

                            $("#city option").each(function () {
                                if ($(this).val() == city_id) {
                                    $(this).attr("selected", "selected");
                                    $(this).change();
                                }
                            })
                        }, 3000);


                        $("#address").val(data[i]['address']);




                        if (data[i]['institution_name']) {
                            $("#institut0").val(data[i]['institution_name']);
                            $("#prof0").val(data[i]['Profession_name']);
                            $("#academic0").val(data[i]['academic_name']);
                            $("#from0").val(data[i]['start_date']);
                            $("#to0").val(data[i]['end_date']);
                            $("#addb").css("display", "none")
                        }

                        var x ;
                        var er ;

                        for( x = 1, er = 20; x<4, er<35; x++, er+=5 ){

                            if(data[i]['institution_name' + x ] != "" ) {

                                $('.educDel').append('<div class="persInf newDiv2  xx'+x+' ">' +
                                    '<img src="img/image3.png" class="image3 remove_field">' +
                                    '<div class = "col-md-12" ><label> Institution name *</label>' +
                                    '<input type="text" class="btn btn-default target letters" id="institut'+x+'" ' +
                                    'placeholder="Institution name" name="name'+x+'"/><span class="error'+(er+1) +' error">' +
                                    '</span> </div><div class="col-md-6"><label>Profession *</label>' +
                                    '<input type="text" class="btn btn-default target letters" id="prof'+x+'" ' +
                                    'placeholder="Profession" name="Profession_name'+x+'"><span class="error'+(er+2) +' error"></span>' +
                                    '</div><div class="col-md-6"><label>Academic Degree *</label>' +
                                    '<input type="text" class="btn btn-default target letters"' +
                                    'id="academic'+x+'" placeholder="Academic Degree"' +
                                    ' name="academic_degree'+x+'"><span class="error'+(er+3) +' error"></span></div><div class="col-md-4 col-xs-12">' +
                                    '<label>From *</label><input class="date1 btn btn-default target" id="from'+x+'" type="text"' +
                                    ' placeholder="yyyy-mm-dd" name="start_date1'+x+'"><span class="error'+(er+4) +' error"></span></div>' +
                                    '<div class="col-md-4 col-xs-9"><label>To *</label>' +
                                    '<input class="date1 btn btn-default target p'+x+'" id="to'+x+'" ' +
                                    'type="text" placeholder="yyyy-mm-dd" name="end_date1'+x+'" >' +
                                    '<span class="error'+(er+5)+' error"></span></div>' +
                                    '<div class="col-md-2 col-xs-3" ><input type="checkbox" class="ong ongoing'+x+'" >'+
                                    '<p class="pp'+x+'" style="display: inline">Ongoing</p>'+
                                    '<p class="ppp'+x+'" style="display: none">Going</p></div>'+
                                    '<div class="col-md-2 col-xs-12 newAdd'+x+' " > </div></div>');

                                $('input').keyup(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                                $('.date1').datepicker({
                                    format: 'yyyy-mm-dd',
                                    endDate: new Date()
                                });

                                $("#institut" + x).val(data[i]['institution_name' + x]);
                                $("#prof" + x).val(data[i]['Profession_name' + x]);
                                $("#academic" + x).val(data[i]['academic_name' + x]);
                                $("#from" + x).val(data[i]['start_date' + x]);
                                $("#to" + x).val(data[i]['end_date' + x]);


                                if (x == 1) {
                                    $x = $(".educDel2").detach();
                                    $(".newAdd" + x).prepend($x);

                                    $(".ongoing1").on("click", function(){


                                        if(  $('.ongoing1').prop("checked") ) {
                                            $(".p1").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".pp1").css({display:"none"});
                                            $(".ppp1").css({display:"inline"});
                                            // $(".error20").html("").css({display:"none"});
                                        }
                                        else {
                                            $(".p1").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".ppp1").css({display:"none"});
                                            $(".pp1").css({display:"inline"});
                                        }
                                    })
                                }
                                else if (x == 2) {
                                    $x = $(".educDel2").detach();
                                    $(".newAdd" + x).prepend($x);

                                    $(".ongoing2").on("click", function(){

                                        if(  $('.ongoing2').prop("checked") ) {
                                            $(".p2").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".pp2").css({display:"none"});
                                            $(".ppp2").css({display:"inline"});
                                            // $(".error"+(er+5)).html("").css({display:"none"});
                                        }
                                        else {
                                            $(".p2").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".ppp2").css({display:"none"});
                                            $(".pp2").css({display:"inline"});
                                        }
                                    })
                                }
                                else if( x == 3 ){
                                    $x = $(".educDel2").detach();
                                    $(".newAdd"+x).prepend($x);

                                    $(".ongoing3").on("click", function(){

                                        if(  $('.ongoing3').prop("checked") ) {
                                            $(".p3").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".pp3").css({display:"none"});
                                            $(".ppp3").css({display:"inline"});
                                            // $(".error"+(er+5)).html("").css({display:"none"});
                                        }
                                        else {
                                            $(".p3").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".ppp3").css({display:"none"});
                                            $(".pp3").css({display:"inline"});
                                        }
                                    })
                                }


                                $(".ongoing"+(x-1)).css({pointerEvents:'none'});

                            }
                        }


                        $("#company0").val(data[i]['company_name']);
                        $("#position0").val(data[i]['position_name']);
                        $("#from2_0").val(data[i]['start_date2']);
                       if($("#from2_0").val() == '0000-00-00'){
                           $("#from2_0").val("")
                       }
                        $("#to2_0").val(data[i]['end_date2']);
                       if($("#to2_0").val() == '0000-00-00'){
                           $("#to2_0").val("")
                       }
                        $("#actResp0").val(data[i]['main_res']);



                        var x ;
                        var err ;

                        for( x = 1, err = 40; x<4, err<55; x++, err+=5 ){

                            if(  data[i]['company_name' + x ] != "" ) {
                                $('.delWork').append('<div class="persInf newDiv2 ">' +
                                    '<img src="img/image3.png" class="image3 remove_field2">' +
                                    '<div class="col-md-6"><label>Company</label> ' +
                                    '<input type="text" class="btn btn-default target letters" id="company'+x+'"' +
                                    ' placeholder="Company" name="company'+x+'"><span class="error'+(err+1) +' error"></span> </div><div class="col-md-6 topMin"> ' +
                                    '<label>Position</label><input type="text" class="btn btn-default target letters"' +
                                    'id="position'+x+'" placeholder="Position" name="position_name'+x+'"><span class="error'+(err+2) +' error"></span> </div>' +
                                    '<div class="col-md-4 col-xs-12"><label>From</label>' +
                                    '<input class="date1 btn btn-default target" id="from2_'+x+'" ' +
                                    'type="text" placeholder="yyyy-mm-dd" name="start_date2'+x+'"><span class="error'+(err+3) +' error"></span></div>' +
                                    '<div class="col-md-4 col-xs-9"><label>To</label>' +
                                    '<input class="date1 btn btn-default target s'+x+'" id="to2_'+x+'" type="text" ' +
                                    ' placeholder="yyyy-mm-dd" name="end_date2'+x+'"><span class="error'+(err+4) +' error"></span></div>' +
                                    '<div class="col-md-4 col-xs-3" ><input type="checkbox" class="ongoing2'+x+'">' +
                                    '<p class="ss'+x+'" style="display: inline">Ongoing</p>' +
                                    '<p class="sss'+x+'" style="display: none">Going</p></div>'+
                                    '<div class="col-md-12"><label class="">Main activities and responsibilities </label></div>' +
                                    '<div class="x2 col-md-9">' +
                                    '<textarea class="btn btn-default target about" id="actResp'+x+'" name="main_res'+x+'"></textarea>' +
                                    '<span class="error'+(err+5) +' error"></span></div>' +
                                    '<div class="col-md-3 newAdd2_'+x+' " > </div></div>');

                                $( "textarea" ).keyup(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                                $('input').keyup(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                                $('.date1').datepicker({
                                    format: 'yyyy-mm-dd',
                                    endDate: new Date()
                                });

                                $("#company"+x).val(data[i]['company_name'+x]);
                                $("#position"+x).val(data[i]['position_name'+x]);
                                $("#from2_"+x).val(data[i]['start_date2_'+x]);
                                console.log(data)
                                $("#to2_"+x).val(data[i]['end_date2_'+x]);
                                $("#actResp"+x).val(data[i]['main_res'+x]);

                                if (x == 1) {
                                    $x = $(".delWork2").detach();
                                    $(".newAdd2_" + x).prepend($x);


                                    $(".ongoing21").on("click", function(){

                                        if($('.ongoing21').prop("checked")) {
                                            $(".s1").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".ss1").css({display:"none"});
                                            $(".sss1").css({display:"inline"});
                                            $(".error"+(err+5)).html("").css({display:"none"});
                                        }
                                        else {
                                            $(".s1").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".sss1").css({display:"none"});
                                            $(".ss1").css({display:"inline"});
                                        }
                                    });
                                }
                                else if (x == 2) {
                                    $x = $(".delWork2").detach();
                                    $(".newAdd2_" + x).prepend($x);

                                    $(".ongoing22").on("click", function(){


                                        if($('.ongoing22'+x).prop("checked")) {
                                            $(".s2").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".ss2").css({display:"none"});
                                            $(".sss2").css({display:"inline"});
                                            $(".error"+(err+5)).html("").css({display:"none"});
                                        }
                                        else {
                                            $(".s2").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".sss2").css({display:"none"});
                                            $(".ss2").css({display:"inline"});
                                        }
                                    });
                                }
                                else if( x == 3 ){
                                    $x = $(".delWork2").detach();
                                    $(".newAdd2_"+x).prepend($x);

                                    $(".ongoing23").on("click", function(){

                                        if($('.ongoing23').prop("checked")) {
                                            $(".s3").css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                                            $(".ss3").css({display:"none"});
                                            $(".sss3").css({display:"inline"});
                                            $(".error"+(err+5)).html("").css({display:"none"});
                                        }
                                        else {
                                            $(".s3").css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                                            $(".sss3").css({display:"none"});
                                            $(".ss3").css({display:"inline"});
                                        }
                                    });
                                }

                                $(".ongoing2"+(x-1)).css({pointerEvents:'none'});

                            }
                        }


                        $("#skills0").val(data[i]['skills_name']);

                        var sk_name = data[i]['level_name'];

                        $("#skillsLev0 option").each(function () {
                            if ( $(this).text() == sk_name && sk_name != "" ) {
                                $(this).attr("selected", "selected");
                            }
                        });

                        var j ;
                        var sk ;

                        for ( j=1, sk = 55; j<4, sk < 61;  j++, sk+= 2 ){

                            if( data[i]['skills_name'+j ] != "" ){
                                $("#skill").append('<div class="langDiv"><div class="col-md-6 col-sm-6 col-xs-6">' +
                                    '<input type="text" id="skills'+j+'" class="btn btn-default target letters" placeholder="Skills" ' +
                                    'name="skills_name'+j+'"><span class="error'+(sk+1)+' error"></span></div><div class="col-md-3 col-sm-3 col-xs-3">' +
                                    '<select id="skillsLev'+j+'" class="btn btn-default target selectOpt" name="level_name'+j+'">' +
                                    '<option value="">Level</option><option>Beginner</option><option>Intermediate</option><option>Advanced</option>' +
                                    '<option>Expert</option></select><span class="error'+(sk+2) +' error"></span></div>' +
                                    '<div class="col-md-3 col-sm-3 col-xs-3 "><button class="remove_field xxx xx3" >' +
                                    'Delete <i class="fa fa-remove"></i></button></div></div>');

                                $("#skills"+j).val(data[i]['skills_name'+j]);
                                $("#skillsLev"+j).val(data[i]['level_name'+j]);

                                $( "select" ).click(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                                $('input').keyup(function() {
                                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                });

                            }
                        }

                        var lang_name = data[2]['language_id'];

                        $("#langs1 option").each(function () {
                            if ( $(this).val() == lang_name && lang_name != "" ) {
                                $(this).attr("selected", "selected");
                            }
                            $("#langsLev1").val(data[2]['lang_level']);
                        });

                        $("#langsLev1").val(data[2]['lang_level']);


                        var y ;
                        var lg = 65 ;

                        var len = data.length;


                        for ( y = 3 ; y < len; y++ ) {

                            $('#lang').append('<div class="langDiv2"><div class="col-md-6 col-sm-6 col-xs-6">' +
                                '<div><select class="btn btn-default target selectOpt" id="langs' + (y-1) + '" ' +
                                'name="language' + (y-1) + '" selected="selected"><option value="">Language</option>' +
                                '<option value="1">English</option><option value="2">Afar</option><option value="3">Abkhazian</option>' +
                                '<option value="4">Afrikaans</option><option value="5">Amharic</option><option value="6">Arabic</option>' +
                                '<option value="7">Assamese</option><option value="8">Aymara</option><option value="9">Azerbaijani</option>' +
                                '<option value="10">Bashkir</option><option value="11">Belarusian</option>' +
                                '<option value="12">Bulgarian</option><option value="13">Bihari</option>' +
                                '<option value="14">Bislama</option><option value="15">Bengali/Bangla</option>' +
                                '<option value="16">Tibetan</option><option value="17">Breton</option><option value="18">Catalan</option>' +
                                '<option value="19">Corsican</option><option value="20">Czech</option><option value="21">Welsh</option>' +
                                '<option value="22">Danish</option><option value="23">German</option><option value="24">Bhutani</option>' +
                                '<option value="25">Greek</option><option value="26">Esperanto</option><option value="27">Spanish</option>' +
                                '<option value="28">Estonian</option><option value="29">Basque</option><option value="30">Persian</option>' +
                                '<option value="31">Finnish</option><option value="32">Fiji</option><option value="33">Faeroese</option>' +
                                '<option value="34">French</option><option value="35">Frisian</option><option value="36">Irish</option>' +
                                '<option value="37">Scots/Gaelic</option><option value="38">Galician</option>' +
                                '<option value="39">Guarani</option><option value="40">Gujarati</option><option value="41">Hausa</option>' +
                                '<option value="42">Hindi</option><option value="43">Croatian</option><option value="44">Hungarian</option>' +
                                '<option value="45">Armenian</option><option value="46">Interlingua</option>' +
                                '<option value="47">Interlingue</option><option value="48">Inupiak</option>' +
                                '<option value="49">Indonesian</option><option value="50">Icelandic</option>' +
                                '<option value="51">Italian</option><option value="52">Hebrew</option><option value="53">Japanese</option>' +
                                '<option value="54">Yiddish</option><option value="55">Javanese</option><option value="56">Georgian</option>' +
                                '<option value="57">Kazakh</option><option value="58">Greenlandic</option><option value="59">Cambodian</option>' +
                                '<option value="60">Kannada</option><option value="61">Korean</option><option value="62">Kashmiri</option>' +
                                '<option value="63">Kurdish</option><option value="64">Kirghiz</option><option value="65">Latin</option>' +
                                '<option value="66">Lingala</option><option value="67">Laothian</option><option value="68">Lithuanian</option>' +
                                '<option value="69">Latvian/Lettish</option><option value="70">Malagasy</option><option value="71">Maori</option>' +
                                '<option value="72">Macedonian</option><option value="73">Malayalam</option><option value="74">Mongolian</option>' +
                                '<option value="75">Moldavian</option><option value="76">Marathi</option><option value="77">Malay</option>' +
                                '<option value="78">Maltese</option><option value="79">Burmese</option><option value="80">Nauru</option>' +
                                '<option value="81">Nepali</option><option value="82">Dutch</option><option value="83">Norwegian</option>' +
                                '<option value="84">Occitan</option><option value="85">(Afan)/Oromoor/Oriya</option>' +
                                '<option value="86">Punjabi</option><option value="87">Polish</option><option value="88">Pashto/Pushto</option>' +
                                '<option value="89">Portuguese</option><option value="90">Quechua</option><option value="91">Rhaeto-Romance</option>' +
                                '<option value="92">Kirundi</option><option value="93">Romanian</option><option value="94">Russian</option>' +
                                '<option value="95">Kinyarwanda</option><option value="96">Sanskrit</option><option value="97">Sindhi</option><option value="98">Sangro</option><option value="99">Serbo-Croatian</option><option value="100">Singhalese</option><option value="101">Slovak</option><option value="102">Slovenian</option><option value="103">Samoan</option><option value="104">Shona</option><option value="105">Somali</option><option value="106">Albanian</option><option value="107">Serbian</option><option value="108">Siswati</option><option value="109">Sesotho</option><option value="110">Sundanese</option><option value="111">Swedish</option><option value="112">Swahili</option><option value="113">Tamil</option><option value="114">Telugu</option><option value="115">Tajik</option><option value="116">Thai</option><option value="117">Tigrinya</option><option value="118">Turkmen</option><option value="119">Tagalog</option><option value="120">Setswana</option><option value="121">Tonga</option><option value="122">Turkish</option><option value="123">Tsonga</option><option value="124">Tatar</option><option value="125">Twi</option><option value="126">Ukrainian</option><option value="127">Urdu</option><option value="128">Uzbek</option><option value="129">Vietnamese</option><option value="130">Volapuk</option><option value="131">Wolof</option><option value="132">Xhosa</option><option value="133">Yoruba</option><option value="134">Chinese</option><option value="135">Zulu</option>' +
                                '</select><span class="error'+(lg+1)+' error"></span></div></div>' +
                                '<div class="col-md-3 col-sm-3 col-xs-3"><select class="btn btn-default target selectOpt" id="langsLev' + (y-1) + '" name="lang_level' + (y-1) + '">' +
                                '<option value="">Level</option><option>Basic User</option><option>Independent User</option><option>Fluent User</option>' +
                                '<option>Proficient User</option></select><span class="error'+(lg+2)+' error"></span></div>' +
                                '<div class="col-md-3 col-sm-3 col-xs-3"><button class="remove_field xxx xx3">Delete <i class="fa fa-remove"></i></button></div></div>');
                            $('#langs' + (y-1) + ' option').each(function () {
                                if ($(this).val() == data[y]['language_id']) {
                                    $(this).attr("selected", "selected");

                                    $( "select" ).click(function() {
                                        $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                                    });
                                }
                                $('#langsLev' + (y-1)).val(data[y]['lang_level']);
                            });

                            lg = lg + 2
                        }

                        $('.letters').keypress(function(e) {
                            if( e.which < 65 || (e.which >90 && e.which <97) || e.which > 122 ){
                                e.preventDefault();
                            }
                        });

                        $(".numbers").keypress(function(e){
                            if(e.which > 31 && (e.which < 48 || e.which > 57)){
                                e.preventDefault();
                            }
                        });

                        $('.date1').keypress(function(e) {
                            if(e.which<97 || e.which>31 ){
                                e.preventDefault();
                            }
                        })
                    }
                }
            }
        });
    });

</script>


</html>










