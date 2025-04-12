
### 6. Admin Panel (`admin.php`)
```php
<?php
session_start();
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; 
    $description = $_POST['description'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO Products (name    , description, price, image_url) VALUES ('$name', '$description', $price, 'default.jpg')");
}
?>
<h2>Admin Panel</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="price" placeholder="Price" required>
    <button type="submit">Add Product</button>
</form>
```
