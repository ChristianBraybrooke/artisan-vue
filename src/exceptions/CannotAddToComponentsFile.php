<?php

namespace ChrisBraybrooke\ArtisanVue\Exceptions;

use Exception;
use ChrisBraybrooke\ArtisanVue\Create;

class CannotAddToComponentsFile extends Exception
{
    /**
     * Can't add the component information to the artisan-vue-components.js file.
     *
     * @param Exception $e
     *
     * @return static
     */
    public static function cantAddToFile($e)
    {
        return new static(
            "Can't add component information to artisan-vue-components.js \n {$e}"
        );
    }
}
