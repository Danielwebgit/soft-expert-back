<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class TypesProduct extends DataLayer
{
    public function __construct()
    {
        parent::__construct("types_products", ["name_types_products", false]);
    }
}