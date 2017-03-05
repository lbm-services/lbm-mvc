<?php

namespace Lbm\Mvc\Controllers;


use Lbm\Mvc\Core\Db;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\HtmlTemplateView;
use \Lbm\Mvc\Models;


class AdminController implements Controller
{

    public $users = null;
    protected $db;
    protected $username;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->users = new Models\User($this->db);
    }

    /**
     * function index
     *
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $view = new HtmlTemplateView('Admin');

        $users = $this->users->getAllUser();

        $view->assign('users', $users);
        $view->render($request, $response);
    }

    /**
     * function addUser
     *
     * @param Request $request
     * @param Response $response
     */
    public function addUser(Request $request, Response $response)
    {
        $data = $request->getPost();
        if (null !== $data) {
            if (isset($data["submit_add_user"])) {
                $error = $this->_validate($data);
                if (!empty($error)) {
                    $view = new HtmlTemplateView('Admin');
                    $users = $this->users->getAllUser();
                    $view->assign('users', $users);
                    $view->assign('error', $error);
                    $obj = (object) $data;
                    $view->assign('user', $obj);
                    $view->render($request, $response);
                } else {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->users->addUser($data);
                    $response->redirect('admin/index');
                }
            }
        } else {
            $response->redirect('admin/index');
        }
    }

    /**
     * function deleteUser
     *
     *
     * @param Request $request
     * @param Response $response
     * @param type $user_id
     */
    public function deleteUser(Request $request, Response $response, $user_id)
    {
        if (isset($user_id)) {
            $this->users->deleteUser($user_id);
        }

        $response->redirect('admin/index');
    }

    /**
     * function editUser
     *
     * @param Request $request
     * @param Response $response
     * @param type $user_id
     */
    public function editUser(Request $request, Response $response, $user_id)
    {
        $view = new HtmlTemplateView('User_Edit');
        if (isset($user_id)) {
            $user = $this->users->getUser($user_id);
            $view->assign('user', $user);
            $view->render($request, $response);
        } else {

            $response->redirect('admin/index');
        }
    }

    /**
     * function updateUser
     *
     * @param Request $request
     * @param Response $response
     */
    public function updateUser(Request $request, Response $response)
    {
        $params = $request->getPost();
        if (null !== $params) {
            if (isset($params["submit_update_user"])) {
                $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);
                $this->users->updateUser($params);
            }
        }

        $response->redirect('admin/index');
    }

    /**
     * private function _validate
     *
     * @param type $data
     * @return array
     */
    private function _validate($data)
    {
        $error = [];
        foreach ($data as $key => $value) {
            switch (strtolower($key)) {
                case 'email':
                    if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $error[$key] = 'No valid email.';
                    }
                    break;
                case 'fk_role_id':
                    if (false === filter_var($value, FILTER_VALIDATE_INT, [  'options' => ['min_range' => 1, 'max_range' => 3  ]])) {
                        $error[$key] = 'No valid roleId. Only integers from 1 to 3 allowed.';
                    }
                    break;
                default:
                    if (false === filter_var($value, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9\-\s]{3,55}$/")))) {
                        $error[$key] = 'No valid string. Use Letters and Numbers with hyphens and/or blanks only. Min count 3, max 55.';
                    }
                    break;
            }
        }
        return $error;
    }

}