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
//            'animation',
//            'enableInteractivity',
            'focusTarget',
//            'reverseCategories',
//            'series',
//            'theme',
        ));
    }

    /**
     * Animation Easing
     *
     * The easing function applied to the animation. The following options are available:
     * 'Geoar' - Constant speed.
     * 'in' - Ease in - Start slow and speed up.
     * 'out' - Ease out - Start fast and slow down.
     * 'inAndOut' - Ease in and out - Start slow, speed up, then slow down.
     *
     * @param string $easing
     * @return \GeoChart
     */
//    public function animationEasing($easing = 'Geoar')
//    {
//        $values = array('Geoar', 'in', 'out', 'inAndOut');
//
//        if(in_array($easing, $values))
//        {
//            $this->easing = $easing;
//            return $this;
//        } else {
//            $this->error('Invalid animationEasing value, must be (string) '.array_string($values));
//        }
//
//        return $this;
//    }

    /**
     * Animation Duration
     *
     * The duration of the animation, in milliseconds.
     *
     * @param mixed $duration
     * @return \GeoChart
     */
//    public function animationDuration($duration)
//    {
//        if(is_int($duration) || is_string($duration))
//        {
//            $this->duration = $this->_valid_int($duration);
//        } else {
//            $this->duration = 0;
//        }
//
//        return $this;
//    }

    /**
     * Where to place the axis titles, compared to the chart area. Supported values:
     * in - Draw the axis titles inside the the chart area.
     * out - Draw the axis titles outside the chart area.
     * none - Omit the axis titles.
     *
     * @param string $position
     * @return \GeoChart
     */
    public function axisTitlesPosition($position)
    {
        $values = array(
            'in',
            'out',
            'none'
        );

        if(in_array($position, $values))
        {
            $this->addOption(array('axisTitlesPosition' => $position));
        } else {
            $this->error('Invalid axisTitlesPosition, must be type (string) with a value of '.array_string($values));
        }

        return $this;
    }

    /**
     * Controls the curve of the Geos when the Geo width is not zero. Can be one of the following:
     *
     * 'none' - Straight Geos without curve.
     * 'function' - The angles of the Geo will be smoothed.
     *
     * @param string $curveType
     * @return \GeoChart
     */
    public function curveType($curveType)
    {
        $values = array(
            'none',
            'function'
        );

        if(in_array($curveType, $values))
        {
            $this->addOption(array('curveType' => (string) $curveType));
        } else {
            $this->error('Invalid curveType, must be type (string) with a value of '.array_string($values));
        }

        return $this;
    }

//    public function enableInteractivity($param)
//    {
//
//
//        return $this;
//    }
//
//    public function focusTarget($param)
//    {
//
//
//        return $this;
//    }
//
//    public function fontSize($param)
//    {
//
//
//        return $this;
//    }
//
//    public function fontName($param)
//    {
//
//
//        return $this;
//    }

    /**
     * An object with members to configure various horizontal axis elements. To
     * specify properties of this property, create a new hAxis() object, set
     * the values then pass it to this function or to the constructor.
     *
     * @param hAxis $hAxis
     * @return \GeoChart
     */
    public function hAxis($hAxis)
    {
        if(is_a($hAxis, 'hAxis'))
        {
            $this->addOption($hAxis->toArray());
        } else {
            $this->error('Invalid hAxis, must be (object) type hAxis');
        }

        return $this;
    }

    /**
     * If set to true, use HTML-rendered (rather than SVG-rendered) tooltips.
     *
     * @param boolean $isHTML
     * @return \GeoChart
     */
    public function isHtml($isHTML)
    {
        if(is_bool($isHTML))
        {
            $this->addOption(array('isHTML' => $isHTML));
        } else {
            $this->error('Invalid isHTML value, must be type (boolean)');
        }

        return $this;
    }

    /**
     * Whether to guess the value of missing points. If true, it will guess the
     * value of any missing data based on neighboring points. If false, it will
     * leave a break in the Geo at the unknown point.
     *
     * @param boolean $interpolateNulls
     * @return \GeoChart
     */
    public function interpolateNulls($interpolateNulls)
    {
        if(is_bool($interpolateNulls))
        {
            $this->addOption(array('interpolateNulls' => $interpolateNulls));
        } else {
           $this->error('Invalid interpolateNulls value, must be type (boolean)');
        }

        return $this;
    }

    /**
     * Data Geo width in pixels. Use zero to hide all Geos and show only the
     * points. You can override values for individual series using the series
     * property.
     *
     * @param int $width
     * @return \GeoChart
     */
    public function GeoWidth($width)
    {
        if(is_int($width))
        {
            $this->addOption(array('GeoWidth' => $width));
        } else {
            $this->error('Invalid GeoWidth, must be type (int).');
        }

        return $this;
    }

    /**
     * Diameter of displayed points in pixels. Use zero to hide all points. You
     * can override values for individual series using the series property.
     *
     * @param int $size
     * @return \GeoChart
     */
    public function pointSize($size)
    {
        if(is_int($size))
        {
            $this->addOption(array('pointSize' => $size));
        } else {
            $this->error('Invalid pointSize, must be type (int).');
        }

        return $this;
    }

//    public function reverseCatagories($param)
//    {
//
//
//        return $this;
//    }
//
//    public function series($param)
//    {
//
//
//        return $this;
//    }
//
//    public function theme($param)
//    {
//
//
//        return $this;
//    }

}

/* End of file GeoChart.php */
/* Location: ./gcharts/charts/GeoChart.php */
