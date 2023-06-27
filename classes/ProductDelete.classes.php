<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductDelete extends ProductModel{
        
        private $sku_list_json;

        public function __construct(){
            // * Calls the parent constructor in order to assing DB credentials from config file
            parent::__construct();
            $this->sku_list_json = file_get_contents('php://input');
        }

        public function prepareSku(){
            $sku_list = json_decode($this->sku_list_json, true);
            $sku_values = $sku_list["SKU"];
            $placeholders = implode(',', array_fill(0, count($sku_values), '?'));
            
            $this->deleteProducts($placeholders,$sku_values);
        }

    }