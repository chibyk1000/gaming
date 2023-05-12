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

                <?php if (isset($_GET['product_id'])) : ?>

                    <?php
                    $product_id = $_GET['product_id'];
                    $singleProduct =  $product->getSingleProductById($product_id);

                    ?>
                    <form action=""  method="post">
                        <h2>Edit Product</h2>
                        <input type="text" placeholder="Title" name="title" value="<?php echo $singleProduct[0]['title'] ?>">
                        <input type="text" placeholder="Price" name="price" value="<?php echo $singleProduct[0]['price'] ?>">
                        <textarea name="description" id="" cols="30" rows="10" value=""><?php echo $singleProduct[0]['description'] ?></textarea>
                        <section>
              
                   
                        </section>
                        <div class="button">
                            <button name="submit">Add Product</button>
                        </div>
                        <p id="error"></p>
                    </form>
                <?php endif ?>


                <?php 
if(isset($_POST['submit'])){

$description = $_POST['description'];
$title = $_POST['title'];
$price = $_POST['price'];

$x = $product->editProduct($title, $price, $description, $product_id);
                    echo "<script>alert('updated')
                    location.href= './'
                    </script>";
}

?>
            </main>
        </div>
    </div>

    <script src="./js/addProduct.js"></script>
</body>

</html>