<?php

    namespace classes;

    use abstracts\ProductModel;

    class FormDisplay{

        public function displayForm(){

            ob_start();
            ?>
            <form id="product_form">
                <div class="a-type-div">
                    <label for="sku">SKU</label>
                    <input type="text" name="SKU" id="sku">
                </div>
                <div class="a-type-div">
                    <label for="name">Name</label>
                    <input type="text" name="Name" id="name">
                </div>
                <div class="a-type-div">
                    <label for="price">Price ($)</label>
                    <input type="text" name="Price" id="price" class="number-input">
                </div>
                <div class="a-type-div">
                    <label for="productType">Type Switcher</label>
                    <select id="productType">
                        <option value="DVD" id="dvd" selected>DVD</option>
                        <option value="Furniture" id="furniture">Furniture</option>
                        <option value="Book" id="book">Book</option>
                    </select>
                </div>
                <div id="DVD-input-spec" class="hidden input-spec">
                    <div class="a-type-div">
                        <label for="size">Size (MB)</label>
                        <input type="text" name="Size" id="size" class="number-input">
                        <input type="hidden" name="Unit" value="MB" class="unit">
                    </div>
                    <h7>Please provide size for the new CD (MB)</h7>
                </div>
                <div id='Furniture-input-spec' class="hidden input-spec">
                    <div class="a-type-div">
                        <label for="height">Height (CM)</label>
                        <input type="text" name="Height" id="height" class="number-input">
                        <input type="hidden" name="Unit" value="CM" class="unit">
                    </div>
                    <div class="a-type-div">
                        <label for="width">Width (CM)</label>
                        <input type="text" name="Width" id="width" class="number-input">
                    </div>
                    <div class="a-type-div">
                        <label for="lenght">Length (CM)</label>
                        <input type="text" name="Length" id="length" class="number-input"> 
                    </div>
                    <h7>Please provide dimensions for the new furniture (CM)</h7>
                </div>
                <div id='Book-input-spec' class="hidden input-spec">
                    <div class="a-type-div">
                        <label for="weight">Weight (KG)</label>
                        <input type="text" name="Weight" id="weight" class="number-input">
                        <input type="hidden" name="Unit" value="KG" class="unit">
                    </div>
                    <h7>Please provide weight for the new book (KG)</h7>
                </div>
            </form>
            <p id="error-container"></p>
            <?php
            $form = ob_get_clean();
            echo $form;
        }

    }