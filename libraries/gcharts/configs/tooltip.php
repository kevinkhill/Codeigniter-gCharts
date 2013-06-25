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

    public function __construct($options = array()) {

        $this->options = array(
            'showColorCode',
            'textStyle',
            'trigger'
        );

        if(is_array($options) && count($options) > 0)
        {
            foreach($options as $option => $value)
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
     * Tooltip Show Color Code
     *
     * If true, show colored squares next to the series information in the tooltip.
     * The default is true when focusTarget is set to 'category', otherwise the default is false.
     *
     * @param boolean $showColorCode
     * @return \tooltip
     * @throws Exception Invalid showColorCode
     */
    public function showColorCode($showColorCode = FALSE)
    {
        if(is_bool($showColorCode))
        {
            $this->showColorCode = $showColorCode;
            return $this;
        } else {
            Gcharts::_set_error(get_class($this), 'Invalid showColorCode value, must be (boolean) [ TRUE | FALSE ]');
        }

        return $this;
    }

    /**
     * Tooltip Text Style
     *
     * An object that specifies the tooltip text style.
     *
     * @param textStyle $textStyle
     * @return \tooltip
     * @throws Exception Invalid textStyle
     */
    public function textStyle(textStyle $textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            Gcharts::_set_error(get_class($this), 'Invalid textStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * Tooltip Trigger
     *
     * The user interaction that causes the tooltip to be displayed:
     * 'focus' - The tooltip will be displayed when the user hovers over an element.
     * 'none' - The tooltip will not be displayed.
     *
     * @param type $trigger
     * @return \tooltip
     * @throws Exception Invalid trigger value
     */
    public function trigger($trigger)
    {
        $values = array('focus', 'none');

        if(in_array($trigger, $values))
        {
            $this->trigger = $trigger;
            return $this;
        } else {
            Gcharts::_set_error(get_class($this), 'Invalid trigger value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

}

/* End of file tooltip.php */
/* Location: ./gcharts/configs/tooltip.php */
