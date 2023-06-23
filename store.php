<?php 
    require_once "./db.php";
    $db = new DB();
    $request = $_POST;
    $db->store($request);
    

?>