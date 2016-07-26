<?php

namespace Lbm\Mvc\Controllers;

use Lbm\Mvc;
use Lbm\Mvc\Response;
use Lbm\Mvc\Request;
use Lbm\Mvc\HtmlTemplateView;
use \Lbm\Mvc\Models;
use Lbm\Mvc\Controller as Controller;

class HomeController implements Controller
{

    public $pages = null;
    protected $db;
    protected $username;
    protected $userId;

    public function __construct()
    {
        $this->db = Mvc\Db::getInstance();
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
