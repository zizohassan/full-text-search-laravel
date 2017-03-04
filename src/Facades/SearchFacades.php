<?php

namespace AdvanceSearch\AdvanceSearchProvider\Facades;

use Illuminate\Support\Facades\Facade;

class SearchFacades extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Search';
    }

}