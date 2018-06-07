
<div class="">

    <div class="col-md-4 col-sm-3 col-xs-1"></div>

    <div class="col-md-4 col-sm-6 col-xs-10 form">
        <ul class="tab-group">
            <li class="tab active"><a href="#l">LogIn</a></li>
            <li class="tab"><a href="#r">Register</a></li>
        </ul>

        <div class="tab-content">

            <!--        Login -->

            <div id="l">

                <form id="formLogin">
                    <p id="error"></p>
                    <div class="form-group row">
                        <label for="username" class="title1">Username</label><br>
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input type="text" class="inputUP" name="username" id="username"
                                   aria-describedby="username" placeholder="Please enter your username " autocomplete="off">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span id="username_err" class="errorMsg"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="title1 ">Password</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input type="password" class="inputUP password" name="password"
                                   placeholder="Please enter your password" autocomplete="off">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span class="eye "><i class="fas fa-eye i"></i></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span id="password_err" class="errorMsg"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-10" id="reset">
                            <a href="index.php?page=newpass" id="reset2" class="" name=" reset">reset password</a>
                        </div>
                    </div>

                </form>

                <div class="  buttonLogin row ">

                    <div class="" align="center">
                        <button type="button" class="btn but2" id="login">LogIn</button>
                    </div>

                </div>
            </div>



            <!--        Registration-->

            <div id="r">

                <form id="formLogin2">
                    <div class="form-group row">
                        <p id="error"></p>

                        <label for="username" class="title1">Username</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input type="text" class="user inputUP" id="username1" name="username"
                                   placeholder="Please use letters and numbers" autocomplete="off">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="errorMsg" id="errUser"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="title1">E-mail</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input type="text" class="inputUP pass555 " placeholder="Please enter a valid email" id="email"
                                   name='email' autocomplete="off">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="errorMsg" id="errEmail"></span>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="passw" class="title1 ">Password</label><br>

                       <div class="col-md-10 col-sm-10 col-xs-10 ">
                        <input type="password" class="inputUP pass555 password1 " id="passw" placeholder="Please use letters,numbers and symbols"
                               name="password1" autocomplete="off" onkeyup="checkPasswordStrength();">
                           <span class="glyphicon glyphicon-ok-sign form-control-feedback ok"></span>
                           <span class="glyphicon glyphicon-remove form-control-feedback no"></span>

<!--                           <img style="height: 35px; display: none; width: 35px; margin-top: -52px; margin-left: 325px; z-index: -1;" alt="" id="lev" >-->

                       </div>

                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span class="eye1"><i class="fas fa-eye i1"></i></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="errorMsg" id="errPass1"></span>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="title1">Re-Password</label><br>

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input type="password" id="epass" class="inputUP pass555 password2" placeholder="Please repeat your password"
                                   name="password2" autocomplete="off">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <span class="eye2"><i class="fas fa-eye i2"></i></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="errorMsg" id="errPass2"></span>
                        </div>

                    </div>
                    <div class="buttonLogin row">

                        <div class=" but" align="center">
                            <button type="button" class="btn but2 " id="singUp" name="singUp">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-4 col-sm-3 col-xs-1"></div>


</div>

<script type="text/javascript">


    $('.tab a').on('click', function (e) {
        e.preventDefault();
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        target = $(this).attr('href');
        $('.tab-content > div').not(target).hide();
        $(target).fadeIn(600);

    });
    //
    // $("#passw").keyup(function(){
    //     if( $("#passw").val().length > 5 && $("#passw").val().length <= 12 ){
    //         $(".glyphicon-ok-sign").css({color:"#FFD818",display:"block"});
    //
    //         // $("#passw").css({backgroundImage:'form/img/good.png' })
    //
    //     }
    //     else if( $("#passw").val().length > 12 ){
    //         $(".glyphicon-ok-sign").css({color:"green"})
    //     }
    //     else if( $("#passw").val().length < 6 ){
    //         $(".glyphicon-ok-sign").css({display:"none"})
    //     }
    // });


    $(document).ready(function () {

        var usName = function(){
            var user = $("#username1").val();
            var pattern1 = new RegExp('^[a-zA-Z0-9_-]{5,20}$');

            if( $("#username1").val() == "" ){
                $("#username1").css("border","1px solid red");
                $('#errUser').html("*Please write your username !");
            }else if (pattern1.test(user) == false) {
                $("#errUser").html("*Please write or letters or numbers or    ' -_ ' , at least 5 to 20 ! ");
                $('#username1').css('border', '1px solid red')
            }
            else{
                $("#username1").css("border","1px solid green");
                $('#errUser').html("");
            }
        };

        var eMail = function(){

            var mail = /^[\w.]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
            var email = $("#email").val();

            if( $("#email").val() == "" ){
                $("#email").css("border","1px solid red");
                $('#errEmail').html("*Please write your email !");
            }else if (mail.test(email) == false) {
                $("#email").css("border","1px solid red");
                $('#errEmail').html("*Please write your valid email !");
            }
            else{
                $("#email").css("border","1px solid green");
                $('#errEmail').html("");
            }
        };


        var passw1 = function(){

            var pattern2 = new RegExp('[A-Za-z0-9~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{6,25}');
            var pass1 = $(".password1").val();

            if( $("#passw").val() == "" ){
                $("#passw").css("border","1px solid red");
                $('#errPass1').html("*Please write your password !");
            }else if (pattern2.test(pass1) == false) {
                $("#errPass1").html("*Please write ( letters and numbers ) or ( letters and numbers and ' !@#$&-_ ' ), at least 6 to 25 ! ");
                $('#passw').css('border', '1px solid red')
            }else{
                $("#passw").css("border","1px solid green");
                $('#errPass1').html("");
            }
        };

        var passw2 = function(){
            var pass1 = $(".password1").val();
            var pass2 = $(".password2").val();


            if( pass1 == "" && pass2 == "" ){
                $('#epass').css('border', '1px solid  red');
                $("#errPass2").html("*Please write your password !");

            }
            else if( $("#passw").val().length  > 5 && pass2 != pass1  ){
                $('#epass').css('border', '1px solid  red');
                $("#errPass2").html("*Please repeat this password !");
            }
            else if( pass2 == pass1 ){
                $('#epass').css('border', '1px solid  green');
                $("#errPass2").html("");
            }
        };



        $("#email").click(function(){
            usName();
        });

        $("#passw").click(function(){
            usName();
            eMail();
        });

        $("#epass").click(function(){
            usName();
            eMail();
            passw1();
        });

        $("#singUp").click(function(){
            usName();
            eMail();
            passw1();
            passw2();

            if( $("#username1").css("borderTopColor") == "rgb(0, 128, 0)" && $("#email").css("borderTopColor") == "rgb(0, 128, 0)" &&
            $("#passw").css("borderTopColor") == "rgb(0, 128, 0)" && $("#epass").css("borderTopColor") == "rgb(0, 128, 0)" ) {

                $.post({
                    url: "reg.php",
                    data: $("#formLogin2").serializeArray(),
                    dataType: 'json',
                    success: function (response) {

                        if (response['result'] == "true") {
                            window.location.href = './form/index.php';
                        }
                        else if (response['result'] == "false") {
                            $("#errUser").html("This username already exists");
                            $('#username1').css('border', '1px solid red');

                            $('#username1').click(function () {
                                $("#errUser").html("");
                                $("#username1").css("border", "none")
                            })
                        }
                    }
                });
            }
        });


        $("#username1").keydown(function (e) {
            if (e.which === 9) {
                usName();
            }
        });

        $("#email").keydown(function(e){
            if (e.which === 9) {
                usName();
                eMail();
            }
        });

        $("#passw").keydown(function(e){
            if (e.which === 9) {
                usName();
                eMail();
                passw1();
            }
        });

        $("#epass").keydown(function(e){
            if (e.which === 9) {
                usName();
                eMail();
                passw1();
                passw2();
            }
        });

    })

</script>

<script>

    $('.eye').on('click',function () {
        if( $('.password').attr('type') == 'password' ){
            $('.password').attr('type', 'text');
            $(".i").toggleClass("fas fa-eye-slash").toggleClass("fas fa-eye")
        }else if($('.password').attr('type') == 'text'){
            $('.password').attr('type', 'password');
            $(".i").toggleClass("fas fa-eye").toggleClass("fas fa-eye-slash")
        }
    });

    $('.eye1').on('click',function () {
        if( $('.password1').attr('type') == 'password' ){
            $('.password1').attr('type', 'text');
            $(".i1").toggleClass("fas fa-eye-slash").toggleClass("fas fa-eye")
        }else if($('.password1').attr('type') == 'text'){
            $('.password1').attr('type', 'password');
            $(".i1").toggleClass("fas fa-eye-slash").toggleClass("fas fa-eye")
        }
    });

    $('.eye2').on('click',function () {
        if( $('.password2').attr('type') == 'password' ){
            $('.password2').attr('type', 'text');
            $(".i2").toggleClass("fas fa-eye-slash").toggleClass("fas fa-eye")
        }else if($('.password2').attr('type') == 'text'){
            $('.password2').attr('type', 'password');
            $(".i2").toggleClass("fas fa-eye-slash").toggleClass("fas fa-eye")
        }
    });


</script>

<script src="resource/js/jquery.js"></script>
