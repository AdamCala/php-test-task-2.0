<?php

    namespace classes;

    use abstracts\ProductModel;

    class FormDisplay{

        public function displayForm(){

            ob_start();
            ?>
            <form id="product_form">
                <div>
                    <label for="sku_input">SKU</label>
                    <input type="text" name="sku" id="sku_input">
                </div>
                <div>
                    <label for="name_input">Name</label>
                    <input type="text" name="name" id="name_input">
                </div>
                <div>
                    <label for="price_input">Price ($)</label>
                    <input type="number" name="name" id="price_input">
                </div>
                <div>
                    <label for="productType_input">Type Switcher</label>
                    <select value="productType" id="productType_input">
                        <option name="Furniture" id="furniture">Furniture</option>
                        <option name="Book" id="book">Book</option>
                        <option name="DVD" id="dvd">DVD</option>
                    </select>
                </div>
            </form>
            <?php
            $form = ob_get_clean();
            echo $form;
        }

    }