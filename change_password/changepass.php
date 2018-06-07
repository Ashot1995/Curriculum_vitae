<?php
    session_start();

//    $pass = $_SESSION['password11'];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Password Change</title>

    <meta charset="utf-8"/>

    <link rel="stylesheet" href="../form/css/bootstrap.min.css">

    <script src="../resource/js/jquery-3.2.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <link rel="stylesheet" href="../form/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/newpass.js"></script>


</head>
<body>


    <nav class="navbarReg navbar-default">
        <div class="row navbar2 navbar2_1">
            <div class="col-md-2 col-sm-2 col-xs-2 one">
                <a href="../index.php"><img src="../form/img/image1.gif" class="imgCv imgCv2"></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <a class="navbar-brand" href="../index.php">
                    <h3 class="navbar-brand_3 h3nav">MyWebSite</h3>
                </a>
            </div>
        </div>
    </nav>


    <div>

        <div class="col-md-4 col-sm-3 col-xs-1"></div>

        <div class="col-md-4 col-sm-6 col-xs-10 bord " >
            <p class="h2 title regTitle col-md-12 col-sm-12 col-xs-12">Change Password</p>

            <form id="form" method="post" action="changepw.php">

                <div class="form-group row">
                    <label for="password" class="title1">Enter your existing password:</label><br>

                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <input type="password" class="inputUP pass555 user password" name="pass" id="password"
                               placeholder="Insert your password" autocomplete="off" onkeyup="checkPasswordStrength()">
                        <span class="glyphicon glyphicon-ok-sign form-control-feedback ok"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback no"></span>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <span class="eye"><i class="fas fa-eye i"></i></span><br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <span id="errPass" class="errorMsg"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="newpassword" class="title1">Enter your new password:</label><br>

                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <input type="password" class="inputUP pass555 user password1" name="password11" id="newpassword"
                               placeholder="Insert your new password" autocomplete="off" onkeyup="checkPasswordStrength1()">
                        <span class="glyphicon glyphicon-ok-sign form-control-feedback ok1"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback no1"></span>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <span class="eye1"><i class="fas fa-eye i1"></i></span><br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <span id="errPass1" class="errorMsg"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirmnewpassword" class="title1">Repeat your new password:</label><br>

                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <input type="password" class="inputUP pass555 user password2" name="confirmnewpassword" id="newpassword2"
                               placeholder="Repeat your new password" autocomplete="off" onkeyup="checkPasswordStrength2()">
                        <span class="glyphicon glyphicon-ok-sign form-control-feedback ok2"></span>
                        <span class="glyphicon glyphicon-remove form-control-feedback no2"></span>

                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <span class="eye2"><i class="fas fa-eye i2"></i></span><br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <span id="errPass2" class="errorMsg"></span>
                    </div>
                </div>

                <div class="buttonLogin col-md-12 col-sm-12 col-xs-12" align="center">
                    <button type="button" class="btn but2 update"  id="submit" >Update Password</button>
                </div>

                <div id="basicModal">

                </div>

            </form>
        </div>

        <div class="col-md-4 col-sm-3 col-xs-1"></div>

    </div>


</body>

<script>

    function checkPasswordStrength() {

        var pass = $(".password").val();

        $.ajax({
            type:"POST",
            url:"changepw.php",
            data: {
                'pass': pass
            },
            dataType:"json",
            success:function(result){

                if(result['result'] == 'true' ){

                    $("#password").css("border","1px solid green");
                    $("#errPass").html("");
                    $('.ok').css({color: 'green', display: 'block'});
                    $('.no').css({display: 'none'});
                }
                else{
                    $('.no').css({color: 'red', display: 'block'});
                    $('.ok').css({display: 'none'});
                    $("#password").css("border","1px solid red");
                    $("#errPass").html("*Please write the password !");
                }
            }
        })

    }

    function checkPasswordStrength1() {

        var pattern1 = new RegExp("^(?=.*[A-Za-z0-9])(?=.*)[A-Za-z0-9]{6,}$");
        var pattern2 = new RegExp("^(?=.*[A-Za-z0-9])(?=.*[#?!@$%^&*-])[A-Za-z0-9#?!@$%^&*-]{6,}$");


        if ($('#newpassword').val().length < 6) {
            $('.no1').css({color: 'red', display: 'block'});
            $('.ok1').css({display: 'none'});
            $("#newpassword").css("border","1px solid red");
            $("#errPass1").html("*Please write the new password !");

            if ($('#newpassword').val() == "") {
                $('.no1').css('display', 'none')
            }
        }
        else if($('#newpassword').val().length > 5 && $('#newpassword').val() == $('#password').val() ){
            $('.no1').css({color: 'red', display: 'block'});
            $('.ok1').css({display: 'none'});
            $("#newpassword").css("border","1px solid red");
            $("#errPass1").html("*Please write the new password !");
        }
        else if( pattern1.test($('#newpassword').val()) === false && pattern2.test($('#newpassword').val()) === false ){
            $('.no1').css({color: 'red', display: 'block'});
            $('.ok1').css({display: 'none'});
            $("#newpassword").css("border","1px solid red");
            $("#errPass1").html("*Please write the new password !");
        }
        else if( $('#newpassword').val().length  > 25 ){
            $('.no1').css({color: 'red', display: 'block'});
            $('.ok1').css({display: 'none'});
            $("#newpassword").css("border","1px solid red");
            $("#errPass1").html("*Please write a password with a max of 25 letters !");
        }
        else if ( $('#newpassword').val().length > 5 && $('#newpassword').val().length < 26
            && (pattern1.test($('#newpassword').val()) === true || pattern2.test($('#newpassword').val()) === true) ) {
            $("#newpassword").css("border","1px solid green");
            $("#errPass1").html("");

            if( pattern1.test($('#newpassword').val()) === true && pattern2.test($('#newpassword').val()) === false ){
                $('.ok1').css({color: 'orange', display: 'block'});
                $('.no1').css({display: 'none'});
            }
            else if( pattern2.test($('#newpassword').val()) === true ){
                $('.ok1').css({color: 'green'});
                $('.no1').css({display: 'none'});
            }
        }

    }

    function checkPasswordStrength2() {

        if ($('#newpassword2').val().length < 6) {
            $('.no2').css({color: 'red', display: 'block'});
            $('.ok2').css({display: 'none'});
            $("#newpassword2").css("border","1px solid red");
            $("#errPass2").html("*Please repeat the new password !");

            if ($('#newpassword2').val() == "") {
                $('.no2').css('display', 'none')
            }
        }

        else if( $('#newpassword').val() == "" && $('#newpassword2').val() == $('#newpassword').val() ){
            $("#newpassword2").css("border","1px solid red");
            $("#errPass2").html("*Please repeat the new password !");
        }

        else if( $('#newpassword2').val() != $('#newpassword').val()  ){
            $('.no2').css({color: 'red', display: 'block'});
            $('.ok2').css({display: 'none'});
            $("#newpassword2").css("border","1px solid red");
            $("#errPass2").html("*Please repeat the new password !");

            if ($('#newpassword2').val() == "") {
                $('.no2').css('display', 'none')
            }
        }

        else if( $('#newpassword').val().length > 5 && $('#newpassword2').val() == $('#newpassword').val()  ){
            $('.no2').css({display: 'none'});
            $('.ok2').css({color: 'green',display: 'block'});
            $("#newpassword2").css("border","1px solid green");
            $("#errPass2").html("");

        }
    }



    $('#submit').click(function() {

        var p = $(".password").val();
        var p1 = $('#newpassword').val();
        var p2 = $('#newpassword2').val();

        if( p  == ""  ){
            $('.no').css({color: 'red', display: 'block'});
            $('.ok').css({display: 'none'});
            $("#password").css("border","1px solid red");
            $("#errPass").html("*Please write the password !");
        }
         if( p1 == "" ){
            $('.no1').css({color: 'red', display: 'block'});
            $('.ok1').css({display: 'none'});
            $("#newpassword").css("border","1px solid red");
            $("#errPass1").html("*Please write the new password !");
        }
        if( p2 == "" ){
            $('.no2').css({color: 'red', display: 'block'});
            $('.ok2').css({display: 'none'});
            $("#newpassword2").css("border","1px solid red");
            $("#errPass2").html("*Please write the new password !");
        }

         if ( $("#errPass1").html() == "" && p2 !== p1 ){
            $('.no2').css({color: 'red', display: 'block'});
            $('.ok2').css({display: 'none'});
            $("#newpassword2").css("border","1px solid red");
            $("#errPass2").html("*Please repeat the new password !");
        }


        var pass = $(".password").val();

        $.ajax({
            type:"POST",
            url:"changepw.php",
            data: {
                'pass': pass
            },
            dataType:"json",
            success:function(result){

                if(result['result'] != 'true' ){

                    $('.no').css({color: 'red', display: 'block'});
                    $('.ok').css({display: 'none'});
                    $("#password").css("border","1px solid red");
                    $("#errPass").html("*Please write the your password !");
                }

                if( result['result'] == 'true' && p1 != "" && $("#errPass1").html("") &&
                    p2 != "" && $("#errPass2").html("") ){

                    var pass1 = $("#newpassword").val();

                    $.ajax({
                        type: 'POST',
                        url: "newpass.php",
                        data: {
                            'newpass': pass1
                        },
                        dataType: 'json',
                        success: function (result) {
                            if(result['result'] == 'true5'){
                                alert("Your password changed");
                                window.location = "../index.php";
                            }
                        }
                    })

                }
            }
        })

    })




</script>


</html>