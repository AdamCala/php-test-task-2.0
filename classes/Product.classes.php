<?php

    namespace classes;

    class Product{

        private string $SKU;
        private string $Name;
        private float $Price;
        private string $Unit;
        private $Attributes;

        public function __construct($array){

            $this->Attributes = [];
            $this->SKU = $array['SKU'];
            $this->Name = $array['Name'];
            $this->Price = floatval($array['Price']);
            $this->Unit = $array['Unit'];

            // Depending on if you're creating a product object from database data or form data
            if (array_key_exists('Attributes', $array)) {
                foreach ($array['Attributes'] as $key => $value) {
                    $this->Attributes[$key] = floatval($value);
                }
            }else{
                foreach ($array as $key => $value) {
                    if (!property_exists($this, $key)) {
                        $this->Attributes[$key] = floatval($value);
                    }
                }
            }
            
        }
            // Setter and Getter for $sku
        public function setSku(string $sku) {
            $this->SKU = $sku;
        }

        public function getSku(): string {
            return $this->SKU;
        }

        // Setter and Getter for $name
        public function setName(string $name) {
            $this->Name = $name;
        }

        public function getName(): string {
            return $this->Name;
        }

        // Setter and Getter for $price
        public function setPrice(float $price) {
            $this->Price = $price;
        }

        public function getPrice(): float {
            return $this->Price;
        }

        // Setter and Getter for $unit
        public function setUnit(string $Unit) {
            $this->Unit = $unit;
        }

        public function getUnit(): string {
            return $this->Unit;
        }

        // Setter and Getter for $attributes
        public function setAttributes(array $attributes) {
            $this->Attributes = $attributes;
        }

        public function getAttributes(): array {
            return $this->Attributes;
        }
    }