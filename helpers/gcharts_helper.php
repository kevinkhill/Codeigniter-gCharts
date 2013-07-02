<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Takes an array of values and ouputs them as a string between
 * brackets and separated by a pipe.
 *
 * @param array $defaultValues
 * @return string
 */
function array_string($defaultValues)
{
    $tmp = '[ ';

    foreach($defaultValues as $k => $v)
    {
        $tmp .= $v . ' | ';
    }

    return substr_replace($tmp, "", -2) . ']';
}

/**
 * Simple test to see if array is multi-dimensional.
 *
 * @param array $arr
 * @return boolean
 */
function array_is_multi($arr)
{
    $rv = array_filter($arr, 'is_array');

    if(count($rv) > 0)
    {
        return TRUE;
    } else {
        return FALSE;
    }
}