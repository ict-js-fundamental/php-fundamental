<?php 
    try {
        $pdo = new PDO ("mysql:dbname=school;host=localhost", "root", "admin");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statemanet = $pdo->prepare("SELECT * FROM `students` WHERE id=:id");
        $statemanet->bindParam(":id", $_GET["id"]);
        if($statemanet->execute())
        {
            $student = $statemanet->fetch(PDO::FETCH_OBJ);
        } else {
            header("Location: http://localhost:8000/");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="tailwind.js"></script>
</head>
<body>
    <div class="w-full py-10">
        <div class="w-[50%] rounded-md shadow-md shadow-sky-500 mx-auto">
            <div class="w-[80%] mx-auto">
                <p class="py-5 font-mono italic text-3xl"><?php echo $student->name; ?></p>
                <div class="w-full h-[1px] bg-blue-300"></div>
                <ul class="list-disc text-lg font-mono italic py-5">
                    <li>Email : <?php echo $student->email; ?></li>
                    <li>Phone : <?php echo $student->phone; ?></li>
                    <li>Gender : <?php echo $student->gender; ?></li>
                    <li>Date of Birth : <?php echo $student->dob; ?></li>
                    <li>Address : <?php echo $student->address; ?></li>

                </ul>
                <div class="py-5">
                    <a href="/" class="py-2 bg-gray-600 text-white px-5 text-lg rounded-md">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
