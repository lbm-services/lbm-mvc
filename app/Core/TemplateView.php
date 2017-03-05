<?php

namespace Lbm\Mvc\Core;

use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\Response;

interface TemplateView
{

    public function assign($name, $value);

    public function render(Request $request, Response $response);
}
