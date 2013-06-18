<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Date Object
 *
 * Used as a PHP wrapper around how javascript creates date objects
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

class date //new Date(2008, 10, 14)
{
    var $output;

    public function __construct(
        $year,
        $month,
        $day,
        $hour = NULL,
        $minute = NULL,
        $second = NULL,
        $millisecond = NULL
    ) {
        $this->output = date_parse(strtotime($dateTimeString));
        return $this;
    }

    public function __toString()
    {
        
    }
}

/* End of file Date.php */
/* Location: ./gcharts/configs/Date.php */
