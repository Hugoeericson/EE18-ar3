<?php
/*
* Form validator
* PHP version 7
* @category   php class
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC

1. Skapa en klass
2. Skapa en konstruktor
3. Kontrollera att inga fält saknas
4. Skapa funktioner för att validera
4.1 En funktion för att validera username
4.1 En funktion för att validera email
4.2 En funktion för att validera lösenord
5. Returnera en array med alla fel

*/
class Validator
{
    private $errors = [];
    private $data;
    public function set($postdata)
    {
        $this->data = $postdata;
    }
    public function validateUserName()
    {
        if (!preg_match("/[a-zA-Z0-9]{6,12}/", $this->data["username"])) {
            $this->errors['username'][] = "<p>&#10005; Innehåller inte a-z, 0-9, @ och -.</p>";
        }
    }
    public function validatePassword()
    {
        if (!preg_match("/[a-zåäö]/", $this->data["password"]) > 0) {
            $this->errors['password'][] = 'password must contain a least one lowercase character';
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $this->data["password"]) > 0) {
            $this->errors['password'][] = 'password must contain a least one uppercase character';
        }
        if (!preg_match("/[0-9]/", $this->data["password"]) > 0) {
            $this->errors['password'][] = 'password must contain a least one alphanumeric';
        }
        if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $this->data["password"]) > 0) {
            $this->errors['password'][] = 'password must contain a least one special character';
        }
        if (!preg_match("/^.{8,40}$/", $this->data["password"]) > 0) {
            $this->errors['password'][] = 'password must at least 8 character long';
        }
    }
    function validateEmail()
    {
        if (!filter_var($this->data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'][] = "Invalid email format";
        }
    }
    function showErrors($type)
    {
        if (array_key_exists($type, $this->errors)) {
            echo "<p>";
            foreach ($this->errors[$type] as $error) {
                echo $error;
            }
            echo "</p>";
        }
    }
}
