<?php
session_start();
?>


<html>
<head>
    <title>YOUR CV</title>
    <link rel="shortcut icon" href="../form/img/image1.gif">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../form/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../form/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="shortcut icon" href="">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class=" navbar2">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href="../admin.php"><img src="../form/img/image1.jpg" class="imgCv imgCv2"></a>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <a class="navbar-brand" href="../admin.php">
                <h3 class="navbar-brand2 h3nav">MyWebSite</h3>
            </a>
            <a href="../form/index.php" class="navbar-brand users">
                <h4 class="navbar-brand2 h4nav"> CV</h4>
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 tree">
            <div class="dropdown row">
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <img src="../form/img/new.jpg" class="img">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 colName">
                    <a href="#" class="yourUsername"><b><?= $_SESSION['username'] ?></b></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </div>

                <div class="dropdown-content">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../change_password/changepass.php">
                                <h4 class="logOut">
                                    <span class="glyphicon glyphicon-lock"></span>Change password
                                </h4>
                            </a>
                        </li>
                        <hr class="miniImg">
                        <li>
                            <a href="../index.php">
                                <h4 class="logOut"><span class="glyphicon glyphicon-log-in"></span> Log out</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="tableUsers ">
    <div class="col-md-1"></div>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Mobile</th>
            <th>Skills</th>
            <th>Profession</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Mobile</th>
            <th>Skills</th>
            <th>Profession</th>
            <th class="search_company_input"></th>
            <th class="search_company_input"></th>
            <th class="search_company_input"></th>
            <th class="search_company_input"></th>
        </tr>
        </tfoot>
    </table>

    <div class="col-md-1"></div>
</div>

<div id="basicModal">
    <h4 class="titleTable">Personal information </h4>
    <table style="width:100%" class="tables">
        <tbody>
        <tr>
            <th>First Name</th>
            <td id="firstTd"></td>
            <td class="imageTh" rowspan="5">
                <img src="../form/img/img.png" id="imageTd" class="thumbnail zoom" width="60%">
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td id="lastTd"></td>
        </tr>
        <tr>
            <th>Middle Name</th>
            <td id="middleTd"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td id="emailTd"></td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td id="mobileTd"></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td id="datepickerTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td id="genderTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td id="nationalTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Country</th>
            <td id="countryTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Region</th>
            <td id="regionTd" colspan="2"></td>
        </tr>
        <tr>
            <th>City</th>
            <td id="cityTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Address</th>
            <td id="addressTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Maritial status</th>
            <td id="marStatusTd" colspan="2"></td>
        </tr>
        <tr>
            <th>Personal skills</th>
            <td id="persSkillsTd" colspan="2"></td>
        </tr>
        </tbody>
    </table>

    <br>

    <h4 class="titleTable tt">Education and training </h4>
    <div id="insts"></div>

    <h4 class="titleTable tt" id="workTit" style="display:block" >Work experience </h4>
    <div id="works" style="display:block"></div>

    <h4 class="titleTable tt" id="skillsTit" style="display:block">Professional skills </h4>
    <div id="profTable" style="display:block">
        <table style="width:100%" class="tables">
            <tr>
                <th>Skills</th>
                <th>Level</th>
            </tr>
        </table>
    </div>
    <br>

    <h4 class="titleTable tt">Language skills </h4>
    <div id="langTable">
        <table style="width:100%" class="tables">
            <tr>
                <th>Language</th>
                <th>Level</th>
            </tr>
        </table>
    </div>
</div>


<div id="contact">

    <!--    <h3 id="titleCon">Contact</h3>-->

    <div id="divCon">
        <div class="divs">
            <lable><b>To whom : </b></lable>
            <div id="emailUser" contenteditable="false" class="btn btn-default"></div>
        </div>

        <div class="divs">
            <lable><b>Content : <b></lable>
            <textarea class="btn btn-default textAdmin" id="text5" maxlength="1000" style="height:50%"
                      required=''> </textarea>
            <!--        <span id ='etext' style="color: red;display: none;padding: 0">Enter this field</span>-->
        </div>
    </div>

</div>


<div id="about1">
    <div>
        <textarea class="btn btn-default" id="notetext" contenteditable="true" maxlength="1000"></textarea>
    </div>
</div>
<div id="del" style="display: none">
    <div class="deleteUser">
        <h4 class="deleteH3">You are about to delete the complete information for this user!
            Do you really want to "Delete"?</h4>
    </div>
</div>

<script>


    $(document).ready(function () {


        $('#example tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            $('.search_company_input').html("");
        });


        var table_companies_lists = $('#example').DataTable({
            'columnDefs': [{
                'targets': '_all',
                'visible': true,
                'orderable': false

            }],
            "visible": false,
            "order": false,
            "scrollX": true,
            "serverSide": true,
            "scrollCollapse": true,
            "ajax": "../server_script/view_users_info.php",

            fixedColumns: {
                leftColumns: 0,
                rightColumns: 1
            },

            "columns": [
                {"data": "first_name"},
                {"data": "last_name"},
                {"data": "mail"},
                {"data": "telephone"},
                {
                    "data": function (data) {

                        if (data.skills_name3 != null && data.skills_name3 != "") {
                            return data.skills_name + "," + data.skills_name1 + ", ...";
                        } else {
                            if (data.skills_name2 != null && data.skills_name2 != "") {
                                return data.skills_name + "," + data.skills_name1 + ", ...";
                            } else {
                                if (data.skills_name1 != null && data.skills_name1 != "") {
                                    return data.skills_name + "," + data.skills_name1
                                } else {
                                    if (data.skills_name != null && data.skills_name != "") {
                                        return data.skills_name
                                    }
                                }
                            }

                        }
                    }
                },

                {"data": "Profession_name"},
                {
                    "data": null,
                    "defaultContent": "<div style='text-align:center' class='btn-group'><button class='openLabel openLabel2'>Open</button></div>"
                },
                {
                    "data": null,
                    "defaultContent": '<div style="text-align:center"><button  class="btn btn-danger "> Delete </button></div>'
                },
                {
                    data: null,
                    render: function (data, type, full, meta) {
                        return '<div class="openLabel openLabel3" style="text-align:center;padding-left:2px " ><span class="col-md-10 col-sm-10 col-xs-10 openLabel31">Contact</span> <span id="' + full.id + '" class="glyphicon glyphicon-ok col-md-2 col-sm-2 col-xs-2" style="display:none"></span></div>';
                    }
                },
                {
                    "data": null,
                    "defaultContent": '<div style="text-align:center"><button  class="openLabel about1" id="btnNote"> Note </button></div>'
                }
            ],

            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],

            "sDom": '<"toolbar"><"top">rt<"bottom"lp>',

//                "language": {
//                    "processing": "<div id='wait_individual_payment' style='display:block; z-index:1000;width:150px;height:89px;border:0px solid black;position:absolute;top:50%;left:50%;padding:2px;' class='span12'><div class='loader'></div> <br>Բեռնվում է..</div>",
//                    "search": "Search:",
//                    "lengthMenu": "Show _MENU_ replies ",
//                    "info": "Displayed on _START_ - _END_ row, from _TOTAL_ ",
//                    "zeroRecords": "Ոչինչ չի գտնվել, կներեք",
//                    "infoEmpty": "Հասանելի գրառումները չկան",
//                    "infoFiltered": "(Փնտրման արդյունքը _MAX_ տողից)",
//                    "paginate": {
//                        "first": "First",
//                        "last": "Last",
//                        "next": "Next",
//                        "previous": "Previous"
//                    },
//                    buttons: {
//                        print: "Տպել",
//                        copy: "Կրկնօրինակել",
//                        excel: "Արտահանել Excel-ով"
//                    }
//                },
            "processing": true
        });
        console.log($("#example tr:nth-child(4)"))
        $("#example tr:nth-child(4)").css("background", "red");


        $("div #example_wrapper").addClass("col-md-10");


        $("div.toolbar").html('<b>CV Users</b>').addClass('titleUsers');

        $("#example_length").addClass("col-md-6 col-sm-6 col-xs-6");
        $("#example_paginate").addClass("col-md-6 col-sm-6 col-xs-6");


        var table = $('#example').DataTable();

        $('#example tbody').on('click', '.openLabel2', function () {
            var data = table.row($(this).parents('tr')).data();

            $("#mobileTd").html("");
            $('#insts').html("");
            $('#works').html("");
            $('#profTable').html("<table style='width:100%' class='tables'><tr><th>Skills</th><th>Level</th></tr></table>");
            $('#langTable').html("<table style='width:100%' class='tables'><tr><th>Language</th><th>Level</th></tr></table>");

            $('#firstTd').html(data['first_name']);
            $('#lastTd').html(data['last_name']);
            $('#middleTd').html(data['middle_name']);
            $('#emailTd').html(data['mail']);
            $("#mobileTd").append(data['telephone'] + "<br>");

            for (var i = 1; i < 5; i++) {
                if (data['telephone' + i] != 0) {
                    $("#mobileTd").append(data['telephone' + i] + "<br>")
                }
            }

            var image = data['image_path'];
            if (data['image_path'] == "") {
                $('#imageTd').attr("src", "../form/img/new.jpg");
            } else {
                $('#imageTd').attr("src", "../form/" + image);
            }

            $('#persSkillsTd').html(data['pers_description']);
            $('#datepickerTd').html(data['date_of_birth']);
            $('#genderTd').html(data['gender']);
            $('#marStatusTd').html(data['marital_status']);
            $('#nationalTd').html(data['nationality_name']);
            $('#countryTd').html(data['country_name']);
            $('#regionTd').html(data['region_name']);
            $('#cityTd').html(data['city_name']);
            $('#addressTd').html(data['address']);


            $('#insts').append("<table style='width:100%' class='tables'>" +
                "<tr><th colspan='2'>Institution name</th>" +
                "<td colspan='2'>" + data['institution_name'] + "</td></tr>" +
                "<tr><th colspan='2'>Profession</th><td colspan='2'>" + data['Profession_name'] + "</td></tr>" +
                "<tr><th colspan='2'>Academic Degree</th><td colspan='2'>" + data['academic_name'] + "</td></tr>" +
                "<tr><th >From</th><td>" + data['start_date'] + "</td>" +
                "<th>To</th><td>" + data['end_date'] + "</td></tr></table><br>");


            for (var x = 1; x < 4; x++) {
                if (data['institution_name' + x] != "") {
                    $('#insts').append("<table style='width:100%' class='tables'>" +
                        "<tr><th colspan='2'>Institution name</th>" +
                        "<td colspan='2'>" + data['institution_name' + x] + "</td></tr>" +
                        "<tr><th colspan='2'>Profession</th><td colspan='2'>" + data['Profession_name' + x] + "</td></tr>" +
                        "<tr><th colspan='2'>Academic Degree</th><td colspan='2'>" + data['academic_name' + x] + "</td></tr>" +
                        "<tr><th >From</th><td>" + data['start_date' + x] + "</td>" +
                        "<th>To</th><td>" + data['end_date' + x] + "</td></tr></table><br>");
                }
            }


            if (data['company_name'] != "" && data['company_name'] != null) {
                $("#workTit").css("display","block");
                $("#works").css("display","block");

                $('#works').append("<table style='width:100%' class='tables'><tr><th colspan='2'>Company</th>" +
                    "<td colspan='2'>" + data['company_name'] + "</td></tr>" +
                    "<tr><th colspan='2'>Position</th><td colspan='2'>" + data['position_name'] + "</td></tr> " +
                    "<tr><th>From</th><td>" + data['start_date2'] + "</td><th>To</th><td>" +
                    data['end_date2'] + "</td>" +
                    "</tr><tr><th colspan='4'>Main activities and responsibilities</th></tr><tr>" +
                    "<td colspan='4'>" + data['main_res'] + "</td></tr></table><br>");
                // console.log(data['company_name'])
            }else if ( data['company_name'] == "" || data['company_name'] == null) {

                $("#workTit").css("display","none");
                $("#works").css("display","none");

            }

            for (var y = 1; y < 4; y++) {
                if (data['company_name' + y] != "") {
                    $('#works').append("<table style='width:100%' class='tables'><tr><th colspan='2'>Company</th>" +
                        "<td colspan='2'>" + data['company_name' + y] + "</td></tr>" +
                        "<tr><th colspan='2'>Position</th><td colspan='2'>" + data['position_name' + y] + "</td></tr> " +
                        "<tr><th>From</th><td>" + data['start_date2_' + y] + "</td><th>To</th><td>" +
                        data['end_date2_' + y] + "</td>" +
                        "</tr><tr><th colspan='4'>Main activities and responsibilities</th></tr><tr>" +
                        "<td colspan='4'>" + data['main_res' + y] + "</td></tr></table><br>");
                }
            }


            if (data['skills_name'] != "" && data['skills_name'] != null) {
                $("#skillsTit").css("display","block");
                $('#profTable').css("display","block");

                $('#profTable').append("<table style='width:100%' class='tables' >" +
                    "<tr><td>" + data['skills_name'] + "</td>" +
                    "<td>" + data['level_name'] + "</td></tr></table>");
            }
            else if (data['skills_name'] == "" || data['skills_name'] == null ) {
                $("#skillsTit").css("display","none");
                $('#profTable').css("display","none");
            }

            for (var i = 1; i < 4; i++) {

                if (data['skills_name' + i] != "") {
                    $('#profTable').append("<table style='width:100%' class='tables' >" +
                        "<tr><td>" + data['skills_name' + i] + "</td>" +
                        "<td>" + data['level_name' + i] + "</td></tr></table>")
                }
            }

            var id = data['id'];

            $.ajax({
                url: "./php/langs.php",
                type: "POST",
                data: {'user_id': id},
                dataType: 'json',
                success: function (data) {

                    for (var i = 0; i < 4; i++) {
                        if (data[i]['name'] != "") {
                            $('#langTable').append("<table style='width: 100%' class='tables'><tr>" +
                                "<td>" + data[i]['name'] + "</td>" +
                                "<td>" + data[i]['lang_level'] + "</td></tr></table>");

                        }
                    }
                }
            });

            $("#basicModal").dialog({
                modal: true,
                title: "All Information",
                buttons: {
                    "Close": function () {
                        $(this).dialog("close")
                    }
                    // "Print":function () {
                    // print();
                    // }
                }
            });

            $(".ui-draggable").css({
                "width": "60%",
                "height": "70%",
                "left": "20%",
                "margin":"auto"
            });

            if (window.matchMedia('(max-width: 950px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 800px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 650px)').matches) {
                $(".ui-draggable").css({
                    "width": "70%",
                    "height": "70%",
                    "left": "15%",
                    "margin":"auto"

                });
            }


            if (window.matchMedia('(max-width: 500px)').matches) {
                $(".ui-draggable").css({
                    "width": "80%",
                    "height": "70%",
                    "left": "10%",
                    "margin":"auto"

                });
            }


            $('.ui-dialog-buttonset button').addClass("openLabel buts");
        });


        $('#example tbody').on('click', '.btn-danger', function () {

            var data = table.row($(this).parents('tr')).data();
            var id2 = data['id'];
            $("#del").dialog({
                modal: true,
                buttons: [{
                    text: "Delete",
                    class: "fbut",
                    click: function () {
                        $.ajax({
                            url: "./php/delete.php",
                            type: "POST",
                            data: {'user_id2': id2},
                            dataType: 'json',
                            success: function () {

                            }
                        });
                        location.reload();
                    }
                }, {
                    text: "Cancel",
                    class: "fbut2",
                    click: function () {
                        $(this).dialog("close");
                    }
                }]
            });

            $(".ui-draggable").css({
                "width": "40%",
                "height": "50%",
                "left": "30%",
                "margin":"auto"

            });

            if (window.matchMedia('(max-width: 950px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 800px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 650px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });

            }


            if (window.matchMedia('(max-width: 500px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });

            }

        });


        //Contact

        $.ajax({
            url: "../server_script/view_users_info.php",
            type: "POST",
            dataType: 'json',
            success: function (res) {
                for (var i = 0; i < res.data.length; i++) {
                    if (res.data[i]['content'] == "1") {
                        $("#" + res.data[i]['id']).css('display', 'block');
                    }
                }
            }
        });

        $('#example tbody').on('click', '.openLabel3', function () {
            $("#contact").dialog({
                modal: true,
                title: "Contact",
                buttons: [
                    {
                        text: "Send",
                        'class': "sendcon",
                        click: function () {

                            var pattern1 = new RegExp('[a-zA-Z0-9_-]{1,1000}$');

                            var text = $("#text5").val();

                            if (!pattern1.test(text)) {
                                $('#text5').css("border", '1px solid red');
                                alert("Please enter all fields");

                            } else {

                                $('#text5').css("border", '1px solid green');

                                $(this).dialog("close");
                                $.ajax({
                                    url: "./php/message.php",
                                    type: "POST",
                                    dataType: 'json',
                                    data: {
                                        'con_id': data2['id'],
                                        'email': data2['mail'],
                                        'mass': text
                                    },
                                    success: function () {
                                        alert("Message has reached")
                                        location.reload();
                                    }

                                });
                            }
                        }
                    },
                    {
                        text: "Close",
                        click: function () {
                            $(this).dialog("close");

                        }
                    }

                ]

            });

            var data2 = table.row($(this).parents('tr')).data();

            $(".ui-dialog-buttonset button").addClass("openLabel");

            $(".ui-draggable").css({
                "width": "40%",
                "height": "60%",
                "left": "30%",

            });

            if (window.matchMedia('(max-width: 950px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 800px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });
            }

            if (window.matchMedia('(max-width: 650px)').matches) {
                $(".ui-draggable").css({
                    "width": "60%",
                    "height": "70%",
                    "left": "20%",
                    "margin":"auto"

                });

            }


            if (window.matchMedia('(max-width: 500px)').matches) {
                $(".ui-draggable").css({
                    "width": "70%",
                    "height": "80%",
                    "left": "15%",
                    "margin":"auto"

                });

            }


            $("#emailUser").html(data2['mail']);
            if ($("#emailUser").html(data2['mail'])) {
                $("#emailUser").attr("disabled", "disabled")
            }
        });

        $(".ui-dialog-buttonset button").addClass('buttons');


        $('#example tbody').on('click', '.about1', function () {
            var data5 = table.row($(this).parents('tr')).data();
            var id7 = data5['id'];

            $("#about1").dialog({
                modal: true,
                title: "Note",
                buttons: [
                    {
                        text: "Save",
                        "class": 'cancelButtonClass openLabel',
                        "id": "saveNote",
                        click: function () {

                            var description = $("#notetext").val();

                            $.ajax({
                                url: "php/aboutuser.php",
                                type: "POST",
                                data: {
                                    'description': description,
                                    'users_data_id': id7
                                },
                                success: function () {

                                }
                            });

                            $(this).dialog("close");
                            location.reload();
                        }
                    },
                    {

                        text: "Close",
                        "id": "saveNote",
                        "class":"openLabel",
                        click: function () {
                            $(this).dialog("close");

                        }
                    }
                ]

            });

            var data6 = table.row($(this).parents('tr')).data();
            $("#notetext").val(data6['note']);

            $(".ui-draggable").css({
                "width": "36%",
                "height": "50%",
                "left": "32%",

            });

            if ($("#notetext").val() == "") {
                $("#btnNote").background = "red";
                // $('#saveNote').attr("disabled","disabled");
            } else {
                $("#btnNote").background = "blue"
            }
        })


        // table_companies_lists.columns([6]).visible(false);
        table_companies_lists.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });

</script>

<script src="../resource/js/admin.js"></script>
</body>
</html>





