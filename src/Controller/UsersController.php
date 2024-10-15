<?php

namespace App\Controller;

use App\Constant\HttpStatusConstant;
use App\Facade\UsersFacade;
use Cake\Log\Log;

class UsersController extends AppController
{
    private UsersFacade $usersFacade;

    public function initialize(): void
    {
        parent::initialize();
        $this->usersFacade = new UsersFacade();
    }

    public function index()
    {
        // Get the query parameters
        $queryParams = $this->request->getQueryParams();

        // Set the conditions
        $conditions = [
            'page' => $queryParams['page'] ?? 1,
            'limit' => $queryParams['limit'] ?? 10,
            'email' => $queryParams['email'] ?? null,
            'username' => $queryParams['username'] ?? null,
            'id' => $queryParams['id'] ?? null,
        ];

        // Execute the business logic
        $results = $this->usersFacade->executeIndex($conditions);

        // Get the data from the results
        $users = $results['data']['users'] ?? [];
        $total = $results['data']['total'] ?? 0;

        $this->set('users', $users);
        $this->set('total', $total);
        $this->set('page', $conditions['page']);
        $this->set('limit', $conditions['limit']);
    }

    public function view($id)
    {
        $result = $this->usersFacade->excuteView($id);

        $user = $result['data'] ?? null;
        $this->set('user', $user);
    }

    public function update($id)
    {
        $result = $this->usersFacade->excuteUpdateView($id);
        $user = $result['data'] ?? null;

        if ($this->request->is(['post', 'put'])) {
            $savedResult = $this->usersFacade->executeSave($id, $this->request->getData());

            if ($savedResult['code'] == HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(false, 'User updated successfully');
            } else {
                $this->setFlashMessage(true, 'User update failed');
            }

            $user = $savedResult['data'] ?? null;
        }

        $this->set('user', $user);
    }

    public function create()
    {
        $result = $this->usersFacade->excuteCreateView();
        $user = $result['data'] ?? null;

        if ($this->request->is('post')) {
            $createdResult = $this->usersFacade->executeCreate($this->request->getData());

            if ($createdResult['code'] == HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(false, 'User created successfully');
            } else {
                $this->setFlashMessage(true, 'User create failed');
            }

            $user = $createdResult['data'] ?? null;
        }

        $this->set('user', $user);
    }

    public function delete($id)
    {
        if ($this->request->is('post')) {
            $deletedResult = $this->usersFacade->executeDelete($id);
            if ($deletedResult['code'] != HttpStatusConstant::SUCCESS) {
                $this->setFlashMessage(true, 'User delete failed', $deletedResult['message']);
            } else {
                $this->setFlashMessage(false, 'User deleted successfully');
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->setFlashMessage(true, 'Invalid request method');
        return $this->redirect(['action' => 'index']);
    }
}