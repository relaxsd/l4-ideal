<?php namespace Relaxsd\Ideal;

use Illuminate\Support\Facades\Facade;

class Ideal extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ideal';
    }
}
