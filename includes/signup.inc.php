<?php

$json = file_get_contents('php://input');
$data = json_decode($json);
if(isset($data->username) ){


    include '../classes/db.php';
    include '../classes/signup.php';
$signup =  new SignUpController($data->firstname, $data->lastname, $data->username, $data->email, $data->password, $data->password_confirm);
$signup->signUpUser();
die('success');

}