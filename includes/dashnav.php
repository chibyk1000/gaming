            <div class="app-content-header">
                <h2 class="app-content-headerText">Products</h2>
                <a href="./add-product.php" class="app-content-headerButton">Add Product</a>

            </div>

            
            <?php 
            if (!isset($_SESSION['user']) || !isset($_SESSION['role'])){
echo '
<script>location.href="../login.php"</script>';
die();
            } 

            if($_SESSION['role'] !== 'admin'){

                header("location: ../");

            }

            die();
            ?>
