<?php

namespace Lbm\Mvc\Viewhelpers;

use Lbm\Mvc\Registry;
use Lbm\Mvc\Request;
use Lbm\Mvc\ViewHelper;

class AuthUsernameViewHelper implements ViewHelper
{

    public function execute($args = array())
    {
        $request = Registry::getInstance()->getRequest();
        $authData = $request->getAuthData();
        return $authData['user'];
    }

}
