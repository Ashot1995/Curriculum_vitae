<?php
/**
 * Created by PhpStorm.
 * User: ashot
 * Date: 6/1/18
 * Time: 4:40 PM
 */


session_start();

header("Location: index.php");
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['permission']);
session_destroy();
