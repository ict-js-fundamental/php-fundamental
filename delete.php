<?php 
    require_once "./db.php";
    $db = new DB();
    $pdo = $db->destroy($_GET["id"]);

?>