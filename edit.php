<?php
    require_once "./db.php";
    $pdo = new DB();
    $student = $pdo->edit($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="tailwind.js"></script>
</head>
<body>
    <div class="w-full py-10">
        <div class="w-[70%] py-10 shadow-xl shadow-gray-700 mx-auto">
            <h1 class="text-center text-2xl">Create New Student</h1>
            <form action="/update.php?id=<?php echo $student->id ?>" method="POST" class="w-[75%] mx-auto">
                <div class="w-full flex justify-between my-5">
                    <input value="<?php echo $student->name;?>" placeholder="Name" name="name" type="text" class="px-5 w-[49%] border border-sky-500 rounded-md py-1">
                    <input value="<?php echo $student->email;?>" placeholder="Email" name="email" type="email" class="px-5 w-[49%] border border-sky-500 rounded-md py-1">
                </div>
                <div class="w-full my-5 flex justify-between">
                    <input value="<?php echo $student->password;?>" placeholder="Password" name="password" type="text" class="px-5 w-[49%] border border-sky-500 rounded-md py-1">
                    <input value="<?php echo $student->phone;?>" placeholder="Phone" name="phone" type="text" class="px-5 w-[49%] border border-sky-500 rounded-md py-1">
                </div>
                <div class="w-full my-5 flex justify-between">
                    <div class="w-[49%]">
                        <label for="dob">Date of Birth</label>
                        <input value="<?php echo $student->dob;?>" name="dob" type="date" class="px-5 w-full border border-sky-500 rounded-md py-1">
                    </div>
                    <div class="w-[49%]">
                        <label for="gender">Gender</label>
                        <select name="gender" type="date" class="px-5 w-full border bg-white border-sky-500 rounded-md py-1.5">
                            <option disabled>Choose Your Gender</option>
                            <option value="male" <?php if($student->gender == "male"){echo "selected";}?>>Male</option>
                            <option value="female" <?php if($student->gender == "female"){echo "selected";}?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="w-full my-5">
                    <label for="address">Address</label>
                    <textarea name="address" class="w-full rounded-md border border-sky-500 px-5 py-3">
                        <?php echo $student->address;?>
                    </textarea>
                </div>
                <div class="w-full my-5 flex justify-between">
                    <button class="text-white bg-blue-600 px-3 py-1 rounded-md">Submit</button>
                    <a href="/" class="text-white bg-gray-600 px-3 py-1 rounded-md">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>