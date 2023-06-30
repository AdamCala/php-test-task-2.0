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

        public function deleteProducts($placeholders,$sku_values){

            $this->openConnection();
            $sql = "DELETE FROM products WHERE SKU IN ($placeholders)";

            $stmt = $this->databaseConnection->prepare($sql);

            $paramTypes = str_repeat("s", count($sku_values));
            $stmt->bind_param($paramTypes, ...$sku_values);

            $stmt->execute();
            $result = $stmt->get_result();
            $this->closeConnection();

            return $result;
        }

        public function addProducts($array) {

            $this->openConnection();

            $sku = $array['sku'];
            $name = $array['name'];
            $price = $array['price'];
            $productType = $array['productType'];
            $unit = $array['unit'];

            // Prepare the SQL statement for inserting into the "products" table
            $sql ="INSERT INTO products (SKU, Name, Price) VALUES (?, ?, ?)";
            $productStatement = $this->databaseConnection->prepare($sql);
            $productStatement->bind_param("sss", $sku, $name, $price);
            $productStatement->execute();

            // Prepare the SQL statement for inserting into the "productattributes" table
            $sql2 = "INSERT INTO productattributes (SKU, value, AttributeName, Unit) VALUES (?, ?, ?, ?)";
            $attributeStatement = $this->databaseConnection->prepare($sql2);

            // Iterate over the remaining attributes in the array
            foreach ($array as $attributeName => $value) {
                // Skip the known attributes
                if ($attributeName == 'sku' || $attributeName == 'name' || $attributeName == 'price' || $attributeName == 'unit' || $attributeName == 'productType') {
                    continue;
                }
                $floatvalue = floatval($value);
                // Insert the attribute into the "productattributes" table
                $attributeStatement->bind_param("sdss", $sku, $floatvalue, $attributeName, $unit);
                $attributeStatement->execute();
            }

            // Close the prepared statements
            $productStatement->close();
            $attributeStatement->close();
            $this->closeConnection();
        }

        public function getSku(){

            $this->openConnection();

            $sql = "SELECT SKU from products";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $sku = [];
            while ($row = $result->fetch_assoc()) {
                array_push($sku,$row['SKU']); // Assuming SKU is the column name in the result set
            }
            return $sku;
        }

    }
    

