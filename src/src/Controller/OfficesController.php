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

use Cake\Core\Configure;
use Cake\Core\Exception\Exception;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class OfficesController extends AppController
{
    public function viewOffice() {
        $this->viewBuilder()->setLayout('offices');
    }

    public function getOfficeData() {
        $this->autoRender = false;

        $allOffices = TableRegistry::getTableLocator()
            ->get('offices')
            ->find()
            ->all()
            ->toArray();

        $return = [];

        foreach($allOffices as $office) {
            $return[] = [
                'office_id' => $office['id'],
                'office_name' => $office['name'],
                'office_description' => $office['description'],
                'office_photo' => $office['photo'],
                'office_date' => date('Y-m-d H:i:s')
            ];
        }

        $this->response = $this->response->withType('json');
        $this->response = $this->response->withStringBody(json_encode($return));
        return $this->response;
    }

    public function createOffice() {
        $newOffice = TableRegistry::getTableLocator()
            ->get('offices')
            ->newEmptyEntity();

        $newOffice = TableRegistry::getTableLocator()
            ->get('offices')
            ->patchEntity($newOffice, $this->request->getData());

        $newOffice = TableRegistry::getTableLocator()
            ->get('offices')
            ->save($newOffice);

        $this->response = $this->response->withType('json');
        $this->response = $this->response->withStringBody(json_encode($newOffice));
        return $this->response;
    }

    public function updateOffice() {

    }
}
