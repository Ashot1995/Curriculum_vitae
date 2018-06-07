<?php
/**
 * Created by PhpStorm.
 * User: Mic-User-09
 * Date: 2/20/2018
 * Time: 12:39 PM
 */
include "../db.php";
$sql = "SELECT * FROM `nationality`";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo '<option value="' . $row['id'] . '">' . $row['nationality_name'] . '</option>';
}
$conn -> close();