<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'category_name' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1728968924,
                'updated_at' => 1728968924,
            ],
        ];
        parent::init();
    }
}
