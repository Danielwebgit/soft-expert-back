<?php

namespace Src\Repositories\Product;

use Src\Models\Product;

class ProductRepository
{
    private $model;

    public function __construct() 
    {
         $this->model = new Product();
    }

    public function fetchAllProducts(): array
    {
        $products = $this->model->find()->fetch(true);
        $objProducts = [];

        foreach($products as $product) {

            $objProducts[] = [
                "product" => (array)  [
                    "id" => $product->id, 
                    "name" => $product->name_product, 
                    "description" => $product->description,
                    "img" => $product->img, 
                    "price" => $product->price
                ],
                "category" => (array) $product->categories()[0]->data()
            ];
        }

        return $objProducts;
    }
}