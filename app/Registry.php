<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Response;
use Lbm\Mvc\Request;

class Registry
{

    protected static $instance = null;
    protected $values = array();

    const KEY_REQUEST = 'request';
    const KEY_RESPONSE = 'response';

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }

    protected function __construct()
    {
        
    }

    private function __clone()
    {
        
    }

    protected function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    protected function get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    public function setRequest(Request $request)
    {
        $this->set(self::KEY_REQUEST, $request);
    }

    public function setResponse(Response $response)
    {
        $this->set(self::KEY_RESPONSE, $response);
    }

    public function getRequest()
    {
        return $this->get(self::KEY_REQUEST);
    }

    public function getResponse()
    {
        return $this->get(self::KEY_RESPONSE);
    }

}
