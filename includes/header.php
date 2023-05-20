    <nav>
        <a href="" class="logo">KIK Gaming</a>
        <ul class="nav-section">
            <li><a href="./">Home</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./product.php">Product</a></li>
            <li><a href="./usefull-links.php">usefull links</a></li>

            <?php if (isset($_SESSION['user']) && isset($_SESSION['role'])) : ?>

                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <li><a href="./admin">Admin</a></li>
                <?php endif ?>
                <li class="login"><a href="./logout.php">Logout</a></li>
            <?php else : ?>
                <li class="login"><a href="./login.php">Login</a></li>
                <li class="signup"><a href="./signup.php">Create Account</a></li>
            <?php endif ?>

            <?php if (isset($_SESSION['user']) && isset($_SESSION['role'])) : ?>
                <a href="./cart.php" class="cartnum">
                    <i class="fa-solid fa-shopping-cart"></i>
                    <span><?php echo $cart->countItems() ?></span>
                </a>
            <?php else : ?>
                <a href="./login.php" class="cartnum">
                    <i class="fa-solid fa-shopping-cart"></i>
                    <span><?php echo $cart->countItems() ?></span>
                </a>
            <?php endif ?>

            <i class="fa-solid fa-bars"></i>
        </ul>

    </nav>