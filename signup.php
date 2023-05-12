<!DOCTYPE html>
<html lang="en">
<head>
<?php

include './includes/links.php'
?>
    
    <title>KIK Gaming | Home</title>
</head>
<body>
    <!-- navbar -->
<?php



include './includes/header.php'
?>
<main>

<form action="" class="forms" id="signupfrm">

<h1>Create Your Account</h1>
<input type="text" placeholder="firstname" required id="firstname">
<input type="text" placeholder="lastname" required id="lastname">
<input type="text" placeholder="username" required id="username">
<input type="text" placeholder="email" required id="email">
<input type="text" placeholder="password" required id="password">
<input type="text" placeholder="password_confirmation" required id="password_confirmation">
<div>
    <button>Submit</button>
</div>
</form>

</main>
    <!-- navbar -->
<script src="./assets/js/signup.js"></script>
    </body>
    </html>