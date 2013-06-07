<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class textStyle extends configOptions
{
    var $color;
    var $fontName;
    var $fontSize;

    public function __construct($options = array()) {

        $this->options = array('color', 'fontName', 'fontSize');

        if(is_array($options) && count($options) > 1)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    if($option == 'fontSize')
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

    public function color($color)
    {
        if(is_string($color))
        {
            $this->color = $color;
        } else {
            $this->color = 'black';
        }

        return $this;
    }

    public function fontName($fontName)
    {
        if(is_string($fontName))
        {
            $this->fontName = $fontName;
        } else {
            $this->fontName = 'Arial';
        }

        return $this;
    }

    public function fontSize($fontSize)
    {
        if(is_int($fontSize) || is_string($fontSize))
        {
            $this->fontSize = $this->_valid_int($fontSize);
        } else {
            $this->fontSize = 12;
        }

        return $this;
    }

}

?>