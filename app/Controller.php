<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Response;
use Lbm\Mvc\Request;

interface Controller
{

    public function index(Request $request, Response $response);
}
