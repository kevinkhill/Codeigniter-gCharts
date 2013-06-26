<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Tooltip Properties Object
 *
 * An object containing all the values for the tooltip which can be
 * passed into the chart's options
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

class tooltip extends configOptions
{
    var $showColorCode;
    var $textStyle;
    var $trigger;

    /**
     * Builds the tooltip object when passed an array of configuration options.
     *
     * @param array $options
     * @return \configs\tooltip
     */
    public function __construct($config = array())
    {
        $this->options = array(
            'showColorCode',
            'textStyle',
            'trigger'
        );

        parent::__construct($config);
    }

    /**
     * If true, show colored squares next to the series information in the tooltip.
     * The default is true when focusTarget is set to 'category', otherwise the default is false.
     *
     * @param boolean $showColorCode
     * @return \configs\tooltip
     */
    public function showColorCode($showColorCode)
    {
        if(is_bool($showColorCode))
        {
            $this->showColorCode = $showColorCode;
        } else {
            $this->error('Invalid value for showColorCode, must be type (boolean).');
        }

        return $this;
    }

    /**
     * An object that specifies the tooltip text style.
     *
     * @param textStyle $textStyle
     * @return \configs\tooltip
     */
    public function textStyle($textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            $this->error('Invalid value for textStyle, must be an object type (textStyle).');
        }

        return $this;
    }

    /**
     * The user interaction that causes the tooltip to be displayed:
     * 'focus' - The tooltip will be displayed when the user hovers over an element.
     * 'none' - The tooltip will not be displayed.
     *
     * @param type $trigger
     * @return \configs\tooltip
     */
    public function trigger($trigger)
    {
        $values = array(
            'focus',
            'none'
        );

        if(in_array($trigger, $values))
        {
            $this->trigger = $trigger;
        } else {
            $this->error('Invalid trigger value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

}

/* End of file tooltip.php */
/* Location: ./gcharts/configs/tooltip.php */
