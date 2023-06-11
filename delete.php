<?php 
    try {
        $pdo = new PDO ("mysql:dbname=school;host=localhost", "root", "admin");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statemanet = $pdo->prepare("DELETE FROM `students` WHERE id=:id");
        $statemanet->bindParam(":id", $_GET["id"]);
        if($statemanet->execute()) {
            header("Location: http://localhost:8000");
        } else {
            header("Location: http://localhost:8000");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>