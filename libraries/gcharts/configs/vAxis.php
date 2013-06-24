<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Vertical Axis Properties Object
 *
 * An object containing all the values for the axis which can be
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

class vAxis extends Axis
{
    /**
     * Stores all the information about the vertical axis. All options can be
     * set either by passing an array with associative values for option =>
     * value, or by chaining together the functions once an object has been
     * created.
     *
     * @param array $options
     * @return \axis
     */
    public function __construct($options = array())
    {
        return parent::__construct($options);
    }

}

/* End of file vAxis.php */
/* Location: ./gcharts/configs/vAxis.php */
