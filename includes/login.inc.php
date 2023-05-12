<?php
$content = file_get_contents('php://input');

$data = json_decode($content, true);

if (isset($data['email']) && isset($data['password'])) {



    $email = $data['email'];
    $password = $data['password'];

    include '../classes/db.php';
    include '../classes/login.php';
 

    $login =  new LoginController($email, $password);
    $login->loginUser();
    die('success');
}