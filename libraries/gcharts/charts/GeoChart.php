<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * GeoChart Class
 *
 * A Geochart is a map of a country, a continent, or a region with two modes:
 * - The region mode colorizes whole regions, such as countries, provinces,
 *   or states.
 * - The marker mode marks designated regions using bubbles that are scaled
 *   according to a value that you specify.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class GeoChart extends Chart
{
    public function __construct($chartLabel)
    {
        parent::__construct($chartLabel);

        $this->defaults = array_merge($this->defaults, array(
            'datalessRegionColor',
            'displayMode',
            'enableRegionInteractivity',
            'keepAspectRatio',
            'region',
            'magnifyingGlass',
            'markerOpacity',
            'resolution',
            'sizeAxis'
        ));
    }

    public function datalessRegionColor()
    {

    }

    public function displayMode()
    {

    }

    public function enableRegionInteractivity()
    {

    }

    public function keepAspectRatio()
    {

    }

    public function region()
    {

    }

    public function magnifyingGlass()
    {

    }

    public function markerOpacity()
    {

    }

    public function resolution()
    {

    }

    public function sizeAxis()
    {

    }

}

/* End of file GeoChart.php */
/* Location: ./gcharts/charts/GeoChart.php */
