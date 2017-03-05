<?php

namespace Lbm\Mvc\Controllers;

use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Request;

interface Controller
{

    public function index(Request $request, Response $response);
}
