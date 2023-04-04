<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class Product extends DataLayer
{
    public function __construct()
    {
        parent::__construct("products", ["name_product", "description", "price", "category_id"], "id", false);
    }

    public function categories()
    {
        return (new Category())->limit(1)->find("id = :name", "name={$this->category_id}")->fetch(true);
    }
}