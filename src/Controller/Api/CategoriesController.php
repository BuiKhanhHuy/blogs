<?php

namespace App\Controller\Api;

use App\Facade\CategoriesFacade;

class CategoriesController extends ApiController
{
    private CategoriesFacade $categoriesFacade;

    public function initialize(): void
    {
        parent::initialize();
        $this->categoriesFacade = new CategoriesFacade();
    }

    public function list()
    {
        $this->autoRender = false;

        $categoriesResult = $this->categoriesFacade->executeGetCategories();
        return $this->generateResponse($categoriesResult['data'], $categoriesResult['code']);
    }

    public function view($id)
    {
        $this->autoRender = false;

        $categoryResult = $this->categoriesFacade->executeGetCategory($id);
        return $this->generateResponse($categoryResult['data'], $categoryResult['code']);
    }

    public function create()
    {
        if($this->request->is('post')) {
            $data = $this->request->getData();
        }
    }

    public function edit($id)
    {
        $this->set([
            'message' => 'edit',
            'id' => $id,
            '_serialize' => ['message', 'id'],
        ]);
    }

    public function delete($id)
    {
        $this->set([
            'message' => 'delete',
            'id' => $id,
            '_serialize' => ['message', 'id'],
        ]);
    }
}