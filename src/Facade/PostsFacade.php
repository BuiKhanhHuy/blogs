<?php

namespace App\Facade;

use App\Constant\HttpStatusConstant;
use App\Model\Logic\CategoriesLogic;
use App\Model\Logic\PostsLogic;
use App\Model\Logic\UsersLogic;

class PostsFacade extends AppFacade
{
    private PostsLogic $postsLogic;

    private CategoriesLogic $categoriesLogic;

    private UsersLogic $usersLogic;

    public function __construct()
    {
        $this->postsLogic = new PostsLogic();
        $this->categoriesLogic = new CategoriesLogic();
        $this->usersLogic = new UsersLogic();
    }

    public function executeIndex(array $conditions = []): array
    {
        $data = $this->postsLogic->getPostsAndTotal([
            'page' => $conditions['page'],
            'limit' => $conditions['limit'],
            'eqId' => $conditions['id'],
            'likeTitle' => $conditions['title'],
            'eqCategoryId' => $conditions['category_id'],
            'eqUserId' => $conditions['user_id'],
            'containCategory' => true,
            'containUser' => true
        ]);

        $data['data']['categories'] = $this->categoriesLogic->getCategories()['data'];
        $data['data']['users'] = $this->usersLogic->getUsersAndTotal()['data']['users'];

        return $this->generateResponse($data);
    }

    public function excuteView(int $id): array
    {
        $data = $this->postsLogic->getPost($id);

        return $this->generateResponse($data);
    }

    public function excuteUpdateView(int $id): array
    {
        $data = $this->postsLogic->getPost($id);
        $data['data']['categories'] = $this->categoriesLogic->getCategories()['data'];
        $data['data']['users'] = $this->usersLogic->getUsersAndTotal()['data']['users'];

        return $this->generateResponse($data);
    }

    public function executeSave(int $id, array $params)
    {
        $data = $this->postsLogic->updatePost($id, $params);

        return $this->generateResponse($data);
    }

    public function excuteCreateView(): array
    {
        $postEmptyEntity = $this->postsLogic->createNewEmptyEntity();

        return $this->generateResponse([
            'code' => HttpStatusConstant::SUCCESS,
            'data' => [
                'post' => $postEmptyEntity,
                'categories' => $this->categoriesLogic->getCategories()['data'],
                'users' => $this->usersLogic->getUsersAndTotal()['data']['users']
            ]
        ]);
    }

    public function executeCreate(array $params)
    {
        $data = $this->postsLogic->createPost($params);

        return $this->generateResponse($data);
    }

    public function executeDelete(int $id)
    {
        $data = $this->postsLogic->deletePost($id);

        return $this->generateResponse($data);
    }
}