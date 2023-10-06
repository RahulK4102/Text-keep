<?php
include 'database.php';
if (isset($_GET['delete_id'])) {
    $text = new Database();
    $id = $_GET['id'];
    $delete_id = $_GET['delete_id'];
    $text->delete('data', 'id=' . $delete_id);
    header('location:http://localhost/googlekeep_php/text_keep/Text_keep.php ?id='.$id);
}

?>