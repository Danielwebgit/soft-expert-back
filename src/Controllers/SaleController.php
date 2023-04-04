<?php

namespace Src\Controllers;
use Src\Services\Sale\ProductSaleService;

class SaleController
{

    protected $productSaleService;
    protected $jsonData;

    public function __construct()
    {
        $this->jsonData = $this->jsonData();
        $this->productSaleService = new ProductSaleService();
    }

    public function store($formData)
    {
        $formData = $this->jsonData;
        $qtdItems = count($formData['products']);
        $this->productSaleService->addItem($formData['products'], $qtdItems);
        $total = $this->productSaleService->getTotal();
    }

    public function jsonData()
    {
         // Recebe o corpo da solicitação como uma string JSON
         $json = file_get_contents('php://input');
         // Decodifica a string JSON em um array associativo do PHP
         $data = json_decode($json, true);
         // Retorna o array associativo com os dados JSON
         return $data;
    }
}