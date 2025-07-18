<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Constant\HttpStatusConstant;
use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    // ahihi
    /**
     * Initialization hook method.s
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        // $this->loadComponent('FormProtection');
    }

    public function generateResponse($data)
    {
        return $this->response->withType('application/json')
            ->withStatus($data['code'] ?? 200)
            ->withStringBody(json_encode($data['data'] ?? null));
    }

    public function setFlashMessage($isError = true, $message = "An error occurred!", $messageDetail = ''): void
    {
        if ($isError) {
            $this->Flash->error($message,  [
                'params' => [
                    'details' => $messageDetail
                ]
            ]);
        } else {
            $this->Flash->success($message, [
                'params' => [
                    'details' => $messageDetail
                ]
            ]);
        }
    }
}
