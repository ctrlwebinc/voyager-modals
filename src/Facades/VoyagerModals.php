<?php

namespace Ctrlweb\VoyagerModals\Facades;

use Illuminate\Support\Facades\Facade;

class VoyagerModals extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'voyager.modals';
    }
}
