<?php

namespace Src\Services\Product;

use Src\Models\Product;

class ProductService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function registerProduct(array $dataForm): bool
    {
        $this->model->name_product = $dataForm['name_product'];
        $this->model->description = $dataForm['description'];
        $this->model->price = $dataForm['price'];
        $this->model->category_id = $dataForm['category_id'];
        $this->model->img = $dataForm['img'];
        return $this->model->save();
    }

    public function getPrice() 
    {
        return $this->model->price;
    }
}