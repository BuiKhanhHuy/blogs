<?php

namespace App\Facade;

use App\Model\Logic\CategoriesLogic;

class CategoriesFacade extends AppFacade
{
    private CategoriesLogic $categoriesLogic;

    public function __construct()
    {
        $this->categoriesLogic = new CategoriesLogic();
    }

    public function executeGetCategories()
    {
        $dataResults = $this->categoriesLogic->getCategories();

        return $this->generateResponse($dataResults);
    }

    public function executeGetCategory($id)
    {
        $dataResults = $this->categoriesLogic->getCategory($id);

        return $this->generateResponse($dataResults);
    }
}