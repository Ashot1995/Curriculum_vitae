<?php
/**
 * Created by PhpStorm.
 * User: Mic-User-09
 * Date: 2/20/2018
 * Time: 12:40 PM
 */
include '../db.php';


$query = $conn->query("SELECT `countries`.country_id, `countries`.country_name FROM countries ORDER BY countries.`country_name` ASC");


$rowCount = $query->num_rows;
?>
<?php

if ($rowCount > 0) {
    while ($row = $query->fetch_assoc()) {
        print_r($row);
        echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
    }
}