<?php
class User {

    // properties metjods
        public $username = "Hugo";
        public $email = "user@example.com";

        public function addFriend() {
            return "$this->username Added new Friend";
        }

}

$userOne = new User();
$userTwo = new User();

echo $userOne->username . '<br>';
echo $userOne->email . '<br>';
echo $userOne->addFriend() . '<br>';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>