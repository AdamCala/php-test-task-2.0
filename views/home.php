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
    <script src="public\js\home.js" defer></script>
</head>
<body>
    <nav>
        <h1>Product List</h1>
        <div id="navbar-buttons">
            <button id="add-button-link">ADD</button>
            <button id="delete-button-action">MASS DELETE</button>
        </div>
    </nav>
    <main>
        <?php
            $products = new classes\ProductDisplay;
            $products->displayProduct();
        ?>
    </main>
    <footer>
        Scandiweb Test assignment
    </footer>
</body>
</html>