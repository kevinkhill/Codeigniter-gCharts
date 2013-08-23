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
            'colorAxis',
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

    /**
     * An object that specifies a mapping between color column values and colors
     * or a gradient scale.
     *
     * @param colorAxis $colorAxis
     * @return \GeoChart
     */
    public function colorAxis($colorAxis)
    {
        if(is_a($colorAxis, 'colorAxis'))
        {
            $this->addOption($colorAxis);
        } else {
            $this->type_error(__FUNCTION__, 'colorAxis');
        }

        return $this;
    }

    /**
     * Color to assign to regions with no associated data.
     *
     * @param string $datalessRegionColor
     * @return \GeoChart
     */
    public function datalessRegionColor($datalessRegionColor)
    {
        if(is_string($datalessRegionColor) && ! empty($datalessRegionColor))
        {
            $this->addOption(array('datalessRegionColor' => $datalessRegionColor));
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
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
