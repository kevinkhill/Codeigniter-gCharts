<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Background Color Properties Object
 *
 * An object containing all the values for the backgroundColor which can be
 * passed into the chart's options
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

class backgroundColor extends configOptions
{
    var $stroke;
    var $strokeWidth;
    var $fill;

    /**
     * Builds the options for the backgrounColor object
     *
     * Pass an associative array with values for the keys
     * [ stroke | strokeWidth | fill ]
     *
     * @param array $options
     * @return \backgroundColor
     */
    public function __construct($options = array()) {

        $this->options = array(
            'stroke',
            'strokeWidth',
            'fill'
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

    /**
     * Chart Border Color
     *
     * The color of the chart border, as an HTML color string.
     * Acceptable values [ 'red' | '#A2A2A2' ]
     *
     * @param string $stroke
     * @return \backgroundColor
     */
    public function stroke($stroke)
    {
        if(is_string($stroke))
        {
            $this->stroke = $stroke;
        } else {
            $this->stroke = '#666';
        }

        return $this;
    }

    /**
     * Chart Border Width
     *
     * The border width, in pixels. Accepts any integer or integer as a string
     *
     * @param mixed $strokeWidth
     * @return \backgroundColor
     */
    public function strokeWidth($strokeWidth)
    {
        if(is_int($strokeWidth) || is_string($strokeWidth))
        {
            $this->strokeWidth = $this->_valid_int($strokeWidth);
        } else {
            $this->strokeWidth = 0;
        }

        return $this;
    }

    /**
     * Chart Color Fill
     *
     * The chart fill color, as an HTML color string.
     * Acceptable values [ 'blue' | '#C5C5C5' ]
     *
     * @param string HTML color string
     * @return \backgroundColor
     */
    public function fill($fill)
    {
        if(is_string($fill))
        {
            $this->fill = $fill;
        } else {
            $this->fill = 'white';
        }

        return $this;
    }

}

/* End of file backgroundColor.php */
/* Location: ./gcharts/configs/backgroundColor.php */
