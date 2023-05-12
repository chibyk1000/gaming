<?php


class SignUp extends Database{

    protected function checkUser($username, $email)
    {
        $stmt = $this->connection()->prepare("SELECT * FROM users WHERE username = ? OR email = ?");

        if (!$stmt) {
            die('Error: query preparation failed');
        }


        if (!$stmt->execute(array($username, $email))) {
            die('Error: query execution failed');
        }
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }


    protected function createUser($firstname, $lastname, $username, $email, $password){


$stmt  = $this->connection()->prepare("INSERT INTO users (firstname,lastname,username,email,password) VALUES(?,?,?, ?, ?)");

$hashedpassword =  password_hash($password, PASSWORD_BCRYPT);
if(!$stmt->execute(array($firstname, $lastname, $username, $email, $hashedpassword))){
    $stmt = null;
    die('Error: query failed');
}

return true;
    }
}


class SignUpController extends SignUp{

    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $password;
    private $password_confirmation;

    public function __construct( $firstname, $lastname, $username, $email, $password, $password_confirmation){

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }


    private function emptyFields() {

        if(empty($this->firstname) || empty($this->lastname) || empty($this->username) || empty($this->password) || empty($this->password_confirmation) || empty($this->email)){
            return true;
        }

        return false;
    }

    private function invalidName(){

        if(!preg_match("/^[a-zA-Z]*$/", $this->firstname) || !preg_match("/^[a-zA-Z]*$/", $this->lastname) ){
            return true;
        }

        return false;
    }


    private function invalidPassword(){
        if(strlen($this->password) < 8){
            return true;
        }

        return false;
    }

    private function passwordMatch(){
        if($this->password !== $this->password_confirmation){
            return true;
        }

        return false;
    }

private function invalidEmail(){
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
    public function signUpUser(){

if($this->emptyFields()){
    die("missing fields");
}

if($this->invalidName()){
    die("invalid name");
}

if($this->invalidPassword()){
    die("password is too short");
}

if($this->passwordMatch()){
    die("passwords do not match");
}

if($this->invalidEmail()){
    die("invalid email");
}
       if( $this->checkUser($this->username, $this->email)){
        die("user already exists");
       }
       
       $this->createUser($this->firstname, $this->lastname, $this->username, $this->email, $this->password);
    }

}