<?php

namespace Lbm\Mvc\Core;

use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\TemplateView;

class HtmlTemplateView implements TemplateView
{

    private $template;
    private $vars = array();
    private $helpers = array();

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function assign($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function render(Request $request, Response $response)
    {
        ob_start();
        $filename = "app/Views/{$this->template}.php";
        include_once $filename;
        $data = ob_get_clean();
        $response->write($data);
    }

    public function __get($property)
    {
        if (isset($this->vars[$property])) {
            return $this->vars[$property];
        }
        return null;
    }

    public function __call($methodName, $args)
    {
        $helper = $this->loadViewHelper($methodName);
        $val = $helper->execute($args);
        return $val;
    }

    protected function loadViewHelper($helper)
    {
        $helperName = ucfirst($helper);
        if (!isset($this->helpers[$helper])) {
            $className = "Lbm\Mvc\Viewhelpers\\{$helperName}ViewHelper";
            $fileName = "app/Viewhelpers/{$helperName}ViewHelper.php";
            if (!file_exists($fileName)) {
                return false;
            }
            if (!class_exists($className)) {
                return false;
            }
            $this->helpers[$helper] = new $className();
        }
        return $this->helpers[$helper];
    }

}
