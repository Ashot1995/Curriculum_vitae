<?php
/**
 * Created by Eridatech
 * User: Vardan
 * Date: 2/12/18
 * Time: 5:46 PM
 */

session_start();
$username=$_SESSION['username'];
include "../db.php";
//$db = new Db();

$pattern_addres_building = "/^([\w\.\/\-Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s\t]+)([\*]+)([\w\.\/\-Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s\t]*)([\*]?)([\w\.\/\-Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s\t]*)$/";
$pattern_addres_home = "/^([\w\.\/\-Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s\t]+)([\+]+)([\w\.\/\-Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s\t]*)$/";
$pattern_person_name = "/^([Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ\s]+)([\*]*)([Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ]*)([\*]*)([Ա-ՖՔՐՑՒՓՕՈՉՊՋՌՏՎա-ֆքրցւփևօ]*)$/";


$aColumns = array(
    '`users_data`.`id`',
    '`users_data`.`first_name`',
    '`users_data`.`last_name`',
    '`users_data`.`middle_name`',
    '`users_data`.`mail`',
    '`users_data`.`telephone`',
    '`users_data`.`telephone1`',
    '`users_data`.`telephone2`',
    '`users_data`.`telephone3`',
    '`users_data`.`telephone4`',
    '`users_data`.`image_path`',
    '`users_data`.`pers_description`',
    '`users_data`.`date_of_birth`',
    '`users_data`.`gender`',
    '`users_data`.`marital_status`',
    '`nationality`.`nationality_name`',

    '`address`.`address`',
    '`countries`.`country_name`',
    '`regions`.`region_name`',
    '`cities`.`city_name`',

    '`education`.`institution_name`',
    '`education`.`Profession_name`',
    '`user_educat`.`academic_name`',
    '`user_educat`.`start_date`',
    '`user_educat`.`end_date`',
    '`education`.`institution_name1`',
    '`education`.`Profession_name1`',
    '`user_educat`.`academic_name1`',
    '`user_educat`.`start_date1`',
    '`user_educat`.`end_date1`',
    '`education`.`institution_name2`',
    '`education`.`Profession_name2`',
    '`user_educat`.`academic_name2`',
    '`user_educat`.`start_date2`',
    '`user_educat`.`end_date2`',
    '`education`.`institution_name3`',
    '`education`.`Profession_name3`',
    '`user_educat`.`academic_name3`',
    '`user_educat`.`start_date3`',
    '`user_educat`.`end_date3`',

    '`company`.`company_name`',
    '`user_company`.`position_name`',
    '`user_company`.`start_date2`',
    '`user_company`.`end_date2`',
    '`user_company`.`main_res`',
    '`company`.`company_name1`',
    '`user_company`.`position_name1`',
    '`user_company`.`start_date2_1`',
    '`user_company`.`end_date2_1`',
    '`user_company`.`main_res1`',
    '`company`.`company_name2`',
    '`user_company`.`position_name2`',
    '`user_company`.`start_date2_2`',
    '`user_company`.`end_date2_2`',
    '`user_company`.`main_res2`',
    '`company`.`company_name3`',
    '`user_company`.`position_name3`',
    '`user_company`.`start_date2_3`',
    '`user_company`.`end_date2_3`',
    '`user_company`.`main_res3`',

    '`skills`.`skills_name`',
    '`user_company_skills`.`level_name`',
    '`skills`.`skills_name1`',
    '`user_company_skills`.`level_name1`',
    '`skills`.`skills_name2`',
    '`user_company_skills`.`level_name2`',
    '`skills`.`skills_name3`',
    '`user_company_skills`.`level_name3`',
    '`aboutUser`.`note`',
    '`contact_user`.`content`'

);


$join = "LEFT JOIN nationality ON users_data.nationality_id = nationality.id
         LEFT JOIN address ON users_data.address_id = address.id
         LEFT JOIN cities ON address.city_id= cities.city_id
         LEFT JOIN regions ON cities.region_id= regions.region_id
         LEFT join countries ON cities.country_id = countries.country_id
         LEFT JOIN user_educat ON users_data.id = user_educat.users_data_id
         LEFT JOIN education ON user_educat.education_id = education.id
         LEFT JOIN user_company ON user_company.users_data_id  =  users_data.id
         LEFT JOIN company ON user_company.company_id = company.id
         LEFT JOIN user_company_skills ON user_company.id = user_company_skills.user_company_id
         LEFT JOIN skills ON user_company_skills.skills_id = skills.id 
         LEFT JOIN aboutUser ON users_data.id = aboutUser.users_data_id 
         LEFT JOIN contact_user ON users_data.id = contact_user.users_data_id 
        ";





//$aColumns = array('`users`.*');

$aColumns_search = array(
    '`users_data`.first_name',
    '`users_data`.last_name',
    '`users_data`.mail',
    '`users_data`.telephone',
    '`users_data`.skills_name',
    '`education`.Profession_name');

//    legal_person.company_type) as aa
/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "id";

/* DB table to use    , individual_person, street, address*/
$sTable = "`users_data`";

function fatal_error($sErrorMessage = '')
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Erroreeeee');
    die($sErrorMessage);
}

/*
 * Paging
 */
$sLimit = "";
//if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
//{
//    $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
//        intval( $_GET['iDisplayLength'] );
//}
//$aa = fopen("newfile.txt","a");
//$txt = $_GET['start']." -- ".$_GET['length']." --\n";
//fwrite($aa,$txt);
//fclose($aa);
if (isset($_GET['start']) && $_GET['length'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['start']) . ", " .
        intval($_GET['length']);
}
/*
 * Ordering
 */
//$sOrder = "ORDER BY `users`.user_id ASC";
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
                    " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}

/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere = "WHERE (";
    for ($i = 0; $i < count($aColumns_search); $i++) {
        if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
            $sWhere .= $aColumns_search[$i] . " LIKE '%" . mysqli_real_escape_string($_GET['sSearch']) . "%' OR ";
        }
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

/* Individual column filtering */
//for ( $i=0 ; $i<count($aColumns) ; $i++ )
//{
//    if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
//    {
//        if ( $sWhere == "" )
//        {
//            $sWhere = "WHERE ";
//        }
//        else
//        {
//            $sWhere .= " AND ";
//        }
//        $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
//    }
//}

if (isset($_GET['columns'])) {
    for ($i = 0; $i < count($_GET['columns']); $i++) {
        $search_value = $_GET['columns'][$i]['search']['value'];
        if (isset($_GET['columns'][$i]['search']['value']) && $_GET['columns'][$i]['search']['value'] != "") {
            $col = $_GET['columns'][$i]['data'];
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
//            if ($col == 'address'){
//                if (preg_match($pattern_addres_building, $search_value, $matches)) {
//                    $sWhere .= " `street`.street_name LIKE '%" . $matches[1] . "%' AND (`address`.building LIKE '%" . $matches[3] . "%' OR `address`.home LIKE '%" . $matches[3] . "%') AND `address`.flat LIKE '%" . $matches[5] . "%' ";
//                } elseif (preg_match($pattern_addres_home, $search_value, $matches)) {
//                    $sWhere .= " `street`.street_name LIKE '%" . $matches[1] . "%' AND `address`.home LIKE '%" . $matches[3] . "%' ";
//                }else{
//                    $sWhere .= " `street`.street_name LIKE '%" . $search_value . "%'";
//                }
//            }elseif ($col == 'owner'){
//                if(preg_match($pattern_person_name, $search_value,$matches)){
//                    $sWhere .= " `individual_person`.first_name LIKE '%".$matches[1]."%' AND `individual_person`.last_name LIKE '%".$matches[3]."%' AND `individual_person`.middle_name LIKE '%".$matches[5]."%' ";
//                }else{
//                    $sWhere .= " `individual_person`.first_name LIKE '%".$search_value."%'";
//                }
//            }else{
//                $sWhere .= $aColumns_search[$i] . " LIKE '%" . $search_value . "%' ";
//            }
            $sWhere .= $aColumns_search[$i] . " LIKE '%" . $search_value . "%' ";
        }

    }
}

//$aa = fopen("newfile.txt","a");
//$txt = " lllll---\n";
//fwrite($aa,$txt);
//fclose($aa);



$group_by = "";
$sQuery = "
        SELECT  " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM   $sTable
        $join
        $sWhere
        $group_by
        $sOrder
        $sLimit
       
    ";


$rResult = $conn->query($sQuery);


/* Data set length after filtering */

//$sQuery = " SELECT FOUND_ROWS()";
//$rResultFilterTotal = $db->query($sQuery);
//$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
//$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
if (!isset($_GET['columns'])) {
    $join = "";
}
$sQuery = "
        SELECT COUNT(`users_data`." . $sIndexColumn . ")
        FROM   $sTable $join $sWhere
    ";

$rResultTotal = $conn->query($sQuery);
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


/*
 * Output "iTotalRecords" => $iTotal, "iTotalDisplayRecords" => $iFilteredTotal,
 */
$output = array(
    "draw" => intval($_GET['draw']),
    "iTotalRecords" => intval($iTotal),
    "iTotalDisplayRecords" => intval($iTotal),

    "data" => array()
);



while ($aRow = mysqli_fetch_assoc($rResult)) {
    $output['data'][] = $aRow;
}


echo json_encode($output);

//$db->close_db();




