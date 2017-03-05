<?php

namespace Lbm\Mvc\Core;

interface Response
{

    public function write($data);

    public function addHeader($name, $value);

    public function setStatus($status);

    public function flush();

    public function getBody();

    public function setBody($body);
    
    public function redirect($url);
}
