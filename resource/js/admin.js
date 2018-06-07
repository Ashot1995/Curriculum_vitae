
$('.dropdown').click(function(){
    $('.dropdown-content').show(function(){
        document.body.addEventListener('click', boxCloser, false);
    });
});

function boxCloser(e){
    if(e.target.class != 'dropdown-content'){
        document.body.removeEventListener('click', boxCloser, false);
        $('.dropdown-content').hide();
    }
}

$(".dropdown").mouseenter(function(){
    $(".fa-bars").css("color", "#4668A6");
    $(".yourUsername").css({color:"#4668A6",textDecoration:"none"});
});
$(".dropdown").mouseleave(function(){
    $(".fa-bars").css("color", "#5A86D5");
    $(".yourUsername").css({color:"#5A86D5",textDecoration:"none"});
});


$(".dis").attr("disabled","disabled");












