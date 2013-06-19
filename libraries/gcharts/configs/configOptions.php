<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * configOptions Base Object
 *
 * The base class for the individual configuration objects, providing common
 * functions to the child classes
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
            throw new Exception('"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) representing an int');
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
                throw new Exception('"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
            }
        } else {
            throw new Exception('"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
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
