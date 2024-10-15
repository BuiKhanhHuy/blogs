<?php

namespace App\Controller;

use App\Constant\HttpStatusConstant;
use App\Facade\PostsFacade;
use Cake\Log\Log;

class PostsController extends AppController
{
    private PostsFacade $postsFacade;

    public function initialize(): void
    {
        parent::initialize();
        $this->postsFacade = new PostsFacade();
    }

    public function index()
    {
        // Get the query parameters
        $queryParams = $this->request->getQueryParams();

        // Set the conditions
        $conditions = [
            'page' => $queryParams['page'] ?? 1,
            'limit' => $queryParams['limit'] ?? 10,
            'id' => $queryParams['id'] ?? null,
            'title' => $queryParams['title'] ?? null,
            'category_id' => $queryParams['category_id'] ?? null,
            'user_id' => $queryParams['user_id'] ?? null,
        ];

        // Execute the business logic
        $results = $this->postsFacade->executeIndex($conditions);

        // Get the data from the results
        $posts = $results['data']['posts'] ?? [];
        $categories = $results['data']['categories'] ?? [];
        $users = $results['data']['users'] ?? [];
        $total = $results['data']['total'] ?? 0;

        $this->set('page', $conditions['page']);
        $this->set('limit', $conditions['limit']);
        $this->set(compact('posts', 'categories', 'users', 'total'));
    }

    public function view($id)
    {
        $result = $this->postsFacade->excuteView($id);

        $post = $result['data']['post'] ?? null;
        $this->set('post', $post);
    }

    public function update($id)
    {
        $result = $this->postsFacade->excuteUpdateView($id);
        $post = $result['data']['post'] ?? null;
        $categories = $result['data']['categories'] ?? null;
        $users = $result['data']['users'] ?? null;

        if ($this->request->is(['post', 'put'])) {
            $savedResult = $this->postsFacade->executeSave($id, $this->request->getData());

            if ($savedResult['code'] == HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(false, 'Post updated successfully');
            } else {
                $this->setFlashMessage(true, 'Post update failed');
            }

            $post = $savedResult['data'] ?? null;
        }

        $this->set(compact('post', 'categories', 'users'));
    }

    public function create()
    {
        $result = $this->postsFacade->excuteCreateView();
        $post = $result['data']['post'] ?? null;
        $categories = $result['data']['categories'] ?? null;
        $users = $result['data']['users'] ?? null;

        if ($this->request->is('post')) {
            $createdResult = $this->postsFacade->executeCreate($this->request->getData());

            if ($createdResult['code'] == HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(false, 'Post created successfully');
            } else {
                $this->setFlashMessage(true, 'Post create failed');
            }

            $post = $createdResult['data'] ?? null;
        }

        $this->set(compact('post', 'categories', 'users'));
    }

    public function delete($id)
    {
        if ($this->request->is('post')) {
            $deletedResult = $this->postsFacade->executeDelete($id);
            if ($deletedResult['code'] != HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(true, 'Post delete failed', $deletedResult['message']);
            } else {
                $this->setFlashMessage(false, 'Post deleted successfully');
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->setFlashMessage(true, 'Invalid request method');
        return $this->redirect(['action' => 'index']);
    }
}