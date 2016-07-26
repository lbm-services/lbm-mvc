<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Request;
use Lbm\Mvc\Response;

interface TemplateView
{

    public function assign($name, $value);

    public function render(Request $request, Response $response);
}
