<?php

namespace Src\Services\Sale;

use Src\Models\Product;

class ProductSaleService
{

    protected $model;
    private $cliente;
    private $itens = array();

    public function __construct()
    {
        $this->model = new Product();
    }

    public function getClient() 
    {
        return $this->cliente;
    }

      public function addItem($product, $qtd) 
      {
        $this->itens[] = array(
          'product' => $product,
          'qtd' => $qtd
        );
      }

      public function getItens() 
      {
        return $this->itens;
      }

      public function getTotal() 
      {
        $total = 0;

        foreach ($this->itens as $item) {
          $total += $item['product']->getPrice() * $item['qtd'];
        }
        return $total;
      }
}