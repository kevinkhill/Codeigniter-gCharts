<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Text Style Properties Object
 *
 * An object containing all the values for the textStyle which can be
 * passed into the chart's options
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

/* End of file textStyle.php */
/* Location: ./gcharts/configs/textStyle.php */
