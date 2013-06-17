<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description Object
 *
 * Holds all the data for charts
 *
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0
 * which is included in the LICENSE file
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, Kevin Hill
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://http://www.apache.org/licenses/LICENSE-2.0.html Apache-V2
 *
 */

class description
{
    var $type = NULL;
    var $label = NULL;
    var $id = NULL;
    var $role = NULL;
    var $pattern = NULL;

    public function __construct($type, $label = '', $id = '', $role = '', $pattern = '')
    {
        $values = array(
            'string',
            'number',
            'boolean',
            'date',
            'datetime',
            'timeofday'
        );

        if(is_array($options) && count($options) > 1)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    $this->$option = $this->_valid_int_or_percent($value);
                }
            }
        }

        return $this;
    }

}

/* End of file description.php */
/* Location: ./gcharts/configs/description.php */
