<?php

    namespace abstracts;

    use classes\Product;

    abstract class ProductModel extends Database{

        // * Returns an array of product objects
        public function getProducts(){
            
            $productObjects = [];
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
            foreach($rows as $row){
                $product = new Product($row);
                array_push($productObjects,$product);
            }
            $this->closeConnection();
            return $productObjects;
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

        public function addProducts(Product $productObject) {

            $this->openConnection();

            $sku = $productObject->getSku();
            $name = $productObject->getName();
            $price = $productObject->getPrice();
            $unit = $productObject->getUnit();
            $attributes = $productObject->getAttributes();

            // Prepare the SQL statement for inserting into the "products" table
            $sql ="INSERT INTO products (SKU, Name, Price) VALUES (?, ?, ?)";
            $productStatement = $this->databaseConnection->prepare($sql);
            $productStatement->bind_param("sss", $sku, $name, $price);
            $productStatement->execute();

            // Prepare the SQL statement for inserting into the "productattributes" table
            $sql2 = "INSERT INTO productattributes (SKU, value, AttributeName, Unit) VALUES (?, ?, ?, ?)";
            $attributeStatement = $this->databaseConnection->prepare($sql2);

            // Iterate over the remaining attributes in the array
            foreach ($attributes as $attributeName => $value) {
                // Insert the attribute into the "productattributes" table
                $attributeStatement->bind_param("sdss", $sku, $value, $attributeName, $unit);
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
    

