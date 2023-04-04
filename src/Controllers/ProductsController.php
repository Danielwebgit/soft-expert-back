<?php

namespace Src\Controllers;

use Gridonic\JsonResponse\ErrorJsonResponse;
use Gridonic\JsonResponse\SuccessJsonResponse;
use Src\Repositories\Product\ProductRepository;
use Src\Request\ProductRequest;
use Src\Services\Product\ProductService;

class ProductsController
{

    protected $productRepository;
    protected $productService;

    public function __construct(
    ){
        $this->productRepository = new ProductRepository();
        $this->productService = new ProductService();
    }

    public function index()
    {
        $products = $this->productRepository->fetchAllProducts();
        $response = new SuccessJsonResponse([ $products ]);
        $response->send();
    }

    public function store($formData)
    {
        $formData = ( new ProductRequest())->validateForm($formData);
        $insert = $this->productService->registerProduct($formData);

        if($insert) {
            $response = new SuccessJsonResponse([ "Produto adicionado com sucesso!" ]);
            $response->send();
        } else {
            $response = new ErrorJsonResponse("error", "Erro ao adicionar o produto!", null, 401);
            $response->send();
        }
    }

    public function errCore($data)
    {
        return new SuccessJsonResponse("erro", [ $data ]);
    }
}