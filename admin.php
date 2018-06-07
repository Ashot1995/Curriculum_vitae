<?php
session_start();

include_once "db.php";
if (!isset($_SESSION['permission']) && !isset($_SESSION['password'])) {
    header('location:index.php?err=1');
    header('location:index.php');

}

?>


<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR CV</title>
    <link rel="shortcut icon" href="form/img/image1.gif">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resource/css/style.css">
    <!--<link rel="stylesheet" href="fonts/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="resource/js/jquery-3.2.1.min.js"></script>
    <!--<script src="resource/js/bootstrap.min.js"></script>-->


</head>
<body class="blue">

<script type="text/javascript">
    $(document).ready(function () {
        $('#change').click(function () {
            $.post({
                url: 'adminlog.php',
                data: $('form').serializeArray(),
                dataType: "json",
                success: function (response) {
                    $('#tbodyTable').empty();

                    $.each(response, function (index, val) {

                        if( val.username == "admin" ){
                            var i = index;
                            var inputTrue = "<input type='radio' disabled='disabled' name='";
                            inputTrue += val.id;
                            inputTrue += "' value='true'/>";
                            var inputFalse = "<input type='radio' disabled='disabled' name='";
                            inputFalse += val.id;
                            inputFalse += "' value='false'/>";
                            var column1 = $("<th />").text(i + 1 );
                            var column2 = $("<td />").text(val.username);
                            var column3 = $("<td />").text(val.permission);
                            var column4 = $("<td />").html(inputTrue);
                            var column5 = $("<td />").html(inputFalse);
                            var row = $("<tr />")
                                .append(column1)
                                .append(column2)
                                .append(column3)
                                .append(column4)
                                .append(column5);
                            $('#tbodyTable').append(row);
                        }else{
                            var i = index;
                            var inputTrue = "<input type='radio' name='";
                            inputTrue += val.id;
                            inputTrue += "' value='true'/>";
                            var inputFalse = "<input type='radio' name='";
                            inputFalse += val.id;
                            inputFalse += "' value='false'/>";
                            var column1 = $("<th />").text(i + 1 );
                            var column2 = $("<td />").text(val.username);
                            var column3 = $("<td />").text(val.permission);
                            var column4 = $("<td />").html(inputTrue);
                            var column5 = $("<td />").html(inputFalse);
                            var row = $("<tr />")
                                .append(column1)
                                .append(column2)
                                .append(column3)
                                .append(column4)
                                .append(column5);
                            $('#tbodyTable').append(row);
                        }



                    });
                }
            });
        });


    });



</script>


<?php

$users = "SELECT `username`, `permission` FROM `user` ";

$result = mysqli_query($conn, $users);
//$row = mysqli_fetch_assoc($result);

?>

<nav class="navbar navbar-default navbar_2">
    <div class=" navbar2">
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href=""><img src="form/img/image1.jpg" class="imgCv imgCv3"></a>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <a class="navbar-brand" href="">
                <h3 class="h3nav">MyWebSite</h3>
            </a>
            <a href="table_data_users/table.php" class="navbar-brand users">
                <h4 class="navbar-brand2 h4nav"> Users</h4>
            </a>
            <a href="form/index.php" class="navbar-brand users">
                <h4 class="navbar-brand2 h4nav"> CV</h4>
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <div class="dropdown row">
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <img src="form/img/new.jpg" class="img">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 colName">
                    <a href="#" class="yourUsername"><b><?= $_SESSION['username'] ?></b></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 colImage">
                    <!--                            <span class="fa fa-bars"></span>-->
                    <span class="glyphicon glyphicon-list glyph" aria-hidden="true"></span>
                </div>
                <div class="dropdown-content">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="change_password/changepass.php">
                                <h4 class="logOut">
                                    <span class="glyphicon glyphicon-lock glyph"></span>Change password
                                </h4>
                            </a>
                        </li>
                        <hr class="miniImg">
                        <li>
                            <a href="logout.php">
                                <h4 class="logOut"><span class="glyphicon glyphicon-log-in glyph"></span> Log out</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="">

    <div class="col-md-2 col-sm-1"></div>
    <div class="div1 col-md-8 col-sm-10 col-xs-12" >
        <form class="formic" method="post">
            <div class="">
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Permission</th>
                        <th>Admin</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTable">

                    <script>

                        $.post({
                            url: 'adminlog.php',
                            data: $('form').serializeArray(),
                            dataType: "json",
                            success: function (response) {
                                    $('#tbodyTable').empty();

                                    $.each(response, function (index, val) {

                                        if( val.username == "admin" ){
                                            var i = index;
                                            var inputTrue = "<input type='radio' disabled='disabled' name='";
                                            inputTrue += val.id;
                                            inputTrue += "' value='true'/>";
                                            var inputFalse = "<input type='radio' disabled='disabled' name='";
                                            inputFalse += val.id;
                                            inputFalse += "' value='false'/>";
                                            var column1 = $("<th />").text(i + 1 );
                                            var column2 = $("<td />").text(val.username);
                                            var column3 = $("<td />").text(val.permission);
                                            var column4 = $("<td />").html(inputTrue);
                                            var column5 = $("<td />").html(inputFalse);
                                            var row = $("<tr />")
                                                .append(column1)
                                                .append(column2)
                                                .append(column3)
                                                .append(column4)
                                                .append(column5);
                                            $('#tbodyTable').append(row);
                                        }else{
                                            var i = index;
                                            var inputTrue = "<input type='radio' name='";
                                            inputTrue += val.id;
                                            inputTrue += "' value='true'/>";
                                            var inputFalse = "<input type='radio' name='";
                                            inputFalse += val.id;
                                            inputFalse += "' value='false'/>";
                                            var column1 = $("<th />").text(i + 1 );
                                            var column2 = $("<td />").text(val.username);
                                            var column3 = $("<td />").text(val.permission);
                                            var column4 = $("<td />").html(inputTrue);
                                            var column5 = $("<td />").html(inputFalse);
                                            var row = $("<tr />")
                                                .append(column1)
                                                .append(column2)
                                                .append(column3)
                                                .append(column4)
                                                .append(column5);
                                            $('#tbodyTable').append(row);
                                        }

                                    });
                                }
                        });

                    </script>


                    </tbody>
                    <br/>
                </table>
            </div>

            <div class="click">
                <button type="button" class="btn-success change" id="change">- C H A N G E -</button>
            </div>
        </form>
    </div>

    <div class="col-md-2 col-sm-1"></div>

</div>


</body>
</html>

<script src="resource/js/admin.js"></script>


