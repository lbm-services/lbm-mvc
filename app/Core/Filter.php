<?php

namespace Lbm\Mvc\Core;

use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\Response;

interface Filter
{

    public function execute(Request $request, Response $response);
}
