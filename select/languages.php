<?php
/**
 * Created by PhpStorm.
 * User: Mic-User-09
 * Date: 2/20/2018
 * Time: 12:37 PM
 */
include "../db.php";


class Get_language {
    public function get_lang(){
        include "../db.php";
        mysqli_set_charset($conn,"utf8");

        $sql = 'SELECT `languages`.id,`languages`.`name` AS name_lang,`languages`.`language_code` FROM languages';
//        $result_role = $this->query($sql_role_list);


        $result = $conn->query($sql);
        $item_counts = 0;
        while ($status = mysqli_fetch_assoc($result)) {
            $item_counts = $item_counts + 1;
            $output['lang'][] = $status;
        }

        $output["item_counts"] = $item_counts;

//        $a = fopen("newfile.txt","a");
//        fwrite($a,json_encode($output)." ====\n");
//        fclose($a);

        echo json_encode($output);
    }
}

$get_users_data = new Get_language();
if ($_POST['search'] == 'lang'){
    $get_users_data->get_lang();
}else{
    $sql = 'SELECT * FROM languages';

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo "<option value=".$row['id'].">".$row['name']."(".$row['language_code'].")"."</option>";
    }
    $conn -> close();
}
