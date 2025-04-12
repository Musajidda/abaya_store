<?php session_start(); include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaya Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Luxury Abayas</h1>
        <a href="checkout.php" class="cart-link">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
    </header>

    <div class="product-grid">
        <?php
        $result = $conn->query("SELECT * FROM products LIMIT 10");
        while($row = $result->fetch_assoc()):
        ?>
        <div class="product-card">
            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <p class="price">₦<?php echo $row['price']; ?></p>
            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <?php endwhile; ?>
    </div>

    <footer>
        <p>&copy; 2023 Abaya Shop. All rights reserved.</p>
    </footer>
</body>
</html>