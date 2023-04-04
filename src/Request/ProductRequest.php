<?php

namespace Src\Request;

use Gridonic\JsonResponse\ErrorJsonResponse;
use Gridonic\JsonResponse\SuccessJsonResponse;
use Respect\Validation\Validator;

class ProductRequest
{
    public function validateForm($formData)
    {
        $formData['name_product'] = $_POST['name_product'] ?? '';
        $formData['description'] = $_POST['description'] ?? '';
        $formData['price'] = $_POST['price'] ?? '';
        $formData['category_id'] = $_POST['category_id'] ?? '';
        $formData['img'] = $_POST['img'] ?? '';
        
        $error = [];

        if (!Validator::notEmpty()->validate($formData['name_product'])) {
            $error['name_product'] = 'O campo nome é obrigatório.';
        }

        if (!Validator::notEmpty()->validate($formData['description'])) {
            $error['description'] = 'O campo description é obrigatório.';
        }

        if (!Validator::floatVal()->min(18)->validate($formData['price'])) {
            $error['price'] = 'O campo preço não é válido.';
        }

        if (!Validator::notEmpty()->validate($formData['category_id'])) {
            $error['category_id'] = 'O campo categoria é obrigatório.';
        }

        if($error) {
            $response = new ErrorJsonResponse("error", $error);
            $response->send(); die;
        }

        return $formData;
    }
}
