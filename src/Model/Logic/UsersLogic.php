<?php

namespace App\Model\Logic;

use App\Constant\HttpStatusConstant;
use Cake\Log\Log;
use Cake\ORM\Query;

class UsersLogic extends AppLogic
{
    public function __construct()
    {
        parent::__construct('Users');
    }

    public function getUsersAndTotal($conditions = [])
    {
        $query = $this->table->find();

        $query = $this->generateQuery($query, $conditions);
        $total = $query->count();

        $users = $query->all();
        return [
            'code' => HttpStatusConstant::SUCCESS,
            'data' => [
                'users' => $users,
                'total' => $total
            ]
        ];
    }

    public function getUser($primary)
    {
        $user = $this->table->find()
            ->where(['id' => $primary])
            ->first();
        return [
            'code' => HttpStatusConstant::SUCCESS,
            'data' => $user
        ];
    }

    public function updateUser($primary, $params)
    {
        $isUpdatePassword = boolval($params['isUpdatePassword'] ?? true);

        $userEntity = $this->table->patchEntity(
            $this->table->get($primary),
            $params
        );
        $userEntity->setDirty('password', true);

        if ($this->table->save($userEntity, ['isUpdatePassword' => $isUpdatePassword])) {
            return [
                'code' => HttpStatusConstant::SUCCESS,
                'data' => $userEntity
            ];
        }

        return [
            'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
            'data' => $userEntity
        ];
    }

    public function createUser($params)
    {
        $userEntity = $this->table->newEntity($params);

        if ($this->table->save($userEntity)) {
            return [
                'code' => HttpStatusConstant::SUCCESS,
                'data' => $userEntity
            ];
        }

        return [
            'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
            'data' => $userEntity
        ];
    }

    public function deleteUser($primary)
    {
        $userEntity = $this->table->get($primary);

        try {
            if ($this->table->delete($userEntity)) {
                return [
                    'code' => HttpStatusConstant::SUCCESS,
                    'data' => $userEntity
                ];
            }

            return [
                'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
                'data' => $userEntity
            ];
        } catch (\Throwable $th) {
            return [
                'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
                'data' => [],
                'message' => $th->getMessage()
            ];
        }

    }

    public function generateQuery(Query $query, array $conditions)
    {
        if (!empty($conditions['eqId'])) {
            $query = $query->find('eqId', ['id' => $conditions['eqId']]);
        }
        if (!empty($conditions['likeEmail'])) {
            $query = $query->find('likeEmail', ['email' => $conditions['likeEmail']]);
        }
        if (!empty($conditions['likeUsername'])) {
            $query = $query->find('likeUsername', ['username' => $conditions['likeUsername']]);
        }
        if (!empty($conditions['page']) && !empty($conditions['limit'])) {
            $query = $query->page($conditions['page'], $conditions['limit']);
        }

        return $query;
    }
}