<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Log\Log;
use Cake\ORM\Entity;
use Cake\Routing\Route\Route;
use Cake\Routing\Router;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int $user_id
 * @property int $category_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 */
class Post extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'content' => true,
        'created_at' => true,
        'updated_at' => true,
        'user_id' => true,
        'category_id' => true,
        'user' => true,
        'category' => true,
    ];

    protected $_virtual = [
        'short_content',
        'category_name',
        'author_name',
    ];

    public function _getShortContent(): string
    {
        $content = $this->content;
        if(!empty($content)) {
            return nl2br(mb_strimwidth($content, 0, 100, '...'));
        }
        
        return '---';
    }

    public function _getCategoryName(): string
    {
        $url = Router::url([
            'controller' => 'Categories',
            'action' => 'view',
            $this->category->id ?? null,
        ]);
        $text = $this->category->category_name ?? '---';


        return "<a class='link-opacity-100' href='$url'>$text</a>";
    }

    public function _getAuthorName(): string
    {
        $url = Router::url([
            'controller' => 'Users',
            'action' => 'view',
            $this->user->id ?? null,
        ]);
        $text = $this->user->email ?? '---';

        return "<a class='link-opacity-100' href='$url'>$text</a>";
    }
}
