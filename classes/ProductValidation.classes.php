<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductValidation{

        private $errors;

        // initialize array for the errors
        function __construct(){
            $this->errors = array();
        }

        // if the array has an empty value add the appropriate arror message to the errors array and break the loop
        private function checkEmpty($array){
            foreach ($array as $key => $value) {
                if (empty($value)) {
                    array_push($this->errors,'Please, submit required data');
                    return;
                    }
                }
            }
        
        // run the checkEmpty method and return the array
        public function runValidation($array){
            $this->checkEmpty($array);
            if($this->errors){
                return $this->errors;
             }
        }
    }