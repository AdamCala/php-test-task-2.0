<?php

    namespace abstracts;

    abstract class ProductModel extends Database{

        // * Returns an associative array of products with SKUs as the keys
        public function getProducts(){
            
            $this->openConnection();

            $sql = "SELECT products.SKU,
                    products.Name,
                    products.Price,
                    productattributes.AttributeName,
                    productattributes.Value,
                    productattributes.Unit
                FROM products 
                INNER JOIN productattributes 
                ON products.SKU = productattributes.SKU";

            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = array();

            while ($row = $result->fetch_assoc()) {
                $sku = $row['SKU'];

                if (!isset($rows[$sku])) {
                    $rows[$sku] = array(
                        'SKU' => $sku,
                        'Name' => $row['Name'],
                        'Price' => $row['Price'],
                        'Attributes' => array(),
                        'Unit' => $row['Unit']
                    );
                }
                $attributeName = $row['AttributeName'];
                $value = $row['Value'];
                $rows[$sku]['Attributes'][$attributeName] = $value;
            }
            $this->closeConnection();
            return $rows;
        }

    }