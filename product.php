<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include './includes/links.php'
    ?>
    <link rel="stylesheet" href="./assets/css/product.css">
    <title>KIK Gaming | Home</title>
</head>

<body>
    <!-- navbar -->
    <?php


    include './includes/header.php';

    ?>
    <!-- navbar -->

    <main>
        <section class="articles">
            <?php foreach ($allproducts as $product) : ?>
                <form method="post">
                    <div class="article-wrapper">
                        <figure>
                            <img src="./uploads/<?php echo $product['image'] ?>" alt="" />
                        </figure>
                        <span>$<?php echo $product['price'] ?></span>
                        <div class="article-body">

                            <h2><?php echo $product['title'] ?></h2>
                            <input type="hidden" value="<?php echo $product['product_id'] ?>" name="product_id">
                            <button href="#" class="addcart">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </form>


            <?php endforeach ?>



        </section>
    </main>
    <?php

    if (isset($_POST['product_id'])) {

        $product_id = $_POST['product_id'];


        $cart->addItem($product_id);

        echo '<script>location.href=""</script>';
    }


    ?>

    <?php include './includes/footer.php' ?>
    <script src="./assets/js/login.js"></script>
</body>

</html>