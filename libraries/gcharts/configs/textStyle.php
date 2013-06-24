<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Text Style Properties Object
 *
 * An object containing all the values for the textStyle which can be
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

class textStyle extends configOptions
{
    var $color;
    var $fontName;
    var $fontSize;

    public function __construct($options = array()) {

        $this->options = array(
            'color',
            'fontName',
            'fontSize'
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
     * Assign a color for the text element that this textStyle will be applied to
     * in the format of a valid HTML color string, for example: colors:['red','#004411'].
     *
     * @param string $color
     * @return \textStyle
     */
    public function color($color)
    {
        if(is_string($color))
        {
            $this->color = $color;
        }

        return $this;
    }

    /**
     * Assigns a font to the textStyle object, must be a valid font name
     *
     * @param sting $fontName
     * @return \textStyle
     */
    public function fontName($fontName)
    {
        if(is_string($fontName))
        {
            $this->fontName = $fontName;
        }

        return $this;
    }

    /**
     * Assigns a font size to the textStyle, must be a valid int or a string
     * representing an int.
     *
     * @param mixed $fontSize
     * @return \textStyle
     */
    public function fontSize($fontSize)
    {
        if(is_int($fontSize))
        {
            $this->fontSize = $fontSize;
        } else {
            $this->error('Invalid fontSize, must be type (int).');
        }

        return $this;
    }

}

/* End of file textStyle.php */
/* Location: ./gcharts/configs/textStyle.php */
