<?php

namespace Lbm\Mvc\Controllers;

use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\HtmlTemplateView;
use Lbm\Mvc\Core\Db;
use \Lbm\Mvc\Models;

class HomeController implements Controller
{

    public $pages = null;
    protected $db;
    protected $username;
    protected $userId;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->pages = new Models\Page($this->db);
    }

    public function index(Request $request, Response $response)
    {
        $view = new HtmlTemplateView('Home');

        if ($page = $this->pages->getPagebySlug('Home/index')) {
            $view->assign('pagecontent', $page);
        }

        $view->render($request, $response);
    }

}
