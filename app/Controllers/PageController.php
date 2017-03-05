<?php

namespace Lbm\Mvc\Controllers;

use Lbm\Mvc\Core\Db;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\Registry;
use Lbm\Mvc\Core\HtmlTemplateView;
use \Lbm\Mvc\Models;


class PageController implements Controller
{

    public $pages = null;
    protected $db;
    protected $username;
    protected $userId;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->pages = new Models\Page($this->db);

        $usermdl = new Models\User($this->db);

        $reg = Registry::getInstance();
        $request = $reg->getRequest();
        $auth = $request->getAuthData();
        $userId = $usermdl->getUserbyLogin($auth['user']);
        $this->userId = (integer) $userId->id;
        
        
    }

    /**
     * function index
     * 
     * @param Request $request
     * @param Response $response
     */
    public function index(Request $request, Response $response)
    {
        $view = new HtmlTemplateView('Page');

        $pages = $this->pages->getAllPage();

        $view->assign('pages', $pages);
        $view->render($request, $response);
    }

    /**
     * function addPage
     *      
     * @param Request $request
     * @param Response $response
     */
    public function addPage(Request $request, Response $response)
    {
        $data = $request->getPost();
        
        if (null !== $data) {
            if (isset($data["submit_add_page"])) {
                $data['fk_user_id'] = $this->userId;
                $this->pages->addPage($data);
                $response->redirect('page/index');
            }
        } else {
            $response->redirect('page/index');
        }
    }

    /**
     * function deletePage
     * 
     * 
     * @param Request $request
     * @param Response $response
     * @param type $pageId
     */
    public function deletePage(Request $request, Response $response, $pageId)
    {
        if (isset($pageId)) {
            $this->pages->deletePage($pageId);
        }

        $response->redirect('page/index');
    }

    /**
     * function editPage
     * 
     * @param Request $request
     * @param Response $response
     * @param type $pageId
     */
    public function editPage(Request $request, Response $response, $pageId)
    {
        $view = new HtmlTemplateView('Page_Edit');
        if (isset($pageId)) {
            $page = $this->pages->getPage($pageId);
            $view->assign('page', $page);
            $view->render($request, $response);
        } else {

            $response->redirect('page/index');
        }
    }

    /**
     * function updatePage
     * 
     * @param Request $request
     * @param Response $response
     */
    public function updatePage(Request $request, Response $response)
    {
        $data = $request->getPost();
        if (null !== $data) {
            if (isset($data["submit_update_page"])) {
                $data['fk_user_id'] = $this->userId;
                $this->pages->updatePage($data);
            }
        }

        $response->redirect('page/index');
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
                case 'role':
                    if (false === filter_var($value, FILTER_VALIDATE_INT, [ 'options' => ['min_range' => 1, 'max_range' => 3]])) {
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
