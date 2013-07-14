<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Text Style Properties Object
 *
 * An object containing all the values for the textStyle which can be
 * passed into the chart's options.
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

    /**
     * Builds the textStyle object when passed an array of configuration options.
     *
     * @param array $config
     * @return \configs\tooltip
     */
    public function __construct($config = array())
    {
        $this->options = array(
            'color',
            'fontName',
            'fontSize'
        );

        parent::__construct($config);
    }

    /**
     * Assign a color for the text element that this textStyle will be applied
     * to in the format of a valid HTML color string, for example:
     * red OR #004411
     *
     * @param string $color
     * @return \configs\textStyle
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
     * @param string $fontName
     * @return \configs\textStyle
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
     * @param int $fontSize
     * @return \configs\textStyle
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
