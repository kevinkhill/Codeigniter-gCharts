<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Legend Properties Object
 *
 * An object containing all the values for the legend which can be
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

class legend extends configOptions
{
    var $position;
    var $alignment;
    var $textStyle;

    public function __construct($options = array()) {

        $this->options = array('position', 'alignment', 'textStyle');

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

    /**
     * Legend Position
     *
     * Position of the legend. Can be one of the following:
     * 'right' - To the right of the chart. Incompatible with the vAxes option.
     * 'top' - Above the chart.
     * 'bottom' - Below the chart.
     * 'in' - Inside the chart, by the top left corner.
     * 'none' - No legend is displayed.
     *
     * @param type $position
     * @return \legend
     */
    public function position($position = 'right')
    {
        $values = array('right', 'top', 'bottom', 'in', 'none');

        if(in_array($position, $values))
        {
            $this->position = $position;
            return $this;
        } else {
            throw new Exception('Invalid position value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

    /**
     * Chart Alignment
     *
     * Alignment of the legend. Can be one of the following:
     * 'start' - Aligned to the start of the area allocated for the legend.
     * 'center' - Centered in the area allocated for the legend.
     * 'end' - Aligned to the end of the area allocated for the legend.
     *
     * Start, center, and end are relative to the style -- vertical or horizontal -- of the legend.
     * For example, in a 'right' legend, 'start' and 'end' are at the top and bottom, respectively;
     * for a 'top' legend, 'start' and 'end' would be at the left and right of the area, respectively.
     *
     * The default value depends on the legend's position. For 'bottom' legends,
     * the default is 'center'; other legends default to 'start'.
     *
     * @param type $alignment
     * @return \legend
     */
    public function alignment($alignment)
    {
        $values = array('start', 'center', 'end');

        if(in_array($alignment, $values))
        {
            $this->alignment = $alignment;
            return $this;
        } else {
            throw new Exception('Invalid alignment value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

    /**
     * Legend Text Style
     *
     * An object that specifies the legend text style.
     *
     * @param textStyle $textStyle
     * @return \legend
     * @throws Exception Invalid textStyle
     */
    public function textStyle(textStyle $textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            throw new Exception('Invalid textStyle, must be (object) type textStyle');
        }

        return $this;
    }

}

/* End of file legend.php */
/* Location: ./gcharts/configs/legend.php */
