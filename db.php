<?php 
class DB {
    public $pdo;
    public function __construct()
    {
        try {
            $pdo = new PDO ("mysql:dbname=school;host=localhost", "root", "admin");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } 
    public function index ()
    {
        $pdo = $this->pdo;
        $statemanet = $pdo->query("SELECT * FROM `students`");
        $students = $statemanet->fetchAll(PDO::FETCH_OBJ);
        return $students;
    }
    public function show ($id)
    {
        $pdo = $this->pdo;
        $statemanet = $pdo->prepare("SELECT * FROM `students` WHERE id=:id");
        $statemanet->bindParam(":id", $id);
        if($statemanet->execute())
        {
            $student = $statemanet->fetch(PDO::FETCH_OBJ);
            return $student;
        } else {
            header("Location: http://localhost:8000/");
        }
    }
    public function store ($request)
    {
        $pdo = $this->pdo;
        $statemanet = $pdo->prepare(" INSERT INTO `students` (`name`, `email`, `password`, `dob`, `gender`, `phone`, `address`) 
            VALUE (:name, :email, :password, :dob, :gender, :phone, :address);
        ");
        $statemanet->bindParam(":name", $request["name"]);
        $statemanet->bindParam(":email", $request["email"]);
        $statemanet->bindParam(":password", $request["password"]);
        $statemanet->bindParam(":gender", $request["gender"]);
        $statemanet->bindParam(":dob", $request["dob"]);
        $statemanet->bindParam(":phone", $request["phone"]);
        $statemanet->bindParam(":address", $request["address"]);
        if($statemanet->execute())
        {
            header(("Location: http://localhost:8000"));
        } else {
            header("Location: http://localhost:8000/create.php");
        }
    }
    public function edit ($id)
    {
        $pdo = $this->pdo;
        $statemanet = $pdo->prepare("SELECT * FROM `students` WHERE id=:id");
        $statemanet->bindParam(":id", $id);
        if($statemanet->execute())
        {
            $student = $statemanet->fetch(PDO::FETCH_OBJ);
            return $student;
        } else {
            header("Location: http://localhost:8000/");
        }
    }
    public function update($id, $request) {
        $pdo = $this->pdo;
        $statemanet = $pdo->prepare("UPDATE `students` SET name=:name, email=:email, password=:password, phone=:phone, dob=:dob, gender=:gender, address=:address WHERE id=:id");
        $statemanet->bindParam(":id", $id);
        $statemanet->bindParam(":name", $request["name"]);
        $statemanet->bindParam(":email", $request["email"]);
        $statemanet->bindParam(":password", $request["password"]);
        $statemanet->bindParam(":gender", $request["gender"]);
        $statemanet->bindParam(":dob", $request["dob"]);
        $statemanet->bindParam(":phone", $request["phone"]);
        $statemanet->bindParam(":address", $request["address"]);
        if($statemanet->execute())
        {
            header("Location: http://localhost:8000/");
        } else {
            echo "ERROR";
        }
    }
    public function destroy ($id)
    {
        $pdo = $this->pdo;
        $statemanet = $pdo->prepare("DELETE FROM `students` WHERE id=:id");
        $statemanet->bindParam(":id", $id);
        if($statemanet->execute())
        {
            header("Location: http://localhost:8000/");
        } else {
            echo "ERROR!";
        }
    }
}
