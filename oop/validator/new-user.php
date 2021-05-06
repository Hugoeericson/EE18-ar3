<?php
// användarnamnet 6 - 12 tecken långt, stora och små bokstäver samt soffror
$errors = [];
function validateUserName($data)
{
    global $errors;
    if (!preg_match("/[a-zA-Z0-9]{6,12}/", $data)) {
        $errors['username'][] = "<p>&#10005; Innehåller inte a-z, 0-9, @ och -.</p>";
    }
}
function validatePassword($data)
{
    global $errors;
    if (!preg_match("/[a-zåäö]/", $data) > 0) {
        $errors['password'][] = 'password must contain a least one lowercase character';
    }
    if (!preg_match("/[A-ZÅÄÖ]/", $data) > 0) {
        $errors['password'][] = 'password must contain a least one uppercase character';
    }
    if (!preg_match("/[0-9]/", $data) > 0) {
        $errors['password'][] = 'password must contain a least one alphanumeric';
    }
    if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $data) > 0) {
        $errors['password'][] = 'password must contain a least one special character';
    }
    if (!preg_match("/^.{8,40}$/", $data) > 0) {
        $errors['password'][] = 'password must at least 8 character long';
    }
}
function validateEmail($data)
{
    global $errors;
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = "Invalid email format";
    }
}
function showErrors($type)
{
    global $errors;
    echo "<p>";
    foreach ($errors[$type] as $error) {
        echo $error;
    }
    "</p>";
}
// ta emot data som skickas 
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

// om dara Finns
if ($username && $password && $email) {

    // kontrollera att username följer reglerna
    validateUserName($username);
    // kontrollera att lösenordet följer reglera
    validatePassword($password);
    // kontrollera att epost följer reglerna
    validateEmail($email);
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
            <?php
            showErrors('username');
            ?>
            <label>Password <input text="password" name="password" required></label>
            <?php
            showErrors('password');
            ?>
            <label>Email <input text="email" name="email" required></label>
            <?php
            showErrors('email');
            ?>
            <button>Submit</button>
        </form>
        <?php
        ?>
    </div>
</body>

</html>