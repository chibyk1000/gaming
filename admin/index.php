<?php
session_start();

include '../classes/db.php';
include '../classes/product.php';
$product =  new Product();
$username  =  $_SESSION['user'];
$products = $product->getProduct($username)
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
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($products as $value) : ?>
                            <tr>
                                <th><?php echo $value['product_id'] ?></th>
                                <td><?php echo $value['title'] ?></td>
                                <td class="action-td">
                                    <form action="./edit-product.php" method="">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                        <button>Edit</button>
                                    </form>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                        <button name="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php 

                if(isset($_POST['delete'])){
                    $product_id = $_POST['product_id'];

              $product->removeProduct($product_id);
                echo '<script>locaton.href =""</script>';
                    
                }

                ?>
            </main>
        </div>
    </div>


    <script src="./js/addProduct.js"></script>
</body>

</html>