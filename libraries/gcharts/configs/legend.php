<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Legend Properties Object
 *
 * An object containing all the values for the legend which can be
 * passed into the chart's options.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class legend extends configOptions
{
    var $position;
    var $alignment;
    var $textStyle;

    /**
     * Builds the legend object when passed an array of configuration options.
     *
     * @param array $options
     * @return \configs\tooltip
     */
    public function __construct($config)
    {
        $this->options = array(
            'position',
            'alignment',
            'textStyle'
        );

        parent::__construct($config);
    }

    /**
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
    public function position($position)
    {
        $values = array(
            'right',
            'top',
            'bottom',
            'in',
            'none'
        );

        if(in_array($position, $values))
        {
            $this->position = $position;
            return $this;
        } else {
            $this->error('Invalid position value, must be (string) with a value of '.array_string($values));
        }

        return $this;
    }

    /**
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
        $values = array(
            'start',
            'center',
            'end'
        );

        if(in_array($alignment, $values))
        {
            $this->alignment = $alignment;
            return $this;
        } else {
            $this->error('Invalid alignment value, must be (string) with a value of '.array_string($values));
        }

        return $this;
    }

    /**
     * An object that specifies the legend text style.
     *
     * @param textStyle $textStyle
     * @return \legend
     */
    public function textStyle(textStyle $textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            $this->error('Invalid textStyle, must be (object) type textStyle');
        }

        return $this;
    }

}

/* End of file legend.php */
/* Location: ./gcharts/configs/legend.php */
