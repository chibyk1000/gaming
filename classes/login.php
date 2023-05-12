<?php
class Login extends Database
{


    protected function getExistingUser($email, $username, $password)
    {
        $stmt = $this->connection()->prepare('SELECT *  FROM users WHERE email =? OR username =?;');

        if (!$stmt->execute(array($email, $username))) {
            $stmt = null;
            die('query failed');
        }


        if ($stmt->rowCount() === 0) {
            die('user can not found');
        }

        $user =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        $passwordcheck = password_verify($password, $user[0]['password']);
        if (!$passwordcheck) {
            die('invalid password');
        }

        $this->logUserIn($user);
        $stmt = null;
    }
    private function logUserIn($user)
    {
       

       
        session_start();
        $_SESSION['user'] = $user[0]['username'];
        $_SESSION['role'] = $user[0]['role'];
        return true;
    }
}



class LoginController extends Login
{
    private $email;
    private $password;
    private $username;
    public function __construct($email,  $password)
    {
        $this->email = $email; 
        $this->username = $email;
        $this->password = $password;
    }

    private function emptyInput()
    {
        if (empty($this->email) || empty($this->password)) {
            return true;
        }
        return false;
    }

    public function loginUser()
    {

        if ($this->emptyInput()) {
            die('Please enter a username and password');
        }

        $this->getExistingUser($this->email, $this->username, $this->password);
    }
}
