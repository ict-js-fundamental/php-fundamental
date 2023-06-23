<?php 
    require_once "./db.php";
    $db = new DB();
    $students = $db->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
    <script src="./tailwind.js"></script>
</head>
<body>
    <div class="w-full py-5">
        <div class="w-[80%] mx-auto flex justify-end">
            <a href="/create.php" class="bg-green-700 text-white px-5 py-2 text-lg rounded-lg">Create New Student</a>
        </div>
        <div class="w-[80%] my-5 rounded-lg shadow-md shadow-sky-400 mx-auto">
            <?php foreach($students as $student) : ?>
            <div class="py-4 w-full flex text-center justify-between">
                <div class="w-[20%]"><?php echo $student->name;?></div>
                <div class="w-[20%]"><?php echo $student->email;?></div>
                <div class="w-[20%]"><?php echo $student->password;?></div>
                <div class="w-[20%] flex gap-5">
                    <div>
                        <a href="/show.php?id=<?php echo $student->id?>">
                            <div class="text-sm text-sky-600">
                                <p>detail</p>
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </a>
                    </div>
                    
                    <form action="/delete.php?id=<?php echo $student->id?>" method="POST">
                        <button class="text-sm text-red-600">
                            <p>delete</p>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
