<?php

namespace Towoju5\EasyaccessApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Towoju5\EasyaccessApi\Skeleton\SkeletonClass
 */
class EasyaccessApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'easyaccess-api';
    }
}
