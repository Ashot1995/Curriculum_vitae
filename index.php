
<?php
include_once "db.php";
session_start();
$username = $_SESSION["username"];
if (isset($_SESSION['username'])){
    header("location:form/index.php");

}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>YOUR CV</title>
    <link rel="shortcut icon" href="form/img/image1.gif">
    <link rel="stylesheet" href="form/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">

<!--    <link rel="icon" type="image/png" href="favicon.ico">-->


    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <script src="resource/js/jquery-3.2.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body class="body">

<script type="text/javascript">
    $(document).ready(function () {


        // $("b").css("display","none");
        //
        // var x = "Undefined index: username in";
        //
        //
        // if( $("body").html(x) ){
        //     x.css("display","none");
        // }

        $(".password").click(function(){

            $.ajax({
                url:"login.php",
                type:"POST",
                data: $('#formLogin').serializeArray(),
                dataType:"JSON",
                success:function(d){

                    if($("#username").val() == "" ){
                        $("#username").css("border","1px solid red");
                        $('#username_err').html("*Please write your username !");
                    }
                    else if( d["result"] == "true"){
                        $("#username").css("border","1px solid green");
                        $('#username_err').html("");
                    }
                    else if( d["result"] !== "userT"  ){
                        $("#username").css("border","1px solid red");
                        $('#username_err').html("*Your username is incorrect !");
                    }
                    else if( d["result"] == "userT" ){
                        $("#username").css("border","1px solid green");
                        $('#username_err').html("");
                    }
                }
            })

        });

        $("#username").keydown(function (e) {
            if (e.which === 9) {
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: $('#formLogin').serializeArray(),
                    dataType: "JSON",
                    success: function (d) {

                        if ($("#username").val() == "") {
                            $("#username").css("border", "1px solid red");
                            $('#username_err').html("*Please write your username !");
                        }
                        else if (d["result"] == "true") {
                            $("#username").css("border", "1px solid green");
                            $('#username_err').html("");
                        }
                        else if (d["result"] !== "userT") {
                            $("#username").css("border", "1px solid red");
                            $('#username_err').html("*Your username is incorrect !");
                        }
                        else if (d["result"] == "userT") {
                            $("#username").css("border", "1px solid green");
                            $('#username_err').html("");
                        }
                    }
                })
            }
        });

        $(".password").keydown( function(e){
            if(e.which === 9){

                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: $('#formLogin').serializeArray(),
                    dataType: "JSON",
                    success: function (d) {

                        if( $(".password").val() == "" ){
                            $(".password").css("border","1px solid red");
                            $('#password_err').html("*Please write your password !");
                        }
                        else if( d["result1"] !== "userTrue"  ){
                            $(".password").css("border","1px solid red");
                            $('#password_err').html("*Your password is incorrect !");
                        }
                        if( d["result"] == "true"  ){
                            $(".password").css("border","1px solid green");
                            $('#password_err').html("");
                        }
                    }
                })
            }
        });

        $('#login').click(function () {

            $.ajax({
                url:"login.php",
                type:"POST",
                data: $('#formLogin').serializeArray(),
                dataType:"JSON",
                success:function(d){

                     if($("#username").val() == "" ){
                        $("#username").css("border","1px solid red");
                        $('#username_err').html("*Please write your username !");
                    }
                    else if( d["result"] !== "userT"  ){
                        $("#username").css("border","1px solid red");
                        $('#username_err').html("*Your username is incorrect !");
                    }
                    else if( d["result"] == "userT"  ){
                        $("#username").css("border","1px solid green");
                        $('#username_err').html("");

                        if( $(".password").val() == "" ){
                            $(".password").css("border","1px solid red");
                            $('#password_err').html("*Please write your password !");
                        }
                        else if( d["result1"] !== "userTrue"  ){
                            $(".password").css("border","1px solid red");
                            $('#password_err').html("*Your password is incorrect !");
                        }
                    }

                    if( d["result"] == "true"  ){

                         $("#username").css("border","1px solid green");
                         $('#username_err').html("");
                         $(".password").css("border","1px solid green");
                         $('#password_err').html("");

                         if (d['permission'] == "2") {
                          window.location.href = './admin.php';

                         } else if (d['permission'] == "1") {
                             window.location.href = 'form/index.php';
                         }
                     }
                }
            })
        });
    })

</script>


<nav class="navbarReg navbar-default navbarReg2">
    <div class="navbar2 ">
        <div class="col-md-2 col-sm-2 col-xs-2 one">
            <a href="index.php"><img src="form/img/image1.gif" class="imgCv imgCv4"></a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a class="navbar-brand" href="index.php">
                <h3 class="navbar-brand_3 h3nav">MyWebSite</h3>
            </a>
        </div>

    </div>
</nav>


<?php

if ($_GET['page'] == "") {
    include 'registration.php';
} else if ($_GET['page'] == "newpass") {
    include 'forgotPassword/Captcha/newPassword.php'; ?>
    <script>
        document.getElementById("reset2").style.display = "none";
    </script>
    <?php
}

?>
</body>

<script src="resource/js/jquery.js"></script>

</html>



