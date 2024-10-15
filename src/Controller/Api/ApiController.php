<?php 

namespace App\Controller\Api;

use Cake\Controller\Controller;

class ApiController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function generateResponse($data, $statusCode = 200)
    {
        return $this->response->withType('application/json')
            ->withStatus($statusCode)
            ->withStringBody(json_encode($data));
    }
}