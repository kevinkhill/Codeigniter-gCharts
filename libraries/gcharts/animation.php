<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class animation extends configOptions
{
    var $easing;
    var $fontName;
    var $duration;

    public function __construct($options = array()) {

        $this->options = array('easing', 'fontName', 'duration');

        if(is_array($options) && count($options) > 1)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    if($option == 'duration')
                    {
                        $this->$option = $this->_valid_int($value);
                    } else {
                        $this->$option = $value;
                    }
                }
            }
        }

        return $this;
    }

    public function easing($easing = 'linear')
    {
        $values = array('linear', 'in', 'out', 'inAndOut');

        if(in_array($easing, $values))
        {
            $this->easing = $easing;
            return $this;
        } else {
            throw new Exception('Invalid easing value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

    public function duration($duration)
    {
        if(is_int($duration) || is_string($duration))
        {
            $this->duration = $this->_valid_int($duration);
        } else {
            $this->duration = 0;
        }

        return $this;
    }

}

?>