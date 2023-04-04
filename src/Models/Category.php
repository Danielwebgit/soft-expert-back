<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    public function __construct()
    {
        parent::__construct("categories", ["name_category"], 'id', false);
    }

    public function products()
    {
        return (new Product())->find("category_id = :name", "name={$this->id}")->fetch(true);
    }

    public function add(TypesProduct $typesProduct, string $nameCategory)
    {
        $this->id_type_product = $typesProduct->id;
        $this->nameCategory = $nameCategory;

        return $this;
    }
}