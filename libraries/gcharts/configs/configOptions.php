<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * configOptions Base Object
 *
 * The base class for the individual configuration objects, providing common
 * functions to the child classes
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

class configOptions
{
    var $output;
    var $options;

    public function toJSON()
    {
        $this->output = array();

        foreach($this->options as $option)
        {
            if(isset($this->$option))
            {
                $this->output[$option] = $this->$option;
            }
        }

        return '"'.get_class($this).'":'.json_encode($this->output);
    }

    public function toArray()
    {
        $this->output = array();

        foreach($this->options as $option)
        {
            if(isset($this->$option))
            {
                $this->output[$option] = $this->$option;
            }
        }

        return array(get_class($this) => $this->output);
    }

    public function values()
    {
        $this->output = array();

        foreach($this->options as $option)
        {
            if(isset($this->$option))
            {
                $this->output[$option] = $this->$option;
            }
        }

        return $this->output;
    }

    public function _valid_int($val)
    {
        if(is_int($val) === TRUE)
        {
            return (int) $val;
        } else if(is_string($val) === TRUE) {
            if(ctype_digit($val) === TRUE)
            {
                return (int) $val;
            }
        } else {
            Gcharts::_set_error(get_class($this), '"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) representing an int');
        }
    }

    public function _valid_int_or_percent($val)
    {
        if(is_int($val) === TRUE)
        {
            return (int) $val;
        } else if(is_string($val) === TRUE) {
            if(ctype_digit($val) === TRUE)
            {
                return (int) $val;
            }

            if($val[strlen($val) - 1] == '%')
            {
                $tmp = str_replace('%', '', $val);

                if(ctype_digit((string) $tmp) === TRUE)
                {
                    return $tmp.'%';
                }
            } else {
                Gcharts::_set_error(get_class($this), '"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
            }
        } else {
            Gcharts::_set_error(get_class($this), '"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
        }
    }

    public function _get_caller() {
        $trace = debug_backtrace();
        $caller = $trace[2];

        return $caller['function'].'()';
    }

}

/* End of file configOptions.php */
/* Location: ./gcharts/configs/configOptions.php */
