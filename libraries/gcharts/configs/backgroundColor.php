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
                } else {
                    $this->error('Ignoring "'.$option.'", not a valid configuration option.');
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
        }

        return $this;
    }

    /**
     * Chart Border Width
     *
     * The border width, in pixels. Accepts any integer or integer as a string
     *
     * @param int $strokeWidth
     * @return \backgroundColor
     */
    public function strokeWidth($strokeWidth)
    {
        if(is_int($strokeWidth))
        {
            $this->strokeWidth = $strokeWidth;
        } else {
            $this->error('Invalid strokeWidth, must be type (int).');
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
        }

        return $this;
    }

}

/* End of file backgroundColor.php */
/* Location: ./gcharts/configs/backgroundColor.php */
