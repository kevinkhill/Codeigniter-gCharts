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

    /**
     * Which type of map this is. The DataTable format must match the value specified. The following values are supported:
     *
     * 'auto' - Choose based on the format of the DataTable.
     * 'regions' - This is a region map
     * 'markers' - This is a marker map
     *
     * @param string $displayMode
     * @return \GeoChart
     */
    public function displayMode($displayMode)
    {
        $values = array(
            'auto',
            'regions',
            'markers',
        );

        if(in_array($displayMode, $values))
        {
            $this->addOption(array('displayMode' => $displayMode));
        } else {
            $this->type_error(__FUNCTION__, 'string', 'with a value of '.array_string($values));
        }

        return $this;
    }

    public function enableRegionInteractivity($enableRegionInteractivity)
    {

    }

    public function keepAspectRatio($keepAspectRatio)
    {

    }

    public function region($region)
    {

    }

    public function magnifyingGlass($magnifyingGlass)
    {

    }

    public function markerOpacity($markerOpacity)
    {

    }

    public function resolution($resolution)
    {

    }

    public function sizeAxis($sizeAxis)
    {

    }

}

/* End of file GeoChart.php */
/* Location: ./gcharts/charts/GeoChart.php */
