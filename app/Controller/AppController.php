<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Session');

    public $components = array(
//        TODO: remover flash de outras controladoras
        'DebugKit.Toolbar',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'licitations', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'cpf_cnpj')
                )
            ),
            'authorize' => array('Controller'),
        )
    );

    protected $dontAllow = array(
        'gerente' => array(
            'ProposalsController' => array(
                'add',
                'edit'
            )
        ),
        'funcionário' => array(
            'ProposalsController' => array(
                'add',
                'edit',
                'delete'
            ),
            'LicitationsController' => array(
                'compare',
                'delete'
            ),
            'LicitationItemsController' => array(
                'delete'
            ),
            'UsersController' => array(
                'delete'
            )
        ),
        'fornecedor' => array(
            'LicitationsController' => array(
                'compare',
                'add',
                'edit',
                'delete'
            ),
            'LicitationItemsController' => array(
                'add',
                'edit',
                'delete'
            ),
            'UsersController' => array(
                'add',
                'delete'
            )
        )
    );

    public function isAuthorized($user = null)
    {
        if (isset($this->dontAllow[$user['role']][static::class]))
            foreach ($this->dontAllow[$user['role']][static::class] as $action)
            {
                if ($action == $this->action) return false;
            }
        return true;
    }
}
