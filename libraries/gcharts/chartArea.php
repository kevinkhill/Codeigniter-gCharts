<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chartArea extends configOptions
{
    var $left;
    var $top;
    var $width;
    var $height;

    public function __construct($options = array()) {

        $this->options = array('left', 'top', 'width', 'height');

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

?>