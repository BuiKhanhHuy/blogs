<?php

namespace App\Model\Logic;
use App\Constant\HttpStatusConstant;
use Cake\ORM\Query;

class PostsLogic extends AppLogic
{
    public function __construct()
    {
        parent::__construct('Posts');
    }

    public function getPostsAndTotal($conditions = [])
    {
        $query = $this->table->find();

        $query = $this->generateQuery($query, $conditions);
        $total = $query->count();

        $posts = $query->all();
        return [
            'code' => HttpStatusConstant::SUCCESS,
            'data' => [
                'posts' => $posts,
                'total' => $total
            ]
        ];
    }

    public function getPost($primary)
    {
        $post = $this->table->find()
            ->find('eqId', ['id' => $primary])
            ->find('containCategory')
            ->find('containUser')
            ->first();
        return [
            'code' => HttpStatusConstant::SUCCESS,
            'data' => [
                'post' => $post
            ]
        ];
    }

    public function updatePost($primary, $params)
    {
        $postEntity = $this->table->patchEntity(
            $this->table->get($primary),
            $params
        );
        if ($this->table->save($postEntity)) {
            return [
                'code' => HttpStatusConstant::SUCCESS,
                'data' => $postEntity
            ];
        }

        return [
            'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
            'data' => $postEntity
        ];
    }

    public function createPost($params)
    {
        $postEntity = $this->table->newEntity( $params);

        if ($this->table->save($postEntity)) {
            return [
                'code' => HttpStatusConstant::SUCCESS,
                'data' => $postEntity
            ];
        }

        return [
            'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
            'data' => $postEntity
        ];
    }

    public function deletePost($primary)
    {
        $postEntity = $this->table->get($primary);

        try {
            if ($this->table->delete($postEntity)) {
                return [
                    'code' => HttpStatusConstant::SUCCESS,
                    'data' => $postEntity
                ];
            }

            return [
                'code' => HttpStatusConstant::INTERNAL_SERVER_ERROR,
                'data' => $postEntity
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
        if (!empty($conditions['likeTitle'])) {
            $query = $query->find('likeTitle', ['title' => $conditions['likeTitle']]);
        }
        if (!empty($conditions['eqCategoryId'])) {
            $query = $query->find('eqCategoryId', ['category_id' => $conditions['eqCategoryId']]);
        }
        if (!empty($conditions['eqUserId'])) {
            $query = $query->find('eqUserId', ['user_id' => $conditions['eqUserId']]);
        }
        if (!empty($conditions['page']) && !empty($conditions['limit'])) {
            $query = $query->page($conditions['page'], $conditions['limit']);
        }

        if(!empty($conditions['containCategory'])) {
            $query = $query->find('containCategory');
        }

        if(!empty($conditions['containUser'])) {
            $query = $query->find('containUser');
        }

        return $query;
    }
}