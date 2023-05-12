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
    <!-- navbar -->

    <main>

        <form action="" class="forms" id="loginfrm">

            <h1>Access Your Account</h1>

            <input type="text" placeholder="email or username" required id="email">
            <input type="text" placeholder="password" required id="password">

            <div>
                <button>Submit</button>
            </div>
            <p id="error"></p>
        </form>

    </main>

    <script src="./assets/js/login.js"></script>
</body>

</html>