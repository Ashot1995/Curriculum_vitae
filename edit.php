<?php
if(isset($_GET['id']))
{
$edit = mysql_query("SELECT * FROM text_area WHERE text_id=$_GET[id]");
$row = mysql_fetch_assoc($edit);
$contents = file_get_contents($row['content']);
?>
<form action="" name="form" method="post">
<input type="hidden" name="id" value="<?php echo $row['text_id']; ?>" /><br />
<label for="">Заглавие:</label><br />
<input type="text" name="title" style="width:500px;" value="<?php echo $row['subject'] ?>" /><br />
<select name="opt">
<option value="0"></option>
<?php

$result = mysql_queryi("SELECT * FROM image_area");
while ($row = mysql_fetch_arrayi($result)) {
        echo "<option value=" . $row['path'] . ">" . $row['name'] . "</option>";
    }

?>
</select>
    <input type="button" name="sumbitP" value="Choose" onclick="addtext();" />
    <a href="../image_list.php" target="_blank">Image list</a><br />
<textarea rows="10" cols="50" name="text" id="markItUp"><?php echo $contents ?></textarea><br />
<input type="submit" name="sumbitT" value="Update" />
<input type="reset" value="Reset" />

</form>
<?php
}
?>
<?php

if(isset($_POST['id'])) {
    if (mysql_queryi("UPDATE text_area SET title='$_POST[subject]' WHERE text_id ='$_POST[id]'")) {

        $data_to_write = "" . $_POST['text'];
        $file_path = "text/$row[name]";
        $file_handle = fopen($file_path, 'w');
        fwrite($file_handle, $data_to_write);
        fclose($file_handle);

        echo '<br><br><p align="center">Everything is ok</p>';
    } else {
        echo '<br><br><p align="center">Everything is not ok</p>';
    }
}