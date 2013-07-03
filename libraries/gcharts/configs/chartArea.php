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

//@TODO: Add in documentation for vars and functions.
class chartArea extends configOptions
{
    var $left = NULL;
    var $top = NULL;
    var $width = NULL;
    var $height = NULL;

    /**
     * Builds the chartArea object when passed an array of configuration options.
     *
     * @param array $config
     * @return \chartArea
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
        if(valid_int_or_percent($left))
        {
            $this->left = $left;
        } else {
            $this->type_error(__FUNCTION__, 'int | string', 'representing a percent.');
        }

        return $this;
    }

    public function top($top)
    {
        if(valid_int_or_percent($top))
        {
            $this->top = $top;
        } else {
            $this->type_error(__FUNCTION__, 'int | string', 'representing a percent.');
        }

        return $this;
    }

    public function width($width)
    {
        if(valid_int_or_percent($width))
        {
            $this->width = $width;
        } else {
            $this->type_error(__FUNCTION__, 'int | string', 'representing a percent.');
        }

        return $this;
    }

    public function height($height)
    {
        if(valid_int_or_percent($height))
        {
            $this->height = $height;
        } else {
            $this->type_error(__FUNCTION__, 'int | string', 'representing a percent.');
        }

        return $this;
    }

}

/* End of file chartArea.php */
/* Location: ./gcharts/configs/chartArea.php */
