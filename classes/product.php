<?php


class Product extends Database
{

    protected function createProductInDb($file, $title, $price, $description, $username)
    {
        $name =  $file['name'];
        $file_exp = explode('.', $name);

        $tmp_name = $file['tmp_name'];
        $ext = end($file_exp);
        $product_id = "kikgaming_" . uniqid();
        $newfilename = $product_id . '.' . $ext;
        move_uploaded_file($tmp_name, "../uploads/" . $newfilename);

        $stmt = $this->connection()->prepare('INSERT INTO products  (title,price,description,image, product_id, username) VALUES(?,?,?,?,?, ?)');

        if (!$stmt->execute(array($title, $price, $description, $newfilename, $product_id, $username))) {
            $stmt = null;
            die('query failed');
        }

        $stmt = null;
    }

    public function getAllProducts()
    {
        $stmt = $this->connection()->prepare('SELECT * FROM products');

        if (!$stmt->execute()) {
            $stmt = null;
            echo "<script>alert('something happend')</script>";
            exit();
        }
        if ($stmt->rowCount() === 0) {
            return false;
        }

        $products =  $stmt->fetchAll(PDO::FETCH_ASSOC);
     
        return $products;
    }

    public function getProduct($username)
    {
        $stmt = $this->connection()->prepare('SELECT * FROM products WHERE username= ?');

        if (!$stmt->execute(array($username))) {
            $stmt = null;
            echo "<script>alert('something happend')</script>";
            exit();
        }
        if ($stmt->rowCount() === 0) {
            return false;
        }

        $products =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }


    public function getSingleProductById($product_id)
    {
        $stmt = $this->connection()->prepare('SELECT * FROM products WHERE product_id= ?');

        if (!$stmt->execute(array($product_id))) {
            $stmt = null;
            echo "<script>alert('something happend')</script>";
            exit();
        }
        if ($stmt->rowCount() === 0) {
            return false;
        }
        $products =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function removeProduct($product_id)
    {
        $stmt = $this->connection()->prepare('DELETE FROM products WHERE product_id= ?');

        if (!$stmt->execute(array($product_id))) {
            $stmt = null;
            echo "<script>alert('something happend')</script>";
            exit();
        }
        return true;
    }

    public function editProduct( $title, $price, $description, $product_id)
    {
        
        $stmt = $this->connection()->prepare('UPDATE products SET  title=?, description=?, price= ? WHERE product_id= ?');
      
        if (!$stmt->execute(array( $title, $description, $price, $product_id))) {
            $stmt = null;
            echo "<script>alert('something happend')</script>";
            exit();
        }
        return true;
    }
}


class ProductController extends Product
{
private $title;
private $price;
private $description;
private $file;
private $email;


public function __construct($title, $price, $description, $file, string $query)
{
$this->title = $title;
$this->price = $price;
$this->description = $description;
$this->file = $file;
$this->email = $query;
}
private function checkEmpty()
{
if (empty($this->title) || empty($this->price) || empty($this->email) || empty($this->description) || !isset($this->file)) {
return true;
}
return false;
}

private function checkFile()
{

$tmp_name = $this->file['tmp_name'];
$size = $this->file['size'];
$error = $this->file['error'];
$type = $this->file['type'];


$isallowed = ['image/png', 'image/jpeg', 'image/jpg'];
if ($error > 0) {
die('error uploading files');
}

if (!in_array($type, $isallowed)) {
die('invalid file type');
}

if ($size > 700000) {
die('file too large');
}
}

public function createNewProduct()
{
if ($this->checkEmpty()) {
die("missing field");
}
$this->checkFile();
$this->createProductInDb($this->file, $this->title, $this->price, $this->description, $this->email);
}

public function updateProduct()
{
        if ($this->checkEmpty()) {
            die("missing field");
        }
      
        $this->editProduct($this->file, $this->title, $this->price, $this->description, $this->email);
}
}

