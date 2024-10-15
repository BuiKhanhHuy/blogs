<?php

namespace App\Model\Logic;

use App\Constant\HttpStatusConstant;

class CategoriesLogic extends AppLogic
{
    public function __construct()
    {
        parent::__construct('Categories');
    }

    public function getCategories()
    {
        $query = $this->table->find('all');

        $categories = $query->all();
        return [
            'data' => $categories,
            'code' => HttpStatusConstant::SUCCESS
        ];
    }

    public function getCategory($primary)
    {
        $query = $this->table->find('eqId', ['id' => $primary]);

        $category = $query->first();
        return [
            'data' => $category,
            'code' => HttpStatusConstant::SUCCESS
        ];
    }
}