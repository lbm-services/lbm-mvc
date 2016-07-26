<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Response;


class HttpResponse implements Response
{

    private $headers = array();
    private $body = null;
    private $status = null;

    public function write($data)
    {
        $this->body .= $data;
    }

    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function flush()
    {
        if ($this->status !== null) {
            header("HTTP/1.0 {$this->status}");
        }
        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }
        print $this->body;
        $this->headers = array();
        $this->data = null;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
    
    public function redirect($action)
    {
     header('location: ' . URL . $action);   
    }

}
