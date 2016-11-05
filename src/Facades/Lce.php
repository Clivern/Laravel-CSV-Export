<?php

namespace Clivern\Lce\Facades;

use Illuminate\Support\Facades\Facade;

class Lce extends Facade {

    /**
     * Return facade accessor
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lce';
    }
}