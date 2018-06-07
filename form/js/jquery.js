var y = new Date();
var n = y.getFullYear();
var m = y.getMonth() + 1;
var d = y.getDate();
var a = n - 18;


$('#birthdate').datepicker({
    startView: 2,
    maxViewMode: 2,
    defaultViewDate: {year: new Date().getFullYear() - 20, month: 01, day: 01},
    endDate: new Date(a + '-' + m + '-' + d),
    format: 'yyyy-mm-dd'
});

$('.date1').datepicker({
    defaultViewDate: {year: new Date().getFullYear() - 20, month: 01, day: 01},
    format: 'yyyy-mm-dd',
    endDate: new Date(),
});

$(document).ready(function () {
    $('#country').change(function () {
        var countryID = $(this).val();

        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'country_id=' + countryID,
                success: function (html) {

                    $('#region').html(html);
                    $('#city').html('<option value="">Select region first</option>');
                }
            });
        } else {
            $('#region').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select region first</option>');
        }
    });

    $('#region').change(function () {
        var regionID = $(this).val();
        if (regionID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'region_id=' + regionID,
                success: function (html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#city').html('<option value="">Select region first</option>');
        }
    });
});


$(document).ready(function () {

    $("#submit").on("click", function () {

        var first = $("#first").val();
        var last = $("#last").val();
        var middle = $("#middle").val();
        var email = $("#email").val();
        var mobile = $("#mobileTd");
        var datepicker = $("#birthdate").val();
        var gender = $("#gender").val();
        var national = $("#national>option:selected").text();
        var country = $("#country>option:selected").text();
        var region = $("#region>option:selected").text();
        var city = $("#city>option:selected").text();
        var address = $("#address").val();
        var insts = $("#insts");
        var works = $("#works");
        var profTable = $("#profTable");
        var langTable = $("#langTable");
        var persSkills = $("#persSkills").val();
        var marStatus = $("#marStatus").val();

        mobile.html("");
        insts.html("");
        works.html("");
        profTable.html("<table style='width:100%'><tr><th>Skills</th><th>Level</th></tr></table>");
        langTable.html("<table style='width:100%'><tr><th>Language</th><th>Level</th></tr></table>");

        var number = "one";


        if (first == "") {
            number = "two";
            $("#first").css({borderColor: "red"});
            $(".error1").html("Please write your firstname !").css({display: "block"})
        }
        else {
            $('#firstTd').html(first);
        }

        if (last == "") {
            number = "two";
            $("#last").css({borderColor: "red"});
            $(".error2").html("Please write your lastname !").css({display: "block"})
        }
        else {
            $('#lastTd').html(last);
        }

        if (middle == "") {
            number = "two";
            $("#middle").css({borderColor: "red"});
            $(".error3").html("Please write your middlename !").css({display: "block"})
        }
        else {
            $('#middleTd').html(middle);
        }

        var patt = /^[\w.]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
        if (email == "" || (email != "" && patt.test(email) == false)) {
            number = "two";
            $("#email").css({borderColor: "red"});
            $(".error4").html("Please write your email !").css({display: "block"})
        } else if (patt.test(email) == true) {
            $('#emailTd').html(email);
        }

        var mb = 5;

        for (var i = 0; i < 5; i++) {
            if ($("#txtChar" + i).length == 1 && $("#txtChar" + i).val() != "") {
                mobile.append($("#txtChar" + i).val() + "<br>")
            } else if ($("#txtChar" + i).length == 1 && $("#txtChar" + i).val() == "") {
                number = "two";
                $("#txtChar" + i).css({borderColor: "red"});
                $(".error" + mb).html("Please write the your mobile number!").css({display: "block"})
            }
            $("#txtChar" + i).bind("click", function () {

                if ($(this).css({borderColor: "red"})) {
                    $(this).css({borderColor: ""});
                }
            });

            mb = mb + 1;
        }


        var image = $(".newImg").attr("src");

        // if ( $(".croppie-container").css({ backgroundImage : "img/new.jpg" } ) ){
        //     $(".imageTh").html('<img src="img/new.jpg" width="60%" id="imageTd">');
        // }
        // else

        if ($(".newImg").attr("src") == undefined && $(".croppie-container").css({backgroundImage: "img/new.jpg"})) {
            $(".imageTh").html('<img src="img/new.jpg" width="60%" id="imageTd">');
        }
        else if ($("#upload-demo-i").css("display") == "block" && $(".newImg").attr("src") != "") {

            $(".imageTh").html('<img src=' + image + ' width="60%" id="imageTd" class="zoom">');
        }


        $('#persSkillsTd').html(persSkills);

        if (datepicker == "") {
            number = "two";
            $("#birthdate").css({borderColor: "red"});
            $(".error10").html("Please write your birthdate !").css({display: "block"})
        }
        else {
            $('#datepickerTd').html(datepicker);
        }

        if (gender == "") {
            number = "two";
            $("#gender").css({borderColor: "red"});
            $(".error11").html("Please write your gender !").css({display: "block"})
        }
        else {
            $('#genderTd').html(gender);
        }

        $('#marStatusTd').html(marStatus);
        $('#nationalTd').html(national);
        //
        if ($("#country").val() == "") {
            number = "two";
            $("#country").css({borderColor: "red"});
            $(".error12").html("Please write your country !").css({display: "block"})
        }
        else {
            $('#countryTd').html(country);
        }

        if ($("#region").val() == "") {
            number = "two";
            $("#region").css({borderColor: "red"});
            $(".error13").html("Please write your region !").css({display: "block"})
        }
        else {
            $('#regionTd').html(region);
        }

        if ($("#city").val() == "") {
            number = "two";
            $("#city").css({borderColor: "red"});
            $(".error14").html("Please write your city / Village !").css({display: "block"})
        }
        else {
            $('#cityTd').html(city);
        }

        if (address == "") {
            number = "two";
            $("#address").css({borderColor: "red"});
            $(".error15").html("Please write your address !").css({display: "block"})
        }
        else {
            $('#addressTd').html(address);
        }

        var er = 15;

        for (var x = 0; x < 4; x++) {

            if ($("#institut" + x).val() == "") {
                number = "two";
                $("#institut" + x).css({borderColor: "red"});
                $(".error" + (er + 1)).html("Please write your institution name !").css({display: "block"})
            }
            if ($("#prof" + x).val() == "") {
                number = "two";
                $("#prof" + x).css({borderColor: "red"});
                $(".error" + (er + 2)).html("Please write your profession !").css({display: "block"})
            }
            if ($("#academic" + x).val() == "") {
                number = "two";
                $("#academic" + x).css({borderColor: "red"});
                $(".error" + (er + 3)).html("Please write your academic degree  !").css({display: "block"})
            }
            if ($("#from" + x).val() == "") {
                number = "two";
                $("#from" + x).css({borderColor: "red"});
                $(".error" + (er + 4)).html("Please write when you started studying !").css({display: "block"})
            }
            if ($("#to" + x).val() == "" && $("#to" + x).css("pointer-events") != "none") {
                number = "two";
                $("#to" + x).css({borderColor: "red"});
                $(".error" + (er + 5)).html("Please write when you are finished studying !").css({display: "block"})
            }

            $("#institut" + x).bind("click", function () {
                $(this).css({borderColor: ""});
            });
            $("#prof" + x).bind("click", function () {
                $(this).css({borderColor: ""});
            });
            $("#academic" + x).bind("click", function () {
                $(this).css({borderColor: ""});
            });
            $("#from" + x).bind("click", function () {
                $(this).css({borderColor: ""});
            });
            $("#to" + x).bind("click", function () {
                $(this).css({borderColor: ""});
            });


            if ($("#institut" + x).length == 1 && $("#institut" + x).val() != "" && $("#prof" + x).val() != "" &&
                $("#academic" + x).val() != "" && $("#from" + x).val() != "" && ($("#to" + x).val() != ""
                    || $("#to" + x).css("pointer-events") == "none")) {
                insts.append("<table style='width:100%'>" +
                    "<tr><th colspan='2'>Institution name" + x + "</th>" +
                    "<td colspan='2'>" + $("#institut" + x).val() + "</td></tr>" +
                    "<tr><th colspan='2'>Profession</th><td colspan='2'>" + $("#prof" + x).val() + "</td></tr>" +
                    "<tr><th colspan='2'>Academic Degree</th><td colspan='2'>" + $("#academic" + x).val() + "</td></tr>" +
                    "<tr><th >From</th><td>" + $("#from" + x).val() + "</td>" +
                    "<th>To</th><td>" + $("#to" + x).val() + "</td></tr></table><br>");

                er = er + 5;
            }
        }


        // Company

        var errr = 35;

        if (( $("#company0").val() != "" && $("#position0").val() != "" && $("#from2_0").val() != "" &&
            ($("#to2_0").val() != "" || $("#to2_0").css("pointer-events") == "none") &&
            $("#actResp0").val() != "")  ) {

            // $("#text5").css("display","block");

            works.append("<table style='width:100%'><tr><th colspan='2'>Company</th>" +
                "<td colspan='2'>" + $("#company0").val() + "</td></tr>" +
                "<tr><th colspan='2'>Position</th><td colspan='2'>" + $("#position0").val() + "</td></tr> " +
                "<tr><th>From</th><td>" + $("#from2_0").val() + "</td><th>To</th><td>" + $("#to2_0").val() + "</td>" +
                "</tr><tr><th colspan='4'>Main activities and responsibilities</th></tr><tr>" +
                "<td colspan='4'>" + $("#actResp0").val() + "</td></tr></table><br>");

        }
        else if( $("#company0").val() == "" && $("#position0").val() == ""
            && $("#from2_0").val() == "" && $("#to2_0").val() == "" && $("#actResp0").val() == "" ){
            works.remove();
            $("#workTitle").remove();
        }
        else {
            // $("#text5").css("display","none");

            for (var i = 0; i < 5; i++) {
                if ($(".w" + i).val() == "") {
                    number = "two";
                    $(".w" + i).css({borderColor: "red"});
                }
                $(".w" + i).bind("click", function () {
                    $(this).css({borderColor: ""})
                });
            }

            if ($(".w0").val() == 0) {
                $(".error" + (errr + 1)).html("Please write your company name !").css({display: "block"})
            }
            if ($(".w1").val() == 0) {
                $(".error" + (errr + 2)).html("Please write your position !").css({display: "block"})
            }
            if ($(".w2").val() == 0) {
                $(".error" + (errr + 3)).html("Please write when you started work !").css({display: "block"})
            }
            if ($(".w3").val() == 0) {
                $(".error" + (errr + 4)).html("Please write when you finished work !").css({display: "block"})
            }
            if ($(".w4").val() == 0) {
                $(".error" + (errr + 5)).html("Please write your main activities and responsibilities in work !").css({display: "block"})
            }
        }


        var err = 40;

        for (var y = 1; y < 4; y++) {
            if ($("#company" + y).val() == "") {
                number = "two";
                $("#company" + y).css({borderColor: "red"});
                $(".error" + (err + 1)).html("Please write your company name !").css({display: "block"})
            }
            if ($("#position" + y).val() == "") {
                number = "two";
                $("#position" + y).css({borderColor: "red"});
                $(".error" + (err + 2)).html("Please write your position !").css({display: "block"})
            }
            if ($("#from2_" + y).val() == "") {
                number = "two";
                $("#from2_" + y).css({borderColor: "red"});
                $(".error" + (err + 3)).html("Please write when you started work !").css({display: "block"})
            }
            if ($("#to2_" + y).val() == "" && $("#to2_" + x).css("pointer-events") != "none") {
                number = "two";
                $("#to2_" + y).css({borderColor: "red"});
                $(".error" + (err + 4)).html("Please write when you finished work !").css({display: "block"})
            }
            if ($("#actResp" + y).val() == "") {
                number = "two";
                $("#actResp" + y).css({borderColor: "red"});
                $(".error" + (err + 5)).html("Please write your main activities and responsibilities in work !").css({display: "block"})
            }

            if ($("#company" + y).length == 1 && $("#company" + y).val != "" && $("#position" + y).val != "" &&
                $("#from2_" + y).val != "" && ($("#to2_" + y).val != "" ||
                    $("#to2_" + y).css("pointer-events") == "none") && $("#actResp" + y).val != "") {
                works.append("<table style='width:100%'><tr><th colspan='2'>Company</th>" +
                    "<td colspan='2'>" + $("#company" + y).val() + "</td></tr>" +
                    "<tr><th colspan='2'>Position</th><td colspan='2'>" + $("#position" + y).val() + "</td></tr> " +
                    "<tr><th>From</th><td>" + $("#from2_" + y).val() + "</td><th>To</th><td>" + $("#to2_" + y).val() + "</td>" +
                    "</tr><tr><th colspan='4'>Main activities and responsibilities</th></tr><tr>" +
                    "<td colspan='4'>" + $("#actResp" + y).val() + "</td></tr></table><br>");
            }

            $("#company" + y).bind("click", function () {
                $(this).css({borderColor: ""})
            });
            $("#position" + y).bind("click", function () {
                $(this).css({borderColor: ""})
            });
            $("#from2_" + y).bind("click", function () {
                $(this).css({borderColor: ""})
            });
            $("#to2_" + y).bind("click", function () {
                $(this).css({borderColor: ""})
            });
            $("#actResp" + y).bind("click", function () {
                $(this).css({borderColor: ""})
            })

            err = err + 5;
        }


        var sk = 55;

        for (var i = 0; i < 4; i++) {
            if (i == 0) {
                if ($("#skills" + i).val() != "" && $("#skillsLev" + i).val() != "") {
                    profTable.append("<table style='width:100%' ><tr><td>" + $("#skills" + i).val() + "</td>" +
                        "<td>" + $("#skillsLev" + i).val() + "</td></tr></table>")
                } else if ($("#skills" + i).val() == "" && $("#skillsLev" + i).val() != "") {
                    number = "two";
                    $("#skills" + i).css({borderColor: "red"});
                    $(".error" + (sk + 1)).html("Please write your skills !").css({display: "block"})

                } else if ($("#skills" + i).val() != "" && $("#skillsLev" + i).val() == "") {
                    number = "two";
                    $("#skillsLev" + i).css({borderColor: "red"});
                    $(".error" + (sk + 2)).html("Please write your skills levels !").css({display: "block"});
                } else if( $("#skills" + i).val() == "" && $("#skillsLev" + i).val() == "") {
                    profTable.remove();
                    $("#profTitle").remove()
                }
            }
            else if (i > 0) {
                sk = sk + 2;

                if ($("#skills" + i).length == 1 && $("#skills" + i).val() != "" && $("#skillsLev" + i).val() != "") {
                    profTable.append("<table style='width:100%' ><tr><td>" + $("#skills" + i).val() + "</td>" +
                        "<td>" + $("#skillsLev" + i).val() + "</td></tr></table>")
                }

                if ($("#skills" + i).val() == "") {
                    number = "two";
                    $("#skills" + i).css({borderColor: "red"});
                    $(".error" + (sk + 1)).html("Please write your skills !").css({display: "block"})
                }
                if ($("#skillsLev" + i).val() == "") {
                    number = "two";
                    $("#skillsLev" + i).css({borderColor: "red"});
                    $(".error" + (sk + 2)).html("Please write your skills levels !").css({display: "block"})
                }
            }


            $("#skills" + i).bind("click", function () {
                $(this).css({borderColor: ""})
            });
            $("#skillsLev" + i).bind("click", function () {
                $(this).css({borderColor: ""})
            })
        }


        var lg = 63;

        for (var i = 1; i < 5; i++) {
            if ($("#langs" + i).length == 1 && $("#langs" + i).val() != "" && $("#langsLev" + i).val() != "") {
                langTable.append("<table style='width: 100%'><tr>" +
                    "<td>" + $("#langs" + i + ">option:selected").text() + "</td>" +
                    "<td>" + $("#langsLev" + i).val() + "</td></tr></table>")
            }
            if ($("#langs" + i).val() == "") {
                number = "two";
                $("#langs" + i).css({borderColor: "red"});
                $(".error" + (lg + 1)).html("Please write your languages !").css({display: "block"});
            }
            if ($("#langsLev" + i).val() == "") {
                number = "two";
                $("#langsLev" + i).css({borderColor: "red"});
                $(".error" + (lg + 2)).html("Please write your levels of languages !").css({display: "block"});
            }
            $("#langs" + i).bind("click", function () {
                if ($(this).css({borderColor: "red"})) {
                    $(this).css({borderColor: ""})
                }
            });
            $("#langsLev" + i).bind("click", function () {
                if ($(this).css({borderColor: "red"})) {
                    $(this).css({borderColor: ""})
                }
            });

            lg = lg + 2;
        }

        if (number == "one") {
            $(".ui-front").css({display: "block"});

            var image28 = $("#upload1").attr("src");
            var value1 = $("#one").serializeArray();
            var value2 = $("#two").serializeArray();
            var value3 = $("#three").serializeArray();
            var value4 = $("#four").serializeArray();
            var value5 = $("#five").serializeArray();
            var value6 = $("#six").serializeArray();

            var variab = {
                image28,
                value1,
                value2,
                value3,
                value4,
                value5,
                value6
            };

            $("#basicModal").dialog({
                modal: true,
                title: "Are you sure?",
                buttons: {
                    "YES": function () {
                        $.ajax({
                            type: 'POST',
                            url: "insertdb/insert.php",
                            data: variab,
                            dataType: 'json',
                            success: function () {

                            }
                        });
                        $(".ui-front").css({display: "none"});
                        $("#load").css("display", "inline");

                        $("#submit").css({"opacity": 0.7,"cursor":'default'}).attr('disabled','disabled')
                            .mouseover(function(){
                                $(this).css("background-color","cornflowerblue")
                            });

                        location.reload();

                        setTimeout(function () {
                            alert("Your data successfully saved")
                        }, 3000)

                    },
                    "NO": function () {
                        $(this).dialog("close");

                        $("#submit").css({"opacity": 0.7,"cursor":'default'}).attr('disabled','disabled')
                            .mouseover(function(){
                                $(this).css("background-color","cornflowerblue")
                            });
                    }

                }
            });
            $(".ui-dialog-buttonset button").addClass("openLabel")
        }

    });


    $('input[type="text"]').bind("click", function () {

        var xxx = $(this).parent("div");
        var xx = xxx[0]['children'][2];
        $(xx)[0].style.display = "none";
    });

    $('input[type="email"]').bind("click", function () {

        var xxx = $(this).parent("div");
        var xx = xxx[0]['children'][2];
        $(xx)[0].style.display = "none";

    });

    $('textarea').bind("click", function () {

        var xxx = $(this).parent("div");
        var xx = xxx[0]['children'][1];
        $(xx)[0].style.display = "none";

    });

    $('select').bind("click", function () {

        var xxx = $(this).parent("div");
        var xx = xxx[0]['children'][2];
        $(xx)[0].style.display = "none";

    });


});



































