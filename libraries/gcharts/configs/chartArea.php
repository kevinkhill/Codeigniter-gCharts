<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Chart Area Properties Object
 *
 * An object containing all the values for the chartArea which can be
 * passed into the chart's options
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

class chartArea extends configOptions
{
    var $left;
    var $top;
    var $width;
    var $height;

    public function __construct($options = array()) {

        $this->options = array(
            'left',
            'top',
            'width',
            'height'
        );

        if(is_array($options) && count($options) > 0)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    $this->$option($value);
                }
            }
        }

        return $this;
    }

    public function left($left)
    {
        if(is_int($left) || is_string($left))
        {
            $this->left = $this->_valid_int_or_percent($left);
        } else {
            $this->left = 'auto';
        }

        return $this;
    }

    public function top($top)
    {
        if(is_int($top) || is_string($top))
        {
            $this->top = $this->_valid_int_or_percent($top);
        } else {
            $this->top = 'auto';
        }

        return $this;
    }

    public function width($width)
    {
        if(is_int($width) || is_string($width))
        {
            $this->width = $this->_valid_int_or_percent($width);
        } else {
            $this->width = 'auto';
        }

        return $this;
    }

    public function height($height)
    {
        if(is_int($height) || is_string($height))
        {
            $this->height = $this->_valid_int_or_percent($height);
        } else {
            $this->height = 'auto';
        }

        return $this;
    }

}

/* End of file chartArea.php */
/* Location: ./gcharts/configs/chartArea.php */
