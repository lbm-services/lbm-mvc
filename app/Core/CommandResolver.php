<?php

namespace Lbm\Mvc\Core;

use Lbm\Mvc\Core\Request;

class CommandResolver
{

    private $path;
    private $defaultCommand;
    private $action;
    private $params;

    public function __construct($path, $defaultCommand)
    {
        $this->path = $path;
        $this->defaultCommand = $defaultCommand;
    }

    public function getCommand(Request $request)
    {
        if ($request->issetParameter('cmd')) {
            $cmdName = $request->getParameter('cmd');
            $command = $this->loadCommand($cmdName);
            return $command;
        }
        $command = $this->loadCommand($this->defaultCommand);
        return $command;
    }

    protected function loadCommand($cmdName)
    {

        $url = filter_var($cmdName, FILTER_SANITIZE_URL);
        $url = explode('/', $cmdName);

        $controller = isset($url[0]) ? ucfirst($url[0]) : null;
        $this->action = isset($url[1]) ? $url[1] : null;
        unset($url[0], $url[1]);
        $this->params = array_values($url);

        $class = "Lbm\Mvc\Controllers\\{$controller}Controller";
        $file = __DIR__ . "/../Controllers/{$controller}Controller.php";
        if (!file_exists($file)) {
            return false;
        }
        if (!class_exists($class)) {
            return false;
        }

        return $class;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }

}
