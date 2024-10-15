<?php

namespace App\Facade;

class AppFacade
{
    public function __construct()
    {
    }

    public function generateResponse($resutl) {
        return [
            'code' => $resutl['code'] ?? 200,
            'data' => $resutl['data'] ?? null,
            'message' => $resutl['message'] ?? null
        ];
    }
}