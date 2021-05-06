<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./classes/Validator.php";
$check = new Validator();

if (isset($_POST["submit"])) {
    $check->set($_POST);
    $check->validateUserName();
    $check->validatePassword();
    $check->validateEmail();
}


?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New User</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Create new user</h1>
        <form action="#" method="POST">
            <label>Username <input text="text" name="username" required></label>
            <?php $check->showErrors('username'); ?>
            <label>Password <input text="password" name="password" required></label>
            <?php $check->showErrors('password'); ?>
            <label>Email <input text="email" name="email" required></label>
            <?php $check->showErrors('email'); ?>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>