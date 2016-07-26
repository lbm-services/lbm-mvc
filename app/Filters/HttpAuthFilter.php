<?php

namespace Lbm\Mvc\Filters;

use Lbm\Mvc\Filter as Filter;
use Lbm\Mvc;
use Lbm\Mvc\Request;
use Lbm\Mvc\Response;
use Lbm\Mvc\Models;
use Lbm\Mvc\Controllers;


class HttpAuthFilter implements Filter
{

    private $level;
    protected $db;
    protected $users;

    public function __construct($level)
    {
        $this->level = $level;
        $this->db = Mvc\DB::getInstance();
        $this->users = new Models\User($this->db);
    }

    public function execute(Request $request, Response $response)
    {
        $authData = $request->getAuthData();
        if ($authData === null) {
            $this->sendAuthRequest($response);
        }
        $username = $authData['user'];
        $password = $authData['password'];

        $userdata = $this->users->getUserbyLogin($username);

        // verify user registration, password, roleId
        if (empty($userdata) || !password_verify($password, $userdata->pass) || (integer) $userdata->fk_role_id !== $this->level) {
            $this->sendAuthRequest($response);
        }
    }

    private function sendAuthRequest(Response $response)
    {
        $response->setStatus('401 Unauthorized');
        $response->addHeader('WWW-Authenticate', 'Basic realm="OV CaseStudy"');
        $response->setBody('<h1>401 Unauthorized</h1><p>You must be authorized to access this resource.</p>');
        $response->flush();
        exit();
    }

  

}
