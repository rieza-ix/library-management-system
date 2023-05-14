<?php
include "../server/db/conDB.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="./assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white flex justify-center items-center">
        <div class="bg-gray-100 shadow-md w-2/5 rounded-lg p-8">
            <form autocomplete="off" action="../server/admin/login.php" method="POST">
                <div class="flex items-center justify-center mb-4">
                    <img src="./assets/logo.png" class="h-16 mr-3" alt="ANS Logo" />
                    <h1 class="font-extrabold text-2xl">ANS Library Management System</h1>
                </div>
                <h1 class="font-semibold text-xl mb-4 text-center text-gray-900">Sign in to your account</h1 class="font-semibold text-lg">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        username</labxel>
                        <input type="username" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2" maxlength="30" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30" required>
                </div>
                <div class="text-right mb-4 text-xs text-blue-600 underline">
                    <a href="./pages/admin/forgot-password.html" class="text-left">Change password?</a href="forgot-password.php">
                </div>


                <?php if (isset($_GET['error'])) { ?>
                    <p class="error text-red-500 text-center w-full font-semibold">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>

                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center mx-auto">Sign
                    in</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>