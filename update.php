<?php 
    require_once "./db.php";
    $db = new DB();
    $db->update($_GET["id"], $_POST);
?>