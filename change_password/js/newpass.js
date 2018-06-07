
$(document).ready(function () {


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


    $('.password2').keypress(function (e) {
        if(e.keyCode === 13) {
            $('.update').click();
        }
    });



});




























