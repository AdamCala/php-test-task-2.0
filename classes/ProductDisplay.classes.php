<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductDisplay extends ProductModel{

        public function displayProduct(){
            $product = $this->getProducts();
            ob_start();
            ?>
            <form id="delete_form">
                <?php foreach ($product as $product_entry): ?>
                    <div id="<?= $product_entry['SKU']; ?>" class="product-entry-div">
                        <input type="checkbox" name="<?= $product_entry['SKU']; ?>" class="delete-checkbox"<?= $product_entry['SKU']; ?> form="delete_form">
                        <p><?= $product_entry['SKU']; ?></p>
                        <p><?= $product_entry['Name']; ?></p>
                        <p><?= $product_entry['Price']; ?> $</p>
                        <?php if (count($product_entry['Attributes']) > 1): ?>
                            Dimension:
                            <?= implode('x', $product_entry['Attributes']); ?>
                        <?php else: ?>
                            <?php foreach ($product_entry['Attributes'] as $Attribute => $value): ?>
                                <?= $Attribute; ?>:  <?= $value; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </form>
            <?php
            $productsGrid = ob_get_clean();
            return $productsGrid;
        }
    }