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
    $items =  $_SESSION['cart'];

    ?>
    <!-- navbar -->

    <main class="cart">

        <div class="container">

            <table>
                <thead>
                    <tr>

                        <th align="left">Title</th>
                        <th align="left">quantity</th>
                        <th align="left">Price</th>
                        <th align="left">Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
$total = 0
                    ?>
                    <?php foreach ($items as $key => $value) : ?>

                        <?php

                        $productdetails = $product->getSingleProductById($value['item']);

                        ?>
                        <tr>
                            <th align="left"><?php echo $productdetails[0]['title'] ?></th>
                            <td>
                                <div class="counter">
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $productdetails[0]['product_id']  ?>" name="decrement">
                                        <button>-</button>
                                    </form>
                                    <span><?php echo $value['quantity'] ?></span>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $productdetails[0]['product_id']  ?>" name="increment">
                                        <button>+</button>
                                    </form>
                                </div>
                            </td>
                            <td>$ <?php 
                            $total += $productdetails[0]['price'] * $value['quantity'];
                            echo number_format($productdetails[0]['price'] * $value['quantity']) 
                            
                            
                            ?>

                            </td>
                            <td>
                                <form action=""><button class="text-danger cart-del">delete item</button></form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>

                        <th align="left">TotalItems: <?php echo $cart->countItems() ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TotalPrice:  $ <?php echo number_format($total) ?></td>
                    </tr>
                    <tr>
                        <td><button>Make Order</button></td>

                    </tr>

                </tbody>
            </table>
        </div>


    </main>
    <?php

    if (isset($_POST['increment'])) {
        $product_id = $_POST['increment'];

        $cart->addItem($product_id);
        echo '<script>location.href=""</script>';
    } elseif (isset($_POST['decrement'])) {
        $product_id = $_POST['decrement'];
        $cart->decrementQuantity($product_id);
        echo '<script>location.href=""</script>';
    }
    ?>


    ?>
    <script src="./assets/js/login.js"></script>
</body>

</html>