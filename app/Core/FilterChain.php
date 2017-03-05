<?php

namespace Lbm\Mvc\Core;

use Lbm\Mvc\Core\Request;
use Lbm\Mvc\Core\Response;
use Lbm\Mvc\Core\Filter;


class FilterChain
{

    private $filters = array();

    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    public function processFilters(Request $request, Response $response)
    {
        foreach ($this->filters as $filter) {
            $filter->execute($request, $response);
        }
    }

}
