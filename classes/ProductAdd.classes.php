<?php

    namespace classes;

    use abstracts\ProductModel;
    use classes\ProductValidation;

    class ProductAdd extends ProductModel{

        private ProductValidation $validation;
        private $validationResult;
        private $array;

        function __construct(){
            parent::__construct();
            // Get data form data from a post request and decode it to an associative array
            $input = file_get_contents('php://input');
            $this->array = (json_decode($input, true));
            // Validate the data using ProductValidation class. If the data is valid it will return false, 
            // otherwise it will return a array with errors which is consideret truthy
            // assign the validatyion result to validation result property
            $this->validation = new ProductValidation();
            $this->validationResult = $this->validation->runValidation($this->array);
        }

        // if the array is empty, ergo falsy in a if statement pass the product data be added to the database
        // otherwise return array with errors to be displayed to the user
        public function addProductCheck(){
            if(!$this->validationResult){
                $this->callAddProduct();
            }else{
                return $this->validationResult;
            }
        }

        // is the validation passed prepere product data to be added to the database and send it further
        private function callAddProduct(){
            $this->addProducts($this->array);
        }

    }