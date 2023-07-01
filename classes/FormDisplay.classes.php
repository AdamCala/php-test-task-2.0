<?php

    namespace classes;

    use abstracts\ProductModel;

    class FormDisplay{

        public function displayForm(){

            ob_start();
            ?>
            <form id="product_form">
                <div class="a-type-div">
                    <label for="sku-input">SKU</label>
                    <input type="text" name="SKU" id="sku-input">
                </div>
                <div class="a-type-div">
                    <label for="name-input">Name</label>
                    <input type="text" name="Name" id="name-input">
                </div>
                <div class="a-type-div">
                    <label for="price-input">Price ($)</label>
                    <input type="text" name="Price" id="Price-input" class="number-input">
                </div>
                <div class="a-type-div">
                    <label for="productType-input">Type Switcher</label>
                    <select id="productType-input">
                        <option value="DVD" id="dvd" selected>DVD</option>
                        <option value="Furniture" id="furniture">Furniture</option>
                        <option value="Book" id="book">Book</option>
                    </select>
                </div>
                <div id="DVD-input-spec" class="hidden input-spec a-type-div">
                    <label for="size-input">Size (MB)</label>
                    <input type="text" name="Size" id="Size-input" class="number-input">
                    <input type="hidden" name="Unit" value="MB" class="unit">
                </div>
                <div id='Furniture-input-spec' class="hidden input-spec">
                    <div class="a-type-div">
                        <label for="height-input">Height (CM)</label>
                        <input type="text" name="Height" id="Height-input" class="number-input">
                        <input type="hidden" name="Unit" value="CM" class="unit">
                    </div>
                    <div class="a-type-div">
                        <label for="width-input">Width (CM)</label>
                        <input type="text" name="Width" id="Width-input" class="number-input">
                    </div>
                    <div class="a-type-div">
                        <label for="length-input">Length (CM)</label>
                        <input type="text" name="Length" id="Length-input" class="number-input"> 
                    </div>
                </div>
                <div id='Book-input-spec' class="hidden input-spec a-type-div">
                    <label for="weight-input">Weight (KG)</label>
                    <input type="text" name="Weight" id="Weight-input" class="number-input">
                    <input type="hidden" name="Unit" value="KG" class="unit">
                </div>
            </form>
            <p id="error-container"></p>
            <?php
            $form = ob_get_clean();
            echo $form;
        }

    }