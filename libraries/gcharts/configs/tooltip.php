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
 * This file is part of CodeIgniter gCharts.
 * CodeIgniter gCharts is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CodeIgniter gCharts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CodeIgniter gCharts.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://www.gnu.org/licenses/gpl.html GPL-V3
 *
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
