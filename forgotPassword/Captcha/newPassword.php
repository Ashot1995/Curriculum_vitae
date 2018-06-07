
<div>
    <div class="col-md-4 col-sm-3 col-xs-2"></div>


    <div id="bord" class="col-md-4 col-sm-6 col-xs-8 bord">
        <p class="h2 title regTitle col-md-12 col-sm-12 col-xs-12">Reset password</p>

        <div class="form-group row">
            <label for="username" class="title1">Username</label>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="inputUP user textP" name="username" id="username" placeholder="Username" >
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <span class="errorMsg" id="errUser"></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="title1">E-mail Address:</label><br>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="inputUP user textP" name="email" id="email" placeholder="E-mail Address" >
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <span class="errorMsg" id="errEmail"></span>
            </div>
        </div>


        <div class="captcha-chat">
            <div class="captcha-container media">
                <div class="media-body">
                    <label class="security title1">Security Check:</label>
                </div>

                <div id="captcha">
                    <div class="controls">

                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input id="numb" class="user-text btn-common inputUP user" placeholder="Type here" type="text" name="captcha" />
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <p class="refresh" >
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </p>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <span class="errorMsg" id="errText"></span>
                            <button class="validate btn-common btn but2">Request Reset</button>
                        </div>


                    </div>
                </div>
                <!--            <p class="wrong info"><b>Wrong! Please try again.</b></p>-->
            </div>

            <div id="dialPass">
                <h5> Your email address  been sent new password ! </h5>
            </div>

        </div>

    </div>

    <div class="col-md-4 col-sm-3 col-xs-2"></div>

</div>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" defer></script>

<script src="forgotPassword/Captcha/js/client_captcha.js" defer></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.body.scrollTop;

        var timeout;

        var captcha = new $.Captcha({
            onFailure: function () {

                $(".captcha-chat .wrong").show({
                    duration: 30,
                    done: function () {
                        var that = this;
                        clearTimeout(timeout);
                        $(this).removeClass("shake");
                        $(this).css("animation");
                        $(this).addClass("shake");
                        var time = parseFloat($(this).css("animation-duration")) * 1000;
                        timeout = setTimeout(function () {
                            $(that).removeClass("shake");
                        }, time);
                    }
                });
            },
            onSuccess: function () {
                alert("CORRECT!!!");
            }
        });
        captcha.generate();
    });
</script>















