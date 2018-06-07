<?php
//Include the database configuration file
include '../db.php';

if(!empty($_POST["country_id"])){
 $countryId = $_POST['country_id'];
    $query = $conn->query("SELECT * FROM regions WHERE regions.country_id = ".$countryId." ORDER BY region_name ASC");

    $rowCount = $query->num_rows;
    //region option list
    if($rowCount > 0){
        echo '<option value="">Select region</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>';
        }
    }else{
        echo '<option value="">region not available</option>';
    }
}elseif(!empty($_POST["region_id"])){
    $regionId = $_POST['region_id'];

    //Fetch all city data
    $query = $conn->query("SELECT * FROM cities WHERE cities.region_id = ".$regionId." ORDER BY city_name ASC");

    //Count total number of rows
    $rowCountReg = $query->num_rows;

    //City option list
    if($rowCountReg > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>