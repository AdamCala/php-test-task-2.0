<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductDisplay extends ProductModel{

        public function displayProduct(){
            $productObjects = $this->getProducts();
            ob_start();
            ?>
            <form id="delete_form">
                <?php foreach ($productObjects as $product_entry): ?>
                    <div id="<?= $product_entry->getSku(); ?>" class="product-entry-div">
                        <input type="checkbox" name="<?= $product_entry->getSku(); ?>" class="delete-checkbox" form="delete_form">
                        <div>
                            <p><?= $product_entry->getSku(); ?></p>
                            <p><?= $product_entry->getName(); ?></p>
                            <p><?= $product_entry->getPrice(); ?> $</p>
                            <?php $attributes = $product_entry->getAttributes(); ?>
                            <?php if (count($attributes) > 1): ?>
                                Dimension:
                                <?= implode('x', $attributes); ?>
                            <?php else: ?>
                                <?php foreach ($attributes as $attribute => $value): ?>
                                    <?= $attribute; ?>: <?= $value; ?> <?= $product_entry->getUnit(); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
            <?php
            $productsGrid = ob_get_clean();
            echo $productsGrid;
        }
    }