<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Response;
use Lbm\Mvc\Request;
use Lbm\Mvc\CommandResolver;
use Lbm\Mvc\Filter;
use Lbm\Mvc\FilterChain;
use Lbm\Mvc\Filters\HttpAuthFilter;


class FrontController
{

    private $resolver;
    private $preFilters;
    private $postFilters;

    public function __construct(CommandResolver $resolver)
    {
        $this->resolver = $resolver;
        $this->preFilters = new FilterChain();
        $this->postFilters = new FilterChain();
    }

    public function addPreFilter(Filter $filter)
    {
        $this->preFilters->addFilter($filter);
    }

    public function addPostFilter(Filter $filter)
    {
        $this->postFilters->addFilter($filter);
    }

    public function handleRequest(Request $request, Response $response)
    {
        $reg = Registry::getInstance();
        $reg->setRequest($request);
        $reg->setResponse($response);

        $command = $this->resolver->getCommand($request);
        $action = $this->resolver->getAction();
        $params = $this->resolver->getParams();
        array_unshift($params, $response);
        array_unshift($params, $request);
        
        $controller = new $command;

        if (isset($controller) && is_object($controller)) {
            $reflect = new \ReflectionClass(get_class($controller));
            $controllerName = $reflect->getShortName();
            
            switch ($controllerName) {
                case 'AdminController':
                    $authFilter = new HttpAuthFilter(1);
                    $this->addPreFilter($authFilter);
                    break;
                case 'UserController' :
                    $authFilter = new HttpAuthFilter(2);
                    $this->addPreFilter($authFilter);
                    break;
                default:
                    break;
            }
        }
        $this->preFilters->processFilters($request, $response);

        if (method_exists($controller, $action)) {
            if (!empty($params)) {
                call_user_func_array(array($controller, $action), $params);
            } else {
                $controller->{$action}($request, $response);
            }
        } else {

            $controller->index($request, $response);
        }
        $this->postFilters->processFilters($request, $response);

        $response->flush();
    }

}
