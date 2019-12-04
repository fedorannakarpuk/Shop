<?php

class Model_Products extends Model{

    public function get_data(){

        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, category_products.title as category_name
                FROM products
                LEFT JOIN category_products ON products.id_catalog = category_products.id";

        $result = $this->connection->query($sql);

        if(!$result){
            return $result;
        }

        return $result;

    }

    public function get_product($id){
        $sql = "SELECT products.id, products.title, products.price, products.mark,
                products.description, category_products.title as category_name
                FROM products
                LEFT JOIN category_products ON products.id_catalog = category_products.id WHERE products.id = $id";

//        $stmt = $this->_pdo->prepare($sql);
//        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//        $stmt->execute();
//        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $this->connection->query($sql);

        $product = $result->fetch_assoc();

        return $product;

    }


}