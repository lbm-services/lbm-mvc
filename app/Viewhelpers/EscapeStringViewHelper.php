<?php

namespace Lbm\Mvc\Viewhelpers;

use Lbm\Mvc\Core\Registry;
use Lbm\Mvc\Core\Request;

class EscapeStringViewHelper implements ViewHelper
{

    public function execute($args)
    {
        if (is_array($args) && is_string($args[0])) {
            return trim(htmlspecialchars(strip_tags($args[0]), ENT_QUOTES, 'UTF-8'));

        }
    }

}
