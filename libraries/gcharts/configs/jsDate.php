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

class jsDate
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
    )
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
        $this->millisecond = $millisecond;

        return $this;
    }

    public function toString()
    {
        if($this->hour !== NULL && valid_int($this->hour))
        {
            if($this->minute !== NULL && valid_int($this->minute))
            {
                if($this->second !== NULL && valid_int($this->second))
                {
                    if($this->millisecond !== NULL && valid_int($this->millisecond))
                    {
                        $this->format = 'Date(%d, %d, %d, %d, %d, %d, %d)';
                        $this->output = sprintf($this->format, $this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second, $this->millisecond);
                    } else {
                        $this->format = 'Date(%d, %d, %d, %d, %d, %d)';
                        $this->output = sprintf($this->format, $this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second);
                    }
                } else {
                    $this->format = 'Date(%d, %d, %d, %d, %d)';
                    $this->output = sprintf($this->format, $this->year, $this->month, $this->day, $this->hour, $this->minute);
                }
            } else {
                $this->format = 'Date(%d, %d, %d, %d)';
                $this->output = sprintf($this->format, $this->year, $this->month, $this->day, $this->hour);
            }
        } else {
            $this->format = 'Date(%d, %d, %d)';
            $this->output = sprintf($this->format, $this->year, $this->month, $this->day);
        }

        return $this->output;
    }
}

/* End of file Date.php */
/* Location: ./gcharts/configs/Date.php */
