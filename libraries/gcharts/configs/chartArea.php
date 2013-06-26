<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Chart Area Properties Object
 *
 * An object containing all the values for the chartArea which can be
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

class chartArea extends configOptions
{
    var $left;
    var $top;
    var $width;
    var $height;

    /**
     * Builds the chartArea object when passed an array of configuration options.
     *
     * @param array $config
     * @return \configs\chartArea
     */
    public function __construct($config = array())
    {
        $this->options = array(
            'left',
            'top',
            'width',
            'height'
        );

        parent::__construct($config);
    }

    public function left($left)
    {
        if(is_int($left) || is_string($left))
        {
            $this->left = $this->_valid_int_or_percent($left);
        } else {
            $this->left = 'auto';
        }

        return $this;
    }

    public function top($top)
    {
        if(is_int($top) || is_string($top))
        {
            $this->top = $this->_valid_int_or_percent($top);
        } else {
            $this->top = 'auto';
        }

        return $this;
    }

    public function width($width)
    {
        if(is_int($width) || is_string($width))
        {
            $this->width = $this->_valid_int_or_percent($width);
        } else {
            $this->width = 'auto';
        }

        return $this;
    }

    public function height($height)
    {
        if(is_int($height) || is_string($height))
        {
            $this->height = $this->_valid_int_or_percent($height);
        } else {
            $this->height = 'auto';
        }

        return $this;
    }

}

/* End of file chartArea.php */
/* Location: ./gcharts/configs/chartArea.php */
