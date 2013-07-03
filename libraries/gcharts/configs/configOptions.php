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
 * You should have received a copy of the MIT License along with this project.
 * If not, see <http://opensource.org/licenses/MIT>.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class configOptions
{
    var $output;
    var $options;

    public function __construct($config)
    {
        if(is_array($config) && count($config) > 0)
        {
            foreach($config as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    $this->$option($value);
                } else {
                    $this->error('Ignoring "'.$option.'", not a valid configuration option.');
                }
            }
        }

        return $this;
    }

    /**
     * Adds the error message to the error log in the gcharts master object.
     *
     * @param string $msg
     */
    public function error($msg)
    {
        Gcharts::_set_error(get_class($this), $msg);
    }

    /**
     * Adds the error message to the error log in the gcharts master object.
     *
     * @param string $msg
     */
    public function formated_error($val, $type, $extra = '')
    {
        $class = get_class($this);

        if($extra != '')
        {
            $msg = sprintf('Invalid value for "%s", must be type (%s) ', $val, $type, $extra);
            Gcharts::_set_error($class, $msg);
        } else {
            $msg = sprintf('Invalid value for "%s", must be type (%s).', $val, $type);
            Gcharts::_set_error($class, $msg);
        }
    }

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
                $this->error('"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
            }
        } else {
            $this->error('"'.$val.'" is an invalid value for '.$this->_get_caller().', must be (int) or (string) as percent [ 100 | "50%" ]');
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
