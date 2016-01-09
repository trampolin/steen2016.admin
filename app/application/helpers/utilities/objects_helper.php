<?php

/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 04.05.15
 * Time: 15:23
 */
class Objects
{
    /**
     * Get a specific property out of an object. If property not exists - it returns FALSE
     *
     * @example Objects::property('NAME', TARGET_ARRAY);
     *
     * @param $sProperty
     * @param $oObject
     *
     * @return bool
     */
    public static function property($sProperty, $oObject)
    {
        // first check if oObject is really an object
        if(is_object($oObject))
        {
            if(property_exists($oObject, $sProperty)) {
                return $oObject->{$sProperty};
            }
        }
        return false;
    }

    /**
     * Connect object properties by chaining it like a.b.c...
     * @param $sPropertyChain
     * @param $oObject
     * @return bool
     */
    public static function property_chain($sPropertyChain, $oObject)
    {
        $sPropertyChain = explode('.', $sPropertyChain);
        foreach ($sPropertyChain AS $sElement) {
            $oObject = Objects::property($sElement, $oObject);
            if (!$oObject) {
                return false;
            }
        }
        return $oObject;
    }
}