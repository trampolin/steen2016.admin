<?php

//namespace Core\Helper;

/**
 * Array helper class
 *
 * @package         Evaluator\Core
 * @subpackage      Helper
 * @author          Sascha Scherhak <scherhak@pferdewetten.de>
 * @copyright       2014, Pferdewetten AG
 * @version         1.0
 */
class Arrays
{

    /**
     * Get a specific element out of an array. If array index not exists - it returns FALSE
     *
     * @example Arrays::element('NAME', TARGET_ARRAY);
     *
     * @param $sIndex
     * @param $aArray
     *
     * @return bool
     */
    public static function element($sIndex, $aArray)
    {
        $mElement = !empty($aArray[$sIndex]) ? $aArray[$sIndex] : false;
        if ($mElement) {
            return $mElement;
        }
        return false;
    }

    /**
     * With element_chain it's possible to get specific array data from a mutliple array
     * - Chaining elements with element1.element2.element3...
     * - If a element isn't found - method returns FALSE
     *
     * @example Arrays::element_chain('DEEP.OF.ARRAY', TARGET_ARRAY);
     *
     * @param $sIndexChain
     * @param $aArray
     *
     * @return bool
     */
    public static function element_chain($sIndexChain, $aArray)
    {
        $aIndexChain = explode('.', $sIndexChain);
        foreach ($aIndexChain AS $sElement) {
            $aArray = Arrays::element($sElement, $aArray);
            if (!$aArray) {
                return false;
            }
        }
        return $aArray;
    }

    /**
     * Get a specific element out of an array by (int) index. If array index not exists - it returns FALSE
     * As default, index 0 will be called
     *
     * @example Arrays::index((INT)INDEX, TARGET_ARRAY);
     *
     * @param $iIndex
     * @param $aArray
     *
     * @return bool
     */
    public static function index($iIndex, $aArray)
    {
        $mElement = $aArray[$iIndex];
        if (!empty($mElement)) {
            return $mElement;
        }
        return false;
    }

    /**
     * Add a new key / value pair into a existing array
     * - It will also override existing key / value pairs
     *
     * @example Arrays::add('NAME/INDEX', 'VALUE', TARGET_ARRAY);
     *
     * @param $mIndex
     * @param $mValue
     * @param $aArray
     *
     * @return mixed
     */
    public static function add($mIndex, $mValue, $aArray)
    {
        $aArray[$mIndex] = $mValue;
        return $aArray;
    }

    /**
     * Synonym for add
     *
     * @example Arrays::update('NAME', TARGET_ARRAY);
     *
     * @param $mIndex
     * @param $mValue
     * @param $aArray
     *
     * @return mixed
     */
    public static function update($mIndex, $mValue, $aArray)
    {
        return self::add($mIndex, $mValue, $aArray);
    }

    /**
     * Erease one or more elements out of an array
     *
     * @example Arrays::erase('INDEX', TARGET_ARRAY);
     * @example Arrays::erase(['INDEX1', 'INDEX2' ...], TARGET_ARRAY);
     *
     * @param array $mIndex
     * @param       $aArray
     *
     * @return mixed
     */
    public static function erase($mIndex, $aArray)
    {
        if (is_array($mIndex)) {
            foreach ($mIndex AS $mValue) {
                unset($aArray[$mValue]);
            }
        } else {
            unset($aArray[$mIndex]);
        }
        return $aArray;
    }
}