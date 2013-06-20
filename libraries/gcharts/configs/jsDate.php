<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Date Object
 *
 * Used as a PHP wrapper around how javascript creates date objects
 *
 *
 * NOTICE OF LICENSE
 *
 * This file is part of CodeIgniter gCharts.
 * CodeIgniter gCharts is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CodeIgniter gCharts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CodeIgniter gCharts.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://www.gnu.org/licenses/gpl.html GPL-V3
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
