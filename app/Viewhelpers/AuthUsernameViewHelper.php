<?php

namespace Lbm\Mvc\Viewhelpers;

use Lbm\Mvc\Core\Registry;
use Lbm\Mvc\Core\Request;

class AuthUsernameViewHelper implements ViewHelper
{

    public function execute($args = array())
    {
        $request = Registry::getInstance()->getRequest();
        $authData = $request->getAuthData();
        return $authData['user'];
    }

}
