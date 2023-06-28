<?php
    require 'autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="public\css\product.css">
    <script src="public\js\product.js" defer></script>
    <script src="public\js\api\product_api.js" defer></script>
</head>
<body>
    <nav>
        <h1>Product Add</h1>
        <div id="navbar-buttons">
            <button id="save-button-action">SAVE</button>
            <button id="cancel-button-link">CANCEL</button>
        </div>
    </nav>
    <main>
        <?php
            $form = new classes\FormDisplay;
            $form->displayForm();
        ?>
    </main>
    <footer>
        Scandiweb Test assignment
    </footer>
</body>
</html>