<?php

namespace ChrisBraybrooke\ArtisanVue\Exceptions;

use Exception;
use ChrisBraybrooke\ArtisanVue\Create;

class FileAlreadyExists extends Exception
{
    /**
     * File of given name already exists at path.
     *
     * @param string $name
     *
     * @return static
     */
    public static function fileExists($name)
    {
        return new static(
            "File {$name} already exists."
        );
    }
}
