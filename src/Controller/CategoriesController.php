<?php

namespace App\Controller;

class CategoriesController extends AppController
{
    public function index()
    {
        $this->set('categories', []);
    }
}