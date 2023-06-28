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
                    <input type="text" name="sku" id="sku-input">
                </div>
                <div class="a-type-div">
                    <label for="name-input">Name</label>
                    <input type="text" name="name" id="name-input">
                </div>
                <div class="a-type-div">
                    <label for="price-input">Price ($)</label>
                    <input type="number" name="price" id="price-input">
                </div>
                <div class="a-type-div">
                    <label for="productType-input">Type Switcher</label>
                    <select value="productType" id="productType-input">
                        <option name="DVD" id="dvd" selected>DVD</option>
                        <option name="Furniture" id="furniture">Furniture</option>
                        <option name="Book" id="book">Book</option>
                    </select>
                </div>
                <div id="DVD-input-spec" class="hidden input-spec a-type-div">
                    <label for="size-input">Size (MB)</label>
                    <input type="number" name="size" id="size-input">
                </div>
                <div id='Furniture-input-spec' class="hidden input-spec">
                    <div class="a-type-div">
                        <label for="height-input">Height (CM)</label>
                        <input type="number" name="height" id="height-input">
                    </div>
                    <div class="a-type-div">
                        <label for="width-input">Width (CM)</label>
                        <input type="number" name="width" id="width-input">
                    </div>
                    <div class="a-type-div">
                        <label for="length-input">Length (CM)</label>
                        <input type="number" name="length" id="length-input"> 
                    </div>
                </div>
                <div id='Book-input-spec' class="hidden input-spec a-type-div">
                    <label for="weight-input">Weight (KG)</label>
                    <input type="number" name="weight" id="weight-input">
                </div>
            </form>
            <?php
            $form = ob_get_clean();
            echo $form;
        }

    }