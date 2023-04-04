<?php
require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
/**
 * Controllers
 */
$router->namespace("Src\Controllers");

/**
 * Grupo de rotas dos Produtos
 */
$router->group('products');
$router->get("/","ProductsController:index");
$router->post("/store",'ProductsController:store');
$router->post("/update/{id}",'ProductsController:update');

/**
 * Grupo de venda do produto
 */
$router->group(null);
$router->post("/purchaseorder", "SaleController:store");

$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}
