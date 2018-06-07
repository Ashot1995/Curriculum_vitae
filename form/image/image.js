$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 300,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    },
    // mouseWheelZoom: true,
    // showZoomer: true
});

$(".upload-result").css({"opacity": 0.7,"cursor":'default' } ).attr('disabled','disabled') ;
$(".cr-slider").css({"opacity": 0.7,"cursor":'default' } ).attr('disabled','disabled') ;

$('#upload').change(function () {

    var filename = $("#upload").val();

    var valid_extensions = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
    if(valid_extensions.test(filename)) {

        var reader = new FileReader();

        $(".upload-result").css({"opacity": 1,"cursor":"pointer" } ).removeAttr('disabled');
        $(".cr-slider").css({"opacity": 0.7,"cursor":'default' } ).removeAttr('disabled');

        $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');


        $('.openL').css('display',"none");
        $(".cr-boundary").css({border:'7px solid #4668A6'});
        $('.cr-image').css({zIndex:'0'}).attr('alt',"cropImage");

        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                // console.log('jQuery bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);
    }
    else
    {
        alert("Valid only jpg,jpeg,png,gif formats")
    }
});

$('.upload-result').on('click', function () {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {

        var x = $('.cr-image').attr('alt');


        if(x == "cropImage"){

            $(".cr-image").removeAttr('src').removeAttr('alt').removeAttr('style');
            $('#upload-demo').css('display',"none");
            $('.btn2').css('display',"none");
            $('#upload-demo-i').css({paddingTop:'30px',height:'100%',width:'100%'});

            $('#note').css("display","block");

            $.ajax({
                url: "image/ajaxpro.php",
                data: {'image' : resp},
                async: true,
                dataType: 'json',
                cache: false,
                type: 'POST',
                success: function (data) {

                    html = '<img src="' + data['img_name'] + '" class="newImg" id="upload1"/>';
                    $("#upload-demo-i").html(html);
                    $('#upload1').css({width:'65%',border:'7px solid #4668A6',padding:'5px'})
                        .attr({alt:'cropImage',name:"imageName"});
                    $(".deletImage").prepend('<button type="reset" id="del" class="xx">' +
                        'Delete  <span class="fa fa-remove"></span></button>');

                }
            })
        }
    });
});

$(".deletImage").on('click',function (){

    var a = confirm("Are you sure you want to delete");

    if( a == true ){

        $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
            .removeAttr('disabled');
        $(".cr-viewport").css({"marginLeft":'-1px'});
        $(".upload-result").css({"opacity": 0.7,"cursor":'default'}).attr('disabled','disabled') ;
        $(".cr-slider").css({"opacity": 0.7,"cursor":'default'} ).attr('disabled','disabled') ;
        $(".openL").css({display:"inline-block"});
        $(".btn2").css({display:"inline-block"});
        $('.xx').remove();
        $('#note').css("display","none");


        var image2 = $(".newImg").attr('src');
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: { "image2" : image2 },
            // dataType: 'json',
            // async: true,
            // cache: false,
            success: function (data) {

                $("#upload-demo-i img").remove();
                $("#upload-demo-i").removeAttr("style");
                $("#upload-demo").removeAttr("style");

                if (data.result == "false"){

                    $(".upImage").val("");
                    $(this).val('');
                    $("#upload").val("");
                    $('.cr-image').attr({src:"#",alt:"image_profile"});
                }
                $.ajax({
                    url: "./image/del.php",
                    type: "POST",
                    // dataType: 'json',
                    // async: true,
                    // cache: false,
                    success: function () {

                    }
                })
            }
        })
    }
});


$(window).scroll(function () {
    if ((window.matchMedia("(max-width: 400px)").matches)) {
        $(".cr-boundary").css({"height": "150px", "width": "150px", "display": "flex", "justify-content": "center"});
        $(" .cr-vp-square").css({
            "width": "",
            "height": "",
            "border": "2px solid #4668A6",
            "background-size": "150px 150px"
        })
        $("#upload-demo").css("margin-left", "-40px");
    } else {
        $(".cr-boundary").css("height", "300px");
        $(".cr-boundary").css("width", "300px");
        $(" .cr-vp-square").css({"background-size": "300px 300px", "border": "5px solid #4668A6"})
    }
})
