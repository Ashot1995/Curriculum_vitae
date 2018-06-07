// $("body").css({backgroundImage:"url(form/img/image.jpg)"});

$('.password2').keypress(function (e) {
    if (e.keyCode === 13) {
        $('#singUp').click();
    }
});

$('.password').keypress(function (e) {
    if (e.keyCode === 13) {
        $('#login').click();
    }
});


function checkPasswordStrength() {
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


    if ($('#passw').val().length < 6) {
        $('.no').css({color: 'red', display: 'block'});
        $('.ok').css({display: 'none'});

        if ($('#passw').val() == "") {
            // alert("sbfcvbifv")
            $('.no').css('display', 'none')
        }
    }
    else if ($('#passw').val().length > 5) {
        if ($('#passw').val().match(number) && $('#passw').val().match(alphabets) && $('#passw').val().match(special_characters)) {
            $('.ok').css({color: 'green'})
        } else {
            $('.ok').css({color: 'orange', display: 'block'});
            $('.no').css({display: 'none'});
        }
    }
}

