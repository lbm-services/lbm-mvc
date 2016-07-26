<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Request;
use Lbm\Mvc\Response;

interface Filter
{

    public function execute(Request $request, Response $response);
}
