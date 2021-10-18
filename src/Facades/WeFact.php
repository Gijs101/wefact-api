<?php

namespace Media101\WeFactApi\Facades;

use Illuminate\Support\Facades\Facade;

/*
 * @see Media101\WeFactApi\WeFact
 * @see Media101\WeFactApi\WeFact
 */

class WeFact extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return config('wefact.type');
    }
}