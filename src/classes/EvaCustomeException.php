<?php

class EvaCustomeException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // throw custom exception
                throw new EvaException('Custom exception #-> 1 is an invalid parameter', 1001);
                break;

            case self::THROW_DEFAULT:
                // throw default one.
                throw new Exception('Default exception #-> 2 is not allowed as a parameter', 2001);
                break;

            default: 
                // No exception, object will be created.
                $this->var = $avalue;
                break;
        }
    }
}


?>