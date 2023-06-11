<?php 
    try {
        $pdo = new PDO ("mysql:dbname=school;host=localhost", "root", "admin");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statemanet = $pdo->prepare(" INSERT INTO `students` (`name`, `email`, `password`, `dob`, `gender`, `phone`, `address`) 
            VALUE (:name, :email, :password, :dob, :gender, :phone, :address);
        ");
        $statemanet->bindParam(":name", $_POST["name"]);
        $statemanet->bindParam(":email", $_POST["email"]);
        $statemanet->bindParam(":password", $_POST["password"]);
        $statemanet->bindParam(":gender", $_POST["gender"]);
        $statemanet->bindParam(":dob", $_POST["dob"]);
        $statemanet->bindParam(":phone", $_POST["phone"]);
        $statemanet->bindParam(":address", $_POST["address"]);

        if($statemanet->execute())
        {
            header(("Location: http://localhost:8000"));
        } else {
            header("Location: http://localhost:8000/create.php");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>