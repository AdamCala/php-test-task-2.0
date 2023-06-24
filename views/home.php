<?php
    require 'autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="public\css\home.css">
</head>
<body>
    <nav>
        <h1>Product List</h1>
    </nav>
    <main>
        <?php
            $test = new classes\ProductDisplay;
            $product_entry = $test->displayProduct();
            echo $product_entry;
        ?>
    </main>
    <footer>
        Scandiweb Test assignment
    </footer>
</body>
</html>