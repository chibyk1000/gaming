<?php
class Database{

    protected function connection(){
        try {
            $dbusername = 'root';
            $dbpassword = '';
            $conn = new PDO('mysql:host=localhost;dbname=kikgaming', $dbusername, $dbpassword);
            return $conn;
        } catch (PDOException $e) {
            die('Error connecting to database: ' . $e);
        }
    }
}


