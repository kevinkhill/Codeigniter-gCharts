<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * backgroundColor Object
 *
 * An object containing all the values for the backgroundColor object which can
 * be passed into the chart's options
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
    /**
     * Chart Border Color
     *
     * The color of the chart border, as an HTML color string.
     *
     * @var string Valid HTML color.
     */
    var $stroke = NULL;

    /**
     * Chart Border Width
     *
     * The border width, in pixels.
     *
     * @var int Width in number of pixels.
     */
    var $strokeWidth = NULL;

    /**
     * Chart Color Fill
     *
     * The chart fill color, as an HTML color string.
     *
     * @var type Valid HTML color.
     */
    var $fill = NULL;


    /**
     * Builds the options for the backgroundColor object
     *
     * Pass an associative array with values for the keys
     * [ stroke | strokeWidth | fill ]
     *
     * @param array $options array('stroke' => 'red', 'stokeWidth' => 3, 'fill' => 'blue');
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
     * Sets the chart border color.
     *
     * @example 'red' or '#A2A2A2'
     * @param string Valid HTML color string.
     * @return \backgroundColor
     */
    public function stroke($stroke)
    {
        if(is_string($stroke))
        {
            $this->stroke = $stroke;
        } else {
            $this->error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Sets the chart border width.
     *
     * @example 5
     * @param int Border width, in pixels.
     * @return \backgroundColor
     */
    public function strokeWidth($strokeWidth)
    {
        if(is_int($strokeWidth))
        {
            $this->strokeWidth = $strokeWidth;
        } else {
            $this->formatted_error(__FUNCTION__, 'int');
        }

        return $this;
    }

    /**
     * Sets the chart color fill.
     *
     * @example 'blue' or '#C5C5C5'
     * @param string Valid HTML color string.
     * @return \backgroundColor
     */
    public function fill($fill)
    {
        if(is_string($fill))
        {
            $this->fill = $fill;
        } else {
            $this->formated_error(__FUNCTION__, 'string');
        }

        return $this;
    }

}

/* End of file backgroundColor.php */
/* Location: ./gcharts/configs/backgroundColor.php */
