<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Takes an array of values and ouputs them as a string between
 * brackets and separated by a pipe.
 *
 * @param array Array of default values
 * @return string Converted array to string.
 */
function array_string($defaultValues)
{
    $tmp = '[ ';

    natcasesort($defaultValues);
    
    foreach($defaultValues as $k => $v)
    {
        $tmp .= $v . ' | ';
    }

    return substr_replace($tmp, "", -2) . ']';
}

/**
 * Simple test to see if array is multi-dimensional.
 *
 * @param array Array of values.
 * @return boolean Returns TRUE is first element in the array is an array,
 * otherwise FALSE.
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
/**
 * Tests input for valid int or percent
 *
 * Valid int = 5 or 12
 * Valid percent = 32% or 100%
 *
 * @param mixed Integer or string.
 * @return boolean Returns TRUE if valid in or percent, otherwise FALSE.
 */
function is_int_or_percent($val)
{
    if(is_int($val) === TRUE)
    {
        return TRUE;
    } else if(is_string($val) === TRUE)
    {
        if(ctype_digit($val) === TRUE)
        {
            return TRUE;
        } else {
            if($val[strlen($val) - 1] == '%')
            {
                $tmp = str_replace('%', '', $val);

                if(ctype_digit((string) $tmp) === TRUE)
                {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }
    } else {
        return FALSE;
    }
}