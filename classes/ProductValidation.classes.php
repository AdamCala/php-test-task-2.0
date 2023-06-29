<?php

    namespace classes;

    use abstracts\ProductModel;

    class ProductValidation{

        private $errors;
        private $array;

        function __construct(){
            $this->errors = array();
            $input = file_get_contents('php://input');
            $this->array = (json_decode($input, true));
        }

        private function checkEmpty(){
            foreach ($this->array as $key => $value) {
                if (empty($value)) {
                    array_push($this->errors,'Please, submit required data');
                    }
                }
            }
        
        public function runValidation(){
            var_dump($this->array);
            $this->checkEmpty();
            if($this->errors){
                return $this->errors;
            }else{
                return true;
            }
        }
        
    }