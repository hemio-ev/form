<?php

namespace hemio\form\Trait_;

trait MaintainsFilters {

    /**
     *
     * @var array[callable]
     */
    private $filters = [];

    /**
     * 
     */
    public function addFilter(callable $filter) {
        $this->filters[] = $filter;
    }

    /**
     * 
     */
    public function applyFilters(&$var) {
        foreach ($this->filters as $filter) {
            $var = $filter($var);
        }
    }

    /**
     * 
     */
    public function getFiltered($var) {
        foreach ($this->filters as $filter) {
            $var = $filter($var);
        }

        return $var;
    }

}
