<?php

namespace App\Facade;

use App\Constant\HttpStatusConstant;
use App\Model\Logic\UsersLogic;

class UsersFacade extends AppFacade
{
    private UsersLogic $usersLogic;

    public function __construct()
    {
        $this->usersLogic = new UsersLogic();
    }

    public function executeIndex(array $conditions = []): array
    {
        $data = $this->usersLogic->getUsersAndTotal([
            'page' => $conditions['page'],
            'limit' => $conditions['limit'],
            'eqId' => $conditions['id'],
            'likeEmail' => $conditions['email'],
            'likeUsername' => $conditions['username'],
        ]);

        return $this->generateResponse($data);
    }

    public function excuteView(int $id): array
    {
        $data = $this->usersLogic->getUser($id);

        return $this->generateResponse($data);
    }

    public function excuteUpdateView(int $id): array
    {
        $data = $this->usersLogic->getUser($id);

        return $this->generateResponse($data);
    }

    public function executeSave(int $id, array $params)
    {
        $data = $this->usersLogic->updateUser($id, $params);

        return $this->generateResponse($data);
    }

    public function excuteCreateView(): array
    {
        $userEmptyEntity = $this->usersLogic->createNewEmptyEntity();

        return $this->generateResponse([
            'code' => HttpStatusConstant::SUCCESS,
            'data' => $userEmptyEntity
        ]);
    }

    public function executeCreate(array $params)
    {
        $data = $this->usersLogic->createUser($params);

        return $this->generateResponse($data);
    }

    public function executeDelete(int $id)
    {
        $data = $this->usersLogic->deleteUser($id);

        return $this->generateResponse($data);
    }
}