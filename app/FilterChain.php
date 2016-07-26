<?php

namespace Lbm\Mvc;

use Lbm\Mvc\Request;
use Lbm\Mvc\Response;
use Lbm\Mvc\Filter;


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
