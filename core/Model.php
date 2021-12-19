<?php

namespace core;
use core\QueryBuilder;

abstract class Model 
{

    public $query;

    public function __construct()
    {
        $this->query = new QueryBuilder;
    }


}