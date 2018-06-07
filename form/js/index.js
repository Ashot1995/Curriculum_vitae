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

$('#birthdate').keypress(function(e) {
    if(e.which<97 || e.which>31 ){
        e.preventDefault();
    }
});

$('.date1').keypress(function(e) {
    if(e.which<97 || e.which>31 ){
        e.preventDefault();
    }
});


$('input,select').bind("click",function(){
    if($(this).css({borderColor:"red"})){
        $(this).css({borderColor : ""})
    }
});




$(document).ready(function() {

    var max_fields = 4;
    var wrapper = $(".educDel");
    var add_button = $(".educDel2");
    var x;
    var er ;


    $(add_button).click(function(e){
        e.preventDefault();

        var d =  $(".educDel .newDiv2").size();

        if( d == 3 ){   x = 4 ; er = 35 ; }
        if( d == 2 ){   x = 3 ; er = 30 ; }
        if( d == 1 ){   x = 2 ; er = 25 ; }
        if( d == 0 ){   x = 1 ; er = 20 ; }

        // alert(d)

        if(x < max_fields){

            if( $("#institut"+(x-1)).val() != "" && $("#prof"+(x-1)).val() != "" && $("#academic"+(x-1)).val() != ""
                && $("#from"+(x-1)).val() != "" && ( $(".p"+(x-1) ).val() != "" || $('.ongoing'+(x-1)).prop("checked")== true ) ){

                var i = $('<div class="persInf newDiv2  xx'+x+' ">' +
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
                    '<span class="error'+(er+5) +' error"></span></div>' +
                    '<div class="col-md-2 col-xs-3" ><input type="checkbox" class="ong ongoing'+x+'" >'+
                    '<p class="pp'+x+'" style="display: inline">Ongoing</p>'+
                    '<p class="ppp'+x+'" style="display: none">Going</p></div>'+
                    '<div class="col-md-2 col-xs-12 newAdd'+x+' " > </div></div>');


                $x = $(".educDel2").detach();

                i.find('.date1').datepicker({
                    format: 'yyyy-mm-dd',
                    endDate: new Date()
                });
                i.find('.letters').keypress(function(e) {
                    if(e.which < 97 || e.which > 122) {
                        e.preventDefault();
                    }
                });
                i.find('.date1').keypress(function(e) {
                    if(e.which<97 || e.which>31 ){
                        e.preventDefault();
                    }
                });

                i.find('input[type="text"]').bind("click",function(){

                    var xxx = $(this).parent("div");
                    var xx = xxx[0]['children'][2];
                    $(xx)[0].style.display = "none";

                });

                i.find('input').keyup(function() {
                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                $(wrapper).append(i);

                $(".ongoing"+(x-1)).css({pointerEvents:'none'});

                $(wrapper).on("click",'.ongoing'+x, function(){

                    if($('.ongoing'+(x-1)).prop("checked")) {
                        $(".p" + (x-1)).css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                        $(".pp"+(x-1)).css({display:"none"});
                        $(".ppp"+(x-1)).css({display:"inline"});
                        $(".error"+ er ).html("").css({display:"none"});
                    }
                    else {
                        $(".p"+(x-1)).css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                        $(".ppp"+(x-1)).css({display:"none"});
                        $(".pp"+(x-1)).css({display:"inline"});
                    }
                });

                x++;
                er = er +5;

            }
            else {

                if( $("#institut"+(x-1)).val() == ""){
                    $("#institut"+(x-1)).css("border","1px solid red");
                    $(".error"+(er-4)).html("Please write your institution name !").css({display:"block"});
                }
                if( $("#prof"+(x-1)).val() == "" ){
                    $("#prof"+(x-1)).css("border","1px solid red");
                    $(".error"+(er-3)).html("Please write your profession !").css({display:"block"});
                }
                if( $("#academic"+(x-1)).val() == "" ){
                    $("#academic"+(x-1)).css("border","1px solid red");
                    $(".error"+(er-2)).html("Please write your academic degree  !").css({display:"block"});
                }
                if( $("#from"+(x-1)).val() == "" ){
                    $("#from"+(x-1)).css("border","1px solid red");
                    $(".error"+(er-1)).html("Please write when you started studying !").css({display:"block"});
                }
                if( $(".p"+(x-1)).val() == "" && $('.ongoing'+(x-1)).prop("checked")==false ){
                    $(".p"+(x-1)).css("border","1px solid red");
                    $(".error"+(er)).html("Please write when you are finished studying !").css({display:"block"})
                }

                $("#institut"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#prof"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#academic"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#from"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $(".p"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                // max_fields++;
            }

        }
    }).click(function(){
            $(".newAdd"+ (x-1)).prepend($x);
    });

    var d =  $(".educDel .newDiv2").size();

    if( d == 3 ){   x = 4 ; er = 35 ; }
    if( d == 2 ){   x = 3 ; er = 30 ; }
    if( d == 1 ){   x = 2 ; er = 25 ; }
    if( d == 0 ){   x = 1 ; er = 20 ; }



    $(wrapper).on("click",'.ongoing'+(x-1), function(){

        if($('.ongoing'+(x-1)).prop("checked")) {
            $(".p" + (x-1)).css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
            $(".pp"+(x-1)).css({display:"none"});
            $(".ppp"+(x-1)).css({display:"inline"});
            $(".error"+er).html("").css({display:"none"});
        }
        else {
            $(".p"+(x-1)).css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
            $(".ppp"+(x-1)).css({display:"none"});
            $(".pp"+(x-1)).css({display:"inline"});
        }
    });


    $(wrapper).on("click",".remove_field", function(){

        var d =  $(".educDel .newDiv2").size();

        // alert(d)

        if( d == 3 ){   x = 4 ; er = 35 }
        if( d == 2 ){   x = 3 ; er = 30 ; }
        if( d == 1 ){   x = 2 ; er = 25 ; }
        if( d == 0 ){   x = 1 ; er = 20 ; }


        $(".ongoing"+(x-2)).css({pointerEvents:'auto'});

        var a = confirm("Are you sure you want to delete");

        if( a == true ){

            var parent = $(this).parent("div").children("div").children("button").attr("class");

            if( parent == "educDel2 openLabel" ){
                $add2 = $(".educDel2").detach();
                $(".newAdd" + (x-2)).prepend($add2);
            }

            $(this).parent('div').remove();

            var dd = $(this).parent("div").children("div");

            if( dd.children("input").attr("id") == "institut1" ){

                $("#institut2").removeAttr("id").attr("id", "institut1").removeAttr("name").attr("name", "name1");
                $("#institut3").removeAttr("id").attr("id", "institut2").removeAttr("name").attr("name", "name2");
                $("#prof2").removeAttr("id").attr("id", "prof1").removeAttr("name").attr("name", "Profession_name1");
                $("#prof3").removeAttr("id").attr("id", "prof2").removeAttr("name").attr("name", "Profession_name2");
                $("#academic2").removeAttr("id").attr("id", "academic1").removeAttr("name").attr("name", "academic_degree1");
                $("#academic3").removeAttr("id").attr("id", "academic2").removeAttr("name").attr("name", "academic_degree2");
                $("#from2").removeAttr("id").attr("id", "from1").removeAttr("name").attr("name", "start_date11");
                $("#from3").removeAttr("id").attr("id", "from2").removeAttr("name").attr("name", "start_date12");
                $("#to2").removeAttr("id").attr("id", "to1").removeClass("p2").addClass("p1").removeAttr("name").attr("name", "end_date11");
                $("#to3").removeAttr("id").attr("id", "to2").removeClass("p3").addClass("p2").removeAttr("name").attr("name", "end_date12");


                $(".ongoing2").removeClass("ongoing2").addClass("ongoing1");
                $(".p2").removeClass("p2").addClass("p1");
                $(".pp2").removeClass("pp2").addClass("pp1");
                $(".ppp2").removeClass("ppp2").addClass("ppp1");

                $(".ongoing3").removeClass("ongoing3").addClass("ongoing2");
                $(".p3").removeClass("p3").addClass("p2");
                $(".pp3").removeClass("pp3").addClass("pp2");
                $(".ppp3").removeClass("ppp3").addClass("ppp2");

                $(".newAdd2").removeClass("newAdd2").addClass("newAdd1");
                $(".newAdd3").removeClass("newAdd3").addClass("newAdd2");

                $(".error26").removeClass("error26").addClass("error21");
                $(".error27").removeClass("error27").addClass("error22");
                $(".error28").removeClass("error28").addClass("error23");
                $(".error29").removeClass("error29").addClass("error24");
                $(".error30").removeClass("error30").addClass("error25");

                $(".error31").removeClass("error31").addClass("error26");
                $(".error32").removeClass("error32").addClass("error27");
                $(".error33").removeClass("error33").addClass("error28");
                $(".error34").removeClass("error34").addClass("error29");
                $(".error35").removeClass("error35").addClass("error30");

            }
            else if( dd.children("input").attr("id") == "institut2" ){

                $("#institut3").removeAttr("id").attr("id", "institut2").removeAttr("name").attr("name", "name2");
                $("#prof3").removeAttr("id").attr("id", "prof2").removeAttr("name").attr("name", "Profession_name2");
                $("#academic3").removeAttr("id").attr("id", "academic2").removeAttr("name").attr("name", "academic_degree2");
                $("#from3").removeAttr("id").attr("id", "from2").removeAttr("name").attr("name", "start_date12");
                $("#to3").removeAttr("id").attr("id", "to2").removeClass("p3").addClass("p2").removeAttr("name").attr("name", "end_date12");

                $(".ongoing3").removeClass("ongoing3").addClass("ongoing2");
                $(".p3").removeClass("p3").addClass("p2");
                $(".pp3").removeClass("pp3").addClass("pp2");
                $(".ppp3").removeClass("ppp3").addClass("ppp2");

                $(".newAdd3").removeClass("newAdd3").addClass("newAdd2");

                $(".error31").removeClass("error31").addClass("error26");
                $(".error32").removeClass("error32").addClass("error27");
                $(".error33").removeClass("error33").addClass("error28");
                $(".error34").removeClass("error34").addClass("error29");
                $(".error35").removeClass("error35").addClass("error30");
            }
            $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
                .removeAttr('disabled');

            x--;
            // er = er - 5;

        }
    });
});





$(document).ready(function() {
    var max_fields      = 4;
    var wrapper         = $(".delWork");
    var add_button      = $(".delWork2");

    var x ;
    var err ;

    $(add_button).click(function(e){
        e.preventDefault();


        var d =  $(".delWork .newDiv2").size();

        if( d == 3 ){   x = 4 }
        if( d == 2 ){   x = 3 ; err = 50 ; }
        if( d == 1 ){   x = 2 ; err = 45 ; }
        if( d == 0 ){   x = 1 ; err = 40 ; }

        // alert(d)


        if( x < max_fields ){

            if( $("#company"+(x-1)).val() != "" && $("#position"+(x-1)).val() != "" && $("#actResp"+(x-1)).val() != ""
                && $("#from2_"+(x-1)).val() != "" && ( $(".s"+(x-1)).val() != "" || $('.ongoing2'+(x-1)).prop("checked") == true )
                && $("#actResp"+(x-1)).val() != ""){

                var p = $('<div class="persInf newDiv2">' +
                    '<img src="img/image3.png" class="image3 remove_field2">' +
                    '<div class="col-md-6"><label>Company</label> ' +
                    '<input type="text" class="btn btn-default target letters" id="company'+x+'"' +
                    ' placeholder="Company" name="company'+x+'"><span class="error'+(err+1) +' error"></span> </div><div class="col-md-6 topMin"> ' +
                    '<label>Position</label><input type="text" class="btn btn-default target letters"' +
                    'id="position'+x+'" placeholder="Position" name="position_name'+x+'">' +
                    '<span class="error'+(err+2) +' error"></span> </div>' +
                    '<div class="col-md-4 col-xs-12"><label>From</label>' +
                    '<input class="date1 btn btn-default target" id="from2_'+x+'" ' +
                    'type="text" placeholder="yyyy-mm-dd" name="start_date2'+x+'">' +
                    '<span class="error'+(err+3) +' error"></span></div>' +
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

                $h = $(this).detach();


                p.find('.date1').datepicker({
                    format: 'yyyy-mm-dd',
                    endDate: new Date()
                });
                p.find('.letters').keypress(function(e) {
                    if(e.which < 97 || e.which > 122) {
                        e.preventDefault();
                    }
                });
                p.find('.date1').keypress(function(e) {
                    if(e.which<97 || e.which>31 ){
                        e.preventDefault();
                    }
                });

                p.find('input[type="text"]').bind("click",function(){

                    var xxx = $(this).parent("div");
                    var xx = xxx[0]['children'][2];
                    $(xx)[0].style.display = "none";

                });

                p.find('input').keyup(function() {
                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                p.find('textarea').bind("click",function(){

                    var xxx = $(this).parent("div");
                    var x = xxx[0]['children'][1];
                    $(x)[0].style.display = "none";

                });

                p.find('textarea').keyup(function() {
                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                $(wrapper).append(p);


                $(".ongoing2"+(x-1)).css({pointerEvents:'none'});

                $(wrapper).on("click",'.ongoing2'+x, function(){

                    if($('.ongoing2'+(x-1)).prop("checked")) {

                        $(".s" + (x-1)).css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
                        $(".ss"+(x-1)).css({display:"none"});
                        $(".sss"+(x-1)).css({display:"inline"});
                        $(".error"+(err-1)).html("").css({display:"none"});
                    }
                    else {
                        $(".s"+(x-1)).css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
                        $(".sss"+(x-1)).css({display:"none"});
                        $(".ss"+(x-1)).css({display:"inline"});
                    }
                });

                x++;
                err = err +5;
            }
            else{
                if( $("#company"+(x-1)).val() == ""){
                    $("#company"+(x-1)).css("border","1px solid red");
                    $(".error"+(err-4)).html("Please write your company name !").css({display:"block"});
                }
                if( $("#position"+(x-1)).val()== "" ){
                    $("#position"+(x-1)).css("border","1px solid red");
                    $(".error"+(err-3)).html("Please write your position !").css({display:"block"});
                }
                if( $("#from2_"+(x-1)).val() == "" ){
                    $("#from2_"+(x-1)).css("border","1px solid red");
                    $(".error"+(err-2)).html("Please write when you started work !").css({display:"block"});
                }
                if( $(".s"+(x-1)).val() == "" && $('.ongoing2'+(x-1)).prop("checked") == false ){
                    $(".s"+(x-1)).css("border","1px solid red");
                    $(".error"+(err-1)).html("Please write when you finished work !").css({display:"block"})
                }
                if( $("#actResp"+(x-1)).val() == "" ){
                    $("#actResp"+(x-1)).css("border","1px solid red");
                    $(".error"+(err)).html("Please write your main activities and responsibilities in work !").css({display:"block"});
                }


                $("#company"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#position"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#from2_"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $(".s"+(x-1)).click(function(){
                    $(this).css("border","");
                });
                $("#actResp"+(x-1)).click(function(){
                    $(this).css("border","");
                });

                // max_fields++;
            }
        }
    }).click(function(){
        $(".newAdd2_"+(x-1)).prepend($h);
    });

    var d =  $(".delWork .newDiv2").size();

    if( d == 3 ){   x = 4 ; err = 50 }
    if( d == 2 ){   x = 3 ; err = 45 ; }
    if( d == 1 ){   x = 2 ; err = 40 ; }
    if( d == 0 ){   x = 1 ; err = 35 ; }

    $(wrapper).on("click",'.ongoing2'+(x-1), function(){


        if($('.ongoing2'+(x-1)).prop("checked")) {
            $(".s" + (x-1)).css({pointerEvents: 'none', border: "1px solid #BEBEBE", background: "#D3D3D3"}).val("");
            $(".ss"+(x-1)).css({display:"none"});
            $(".sss"+(x-1)).css({display:"inline"});
            $(".error"+(err-1)).html("").css({display:"none"});
        }
        else {
            $(".s"+(x-1)).css({pointerEvents: 'visibleFill',border:"1px solid #ccc",background:"white"});
            $(".sss"+(x-1)).css({display:"none"});
            $(".ss"+(x-1)).css({display:"inline"});
        }
    });



    $(wrapper).on("click",".remove_field2", function(){


        var d =  $(".delWork .newDiv2").size();

        if( d == 3 ){   x = 4 }
        if( d == 2 ){   x = 3 }
        if( d == 1 ){   x = 2 }
        if( d == 0 ){   x = 1 }

        $(".ongoing2"+(x-2)).css({pointerEvents:'auto'});


        var a = confirm("Are you sure you want to delete");

        if( a == true ){

            var parent = $(this).parent("div").children("div").children("button").attr("class");


            if( parent == "delWork2 openLabel" ){
                $add2 = $(".delWork2").detach();
                $(".newAdd2_" + (x-2)).prepend($add2);
            }

            $(this).parent('div').remove();

            var dd = $(this).parent("div").children("div");

            if( dd.children("input").attr("id") == "company1" ){

                $("#company2").removeAttr("id").attr("id", "company1").removeAttr("name").attr("name", "company1");
                $("#company3").removeAttr("id").attr("id", "company2").removeAttr("name").attr("name", "company2");
                $("#position2").removeAttr("id").attr("id", "position1").removeAttr("name").attr("name", "position_name1");
                $("#position3").removeAttr("id").attr("id", "position2").removeAttr("name").attr("name", "position_name2");
                $("#from2_2").removeAttr("id").attr("id", "from2_1").removeAttr("name").attr("name", "start_date21");
                $("#from2_3").removeAttr("id").attr("id", "from2_2").removeAttr("name").attr("name", "start_date22");
                $("#to2_2").removeAttr("id").attr("id", "to2_1").removeClass("s2").addClass("s1").removeAttr("name").attr("name", "end_date21");
                $("#to2_3").removeAttr("id").attr("id", "to2_2").removeClass("s3").addClass("s2").removeAttr("name").attr("name", "end_date22");
                $("#actResp2").removeAttr("id").attr("id", "actResp1").removeAttr("name").attr("name", "main_res1");
                $("#actResp3").removeAttr("id").attr("id", "actResp2").removeAttr("name").attr("name", "main_res2");

                $(".ongoing22").removeClass("ongoing22").addClass("ongoing21");
                $(".s2").removeClass("s2").addClass("s1");
                $(".ss2").removeClass("ss2").addClass("ss1");
                $(".sss2").removeClass("sss2").addClass("sss1");

                $(".ongoing23").removeClass("ongoing23").addClass("ongoing22");
                $(".s3").removeClass("s3").addClass("s2");
                $(".ss3").removeClass("ss3").addClass("ss2");
                $(".sss3").removeClass("sss3").addClass("sss2");

                $(".newAdd2_2").removeClass("newAdd2_2").addClass("newAdd2_1");
                $(".newAdd2_3").removeClass("newAdd2_3").addClass("newAdd2_2");

                $(".error46").removeClass("error46").addClass("error41");
                $(".error47").removeClass("error47").addClass("error42");
                $(".error48").removeClass("error48").addClass("error43");
                $(".error49").removeClass("error49").addClass("error44");
                $(".error50").removeClass("error50").addClass("error45");

                $(".error51").removeClass("error51").addClass("error46");
                $(".error52").removeClass("error52").addClass("error47");
                $(".error53").removeClass("error53").addClass("error48");
                $(".error54").removeClass("error54").addClass("error49");
                $(".error55").removeClass("error55").addClass("error50");


            }
            else if( dd.children("input").attr("id") == "company2" ){

                $("#company3").removeAttr("id").attr("id", "company2").removeAttr("name").attr("name", "company2");
                $("#position3").removeAttr("id").attr("id", "position2").removeAttr("name").attr("name", "position_name2");
                $("#from2_3").removeAttr("id").attr("id", "from2_2").removeAttr("name").attr("name", "start_date22");
                $("#to2_3").removeAttr("id").attr("id", "to2_2").removeClass("s3").addClass("s2").removeAttr("name").attr("name", "end_date22");
                $("#actResp3").removeAttr("id").attr("id", "actResp2").removeAttr("name").attr("name", "main_res2");

                $(".ongoing23").removeClass("ongoing23").addClass("ongoing22");
                $(".s3").removeClass("s3").addClass("s2");
                $(".ss3").removeClass("ss3").addClass("ss2");
                $(".sss3").removeClass("sss3").addClass("sss2");

                $(".newAdd2_3").removeAttr("class").addClass("col-md-3 col-sm-12 col-xs-12 newAdd2_2");

                $(".error51").removeClass("error51").addClass("error46");
                $(".error52").removeClass("error52").addClass("error47");
                $(".error53").removeClass("error53").addClass("error48");
                $(".error54").removeClass("error54").addClass("error49");
                $(".error55").removeClass("error55").addClass("error50");
            }
            $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
                .removeAttr('disabled');
        }

        x--;
        // err= err -5;

    });

});






$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: '../select/languages.php',
        data: {'search': 'lang'},
        async: true,
        dataType: 'json',
        cache: false,
        success: function (response) {
            for (var i = 0; i < response['item_counts']; i++){
                $("#langs1").append('<option value="'+response['lang'][i].id+'">'+response['lang'][i].name_lang+'</option>');
            }
        },
        error: function (request, status, error) {
            console.log(error);
            alert(status);
        }
    });

    var max_fields      = 5;
    var wrapper         = $(".input_fields_wrap");
    var add_button      = $(".add_field_button");

    var x ;
    var lg ;

    $(add_button).click(function(e){
        e.preventDefault();

        var d =  $(".input_fields_wrap .langDiv2").size();

        if( d == 4 ){   x = 6 ; lg = 73 }
        if( d == 3 ){   x = 5 ; lg = 71 }
        if( d == 2 ){   x = 4 ; lg = 69 }
        if( d == 1 ){   x = 3 ; lg = 67 }
        if( d == 0 ){   x = 2 ; lg = 65 }

        if(x < max_fields){
            if( $('#langs'+(x-1)).val() != 0 && $('#langsLev'+(x-1)).val() != 0 ){

                var p = $('<div class="langDiv2"><div class="col-md-6 col-sm-6 col-xs-6">' +
                    '<select class="btn btn-default target selectOpt" id="langs'+x+'" name="language'+x+'">' +
                    '<option value="">Language</option></select><span class="error'+(lg+1)+' error"></span></div>' +
                    '<div class="col-md-3 col-sm-3 col-xs-3">' +
                    '<select class="btn btn-default target selectOpt" id="langsLev'+x+'" name="lang_level'+x+'">' +
                    '<option value="">Level</option><option>Basic User</option><option>Independent User</option>' +
                    '<option>Fluent User</option><option>Proficient User</option></select><span class="error'+(lg+2)+' error"></span>' +
                    '</div><div class="col-md-3 col-xs-3">' +
                    '<button class="remove_field xx xx3" >Delete <i class="fa fa-remove"></i></button></div></div>');


                p.find('select').bind("click",function(){

                    var xxx = $(this).parent("div");
                    var xx = xxx[0]['children'][1];
                    $(xx)[0].style.display = "none";

                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                $(wrapper).append(p);

                $.ajax({
                    type: 'POST',
                    url: '../select/languages.php',
                    data: {'search': 'lang'},
                    async: true,
                    dataType: 'json',
                    cache: false,
                    success: function (response) {
                        //$("#lang").empty();
                        for (var i = 0; i < response['item_counts']; i++){
                            $("#langs"+x).append('<option value="'+response['lang'][i].id+'">'+response['lang'][i].name_lang+'</option>');
                        }
                    },
                    error: function (request, status, error) {
                        console.log(error);
                        alert(status);
                    }
                });
            }else{

                if( $("#langs"+ (x-1) ).val() == "" ){
                    $("#langs"+ (x-1) ).css("border","1px solid red");
                    $(".error"+(lg-1)).html("Please write your languages !").css({display:"block"});
                }
                if( $("#langsLev"+(x-1)).val() == "" ){
                    $("#langsLev"+(x-1)).css("border","1px solid red");
                    $(".error"+lg).html("Please write your levels of languages !").css({display:"block"});
                }

                $("#langs"+(x-1) ).click(function(){
                    $(this).css("border","");
                });
                $("#langsLev"+(x-1) ).click(function(){
                    $(this).css("border","");
                });
            }

        }
    });

    $(wrapper).on("click",".remove_field", function(e){

        e.preventDefault();

        var a = confirm("Are you sure you want to delete");

        if(a==true){
            var xxx = $(this).parent('div');
            xxx.parent("div").remove();

            var d = $(this).parent("div").parent("div").children("div").children("select");

            if( d.attr("id") == "langs2" ){

                $("#langs3").removeAttr("id").attr("id", "langs2");
                $("#langsLev3").removeAttr("id").attr("id", "langsLev2");

                $("#langs4").removeAttr("id").attr("id", "langs3");
                $("#langsLev4").removeAttr("id").attr("id", "langsLev3");

                $(".error68").removeClass("error68").addClass("error66");
                $(".error69").removeClass("error69").addClass("error67");

                $(".error70").removeClass("error70").addClass("error68");
                $(".error71").removeClass("error71").addClass("error69");

            }
            else if( d.attr("id") == "langs3" ){
                $("#langs4").removeAttr("id").attr("id", "langs3");
                $("#langsLev4").removeAttr("id").attr("id", "langsLev3");

                $(".error70").removeClass("error70").addClass("error68");
                $(".error71").removeClass("error71").addClass("error69");
            }
            $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
                .removeAttr('disabled');
        }

        x--;
        lg = lg - 2;
    });

});





$(document).ready(function(){
    var max_fields      = 5;
    var wrapper         = $(".input_fields_wrap2");
    var add_button      = $(".add_field_button2");
    var x ;
    var y = 1;
    var z;

    $(add_button).click(function(e){
        e.preventDefault();

        var d =  $(".input_fields_wrap2 .numb").size();

        if( d == 3 ){   x = 4 ; z = 9; }
        if( d == 2 ){   x = 3 ; z = 8; }
        if( d == 1 ){   x = 2 ; z = 7; }
        if( d == 0 ){   x = 1 ; z = 6; }

        if( x < max_fields){

            if( $("#txtChar"+(x-1)).val() != 0 ){

                var p = $('<div class="numb"><div class="col-md-8 col-sm-8 col-xs-8 border_color" id="telo" >' +
                    '<input type="text" class="btn btn-default target numbers border_color" placeholder="(+374)77-99-99-99" ' +
                    'id="txtChar'+x+'" name="telephone'+y+'"><span class="error'+z+' error"></span></div>' +
                    '<div class="col-md-4 col-sm-4 col-xs-4" ><button class="remove_field xxx" >' +
                    'Delete <i class="fa fa-remove"></i></button></div></div>');

                p.find(".numbers").keypress(function(e){
                    var charCode ;
                    if(charCode = e.which){  e.which  }
                    else{ event.keyCode }

                    if(charCode > 31 && (charCode < 48 || charCode > 57)){
                        return false;
                    }
                });

               p.find('input[type="text"]').bind("click",function(){
                    var xxx = $(this).parent("div");
                    var xx = xxx[0]['children'][1];
                   $(xx)[0].style.display = "none";
               });

                p.find('input').keyup(function() {
                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                $(wrapper).append(p);

                y++;
                x++;


            } else {

                $(".error"+ (z-1) ).html("Please write the your mobile number!").css({display:"block"});
                $("#txtChar"+ (x-1) ).css("border","1px solid red");

                $("#txtChar"+ (x-1) ).click(function(){
                    $(this).css("border","");
                });
            }
        }

    });

    $(wrapper).on("click",".remove_field", function(e){
        e.preventDefault();

        var a = confirm("Are you sure you want to delete");
        if(a==true){
            var xxx = $(this).parent('div');
            xxx.parent('div').remove();

            var d = $(this).parent("div").parent("div").children("div");

            if( d.children("input").attr("id") == "txtChar1" ){

                $("#txtChar2").removeAttr("id").attr("id", "txtChar1").removeAttr("name").attr("name","telephone1");
                $("#txtChar3").removeAttr("id").attr("id", "txtChar2").removeAttr("name").attr("name","telephone2");
                $("#txtChar4").removeAttr("id").attr("id", "txtChar3").removeAttr("name").attr("name","telephone3");

                $(".error7").removeClass("error7").addClass("error6");
                $(".error8").removeClass("error8").addClass("error7");
                $(".error9").removeClass("error9").addClass("error8");
            }
            else if( d.children("input").attr("id") == "txtChar2" ){
                $("#txtChar3").removeAttr("id").attr("id", "txtChar2").removeAttr("name").attr("name","telephone2");
                $("#txtChar4").removeAttr("id").attr("id", "txtChar3").removeAttr("name").attr("name","telephone3");

                $(".error8").removeClass("error8").addClass("error7");
                $(".error9").removeClass("error9").addClass("error8")
            }
            else if( d.children("input").attr("id") == "txtChar3" ){
                $("#txtChar4").removeAttr("id").attr("id", "txtChar3").removeAttr("name").attr("name","telephone3");

                $(".error9").removeClass("error9").addClass("error8")
            }
            $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
                .removeAttr('disabled');
        }

        x--;
        y--;
    });


});




$(document).ready(function() {
    var max_fields      = 4;
    var wrapper         = $(".input_fields_wrap3");
    var add_button      = $(".add_field_button3");

    var x ;
    var sk ;

    $(add_button).click(function(e){
        e.preventDefault();

        var d =  $(".input_fields_wrap3 .langDiv").size();

        if( d == 4 ){   x = 5 ; sk = 65 }
        if( d == 3 ){   x = 4 ; sk = 63 }
        if( d == 2 ){   x = 3 ; sk = 61 }
        if( d == 1 ){   x = 2 ; sk = 59 }
        if( d == 0 ){   x = 1 ; sk = 57 }

        if( x < max_fields){

            if( $("#skills"+(x-1)).val() != 0 && $("#skillsLev"+(x-1)).val() != 0 ){

                var p = $('<div class="langDiv"><div class="col-md-6 col-sm-6 col-xs-6">' +
                    '<input type="text" id="skills'+x+'" class="btn btn-default target letters" placeholder="Skills" ' +
                    'name="skills_name'+x+'"><span class="error'+(sk+1)+' error"></span></div><div class="col-md-3 col-sm-3 col-xs-3">' +
                    '<select id="skillsLev'+x+'" class="btn btn-default target selectOpt" name="level_name'+x+'">' +
                    '<option value="">Level</option><option>Beginner</option><option>Intermediate</option><option>Advanced</option>' +
                    '<option>Expert</option></select><span class="error'+(sk+2) +' error"></span></div>' +
                    '<div class="col-md-3 col-sm-3 col-xs-3 "><button class="remove_field xxx xx3" >' +
                    'Delete <i class="fa fa-remove"></i></button></div></div>');

                p.find('.letters').keypress(function(e) {
                    if(e.which < 97 || e.which > 122) {
                        e.preventDefault();
                    }
                });

                p.find('input').keyup(function() {
                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');
                });

                p.find('input[type="text"]').bind("click",function(){

                    var xxx = $(this).parent("div");
                    var xx = xxx[0]['children'][1];
                    $(xx)[0].style.display = "none";

                });

                p.find('select').bind("click",function(){

                    var xxx = $(this).parent("div");
                    xxx[0]['children'][1].remove();

                    $("#submit").css({"opacity": 1,"cursor":'pointer'}).removeAttr('disabled');

                });


                $(wrapper).append(p);

            }
            else{

                if( $("#skills"+(x-1) ).val() == "" ){
                    $("#skills"+(x-1) ).css("border","1px solid red");
                    $(".error"+(sk-1)).html("Please write your skills !").css({display:"block"});
                }
                if( $("#skillsLev"+(x-1) ).val() == "" ){
                    $("#skillsLev"+(x-1) ).css("border","1px solid red");
                    $(".error"+(sk)).html("Please write your skills levels !").css({display:"block"});
                }

                $("#skills"+(x-1) ).click(function(){
                    $(this).css("border","");
                });
                $("#skillsLev"+(x-1) ).click(function(){
                    $(this).css("border","");
                })
            }
        }
    });


    $(wrapper).on("click",".remove_field", function(e){

        e.preventDefault();

        var a = confirm("Are you sure you want to delete");

        if(a==true){
            var xxx = $(this).parent('div');
            xxx.parent("div").remove();

            var d = $(this).parent("div").parent("div").children("div").children("input");

            if( d.attr("id") == "skills1" ){

                $("#skills2").removeAttr("id").attr("id", "skills1").removeAttr("name").attr("name", "skills_name1");
                $("#skillsLev2").removeAttr("id").attr("id", "skillsLev1").removeAttr("name").attr("name", "level_name1");

                $("#skills3").removeAttr("id").attr("id", "skills2").removeAttr("name").attr("name", "skills_name2");
                $("#skillsLev3").removeAttr("id").attr("id", "skillsLev2").removeAttr("name").attr("name", "level_name2");

                $(".error60").removeClass("error60").addClass("error58");
                $(".error61").removeClass("error61").addClass("error59");

                $(".error62").removeClass("error62").addClass("error60");
                $(".error63").removeClass("error63").addClass("error61");

            }
            else if( d.attr("id") == "skills2" ){
                $("#skills3").removeAttr("id").attr("id", "skills2").removeAttr("name").attr("name", "skills_name2");
                $("#skillsLev3").removeAttr("id").attr("id", "skillsLev2").removeAttr("name").attr("name", "level_name2");

                $(".error62").removeClass("error62").addClass("error60");
                $(".error63").removeClass("error63").addClass("error61");
            }

            $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
                .removeAttr('disabled');
        }


        x--;
        sk = sk-2;
    });


});



$("#submit").attr('disabled','disabled');


if( $("#submit").attr("disabled") == "disabled" ){
    $("#submit").css({"opacity": 0.7,"cursor":'default',"backgroundColor":"cornflowerblue"})
}

 if( $("#submit:enabled") ){

    $("#submit").mouseover(function(){
        $(this).css({"backgroundColor":"#5A86D5"});
    }).mouseout(function(){
        $(this).css({"backgroundColor":"cornflowerblue"});
    }).mousedown(function(){
        $(this).css({"backgroundColor":"#4668A6"});
    })
}


$('input').keyup(function() {
    $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
        .removeAttr('disabled');
});

$( "textarea" ).keyup(function() {
    $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
        .removeAttr('disabled');
});

$( "#birthdate" ).click(function() {
    $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
        .removeAttr('disabled');
});

$( "select" ).click(function() {
    $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
        .removeAttr('disabled');

});

$( "button" ).click(function() {
    $("#submit").css({"opacity": 1,"cursor":'pointer',"backgroundColor":"cornflowerblue"})
    .removeAttr('disabled');
});



























