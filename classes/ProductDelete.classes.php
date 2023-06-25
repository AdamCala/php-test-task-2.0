<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductDelete extends ProductModel{
        
        private $sku_list;

        public function __construct($sku_array){
            $this->sku_list = $sku_array;
        }

        private function prepareSku(){
            $placeholders = implode(',', array_fill(0, count($this->sku_list), '?'));
            $this->deleteProducts($placeholders);
        }

    }