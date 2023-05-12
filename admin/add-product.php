<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <div class="dash">
        <?php include '../includes/sidebar.php' ?>
        <div class="main-content">
            <?php
            include '../includes/dashnav.php';
            ?>
            <main>
                <form action="../includes/addProduct.php" id="addfrm" method="post" enctype="multipart/form-data">
                    <h2>Add Product</h2>
                    <input type="text" placeholder="Title" id="title">
                    <input type="text" placeholder="Price" id="price">
                    <textarea id="description" id="" cols="30" rows="10"></textarea>
                    <section>
                        <i class="fa-solid fa-upload fa-bounce" style="color: white; font-size:30px"></i>
                        <input type="file" placeholder="" id="file">
                    </section>
                    <div class="button">
                        <button name="submit">Add Product</button>
                    </div>
                    <p id="error"></p>
                </form>
            </main>
        </div>
    </div>
    <script src="./js/addProduct.js"></script>
</body>
</html>