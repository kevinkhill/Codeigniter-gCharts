<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Line Chart Object
 *
 * Holds all the configuration for the LineChart
 *
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0
 * which is included in the LICENSE file
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, Kevin Hill
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://http://www.apache.org/licenses/LICENSE-2.0.html Apache-V2
 *
 */

class LineChart
{
    var $chartType = NULL;
    var $chartLabel = NULL;
    var $dataTable = NULL;

    var $data = NULL;
    var $options = NULL;
    var $events = NULL;
    var $elementID = NULL;

    public function __construct($chartLabel)
    {
        $this->chartType = get_class($this);
        $this->chartLabel = $chartLabel;
        $this->options = array();
    }

    /**
     * Sets configuration options from array of values
     *
     * You can set the options all at once instead of passing them individually
     * or chaining the functions from the chart objects.
     *
     * @param array $options
     * @return \LineChart
     */
    public function initialize($options = array())
    {
        $defaultOptions = array(
//            'animation',
            'backgroundColor',
            'chartArea',
            'colors',
            'curveType',
            'enableInteractivity',
            'events',
            'focusTarget',
            'fontSize',
            'fontName',
            'hAxis',
            'isHtml',
            'interpolateNulls',
            'legend',
            'lineWidth',
            'pointSize',
            'reverseCategories',
            'series',
            'theme',
            'title',
            'titlePosition',
            'titleTextStyle',
            'tooltip',
            'vAxes',
            'vAxis'
        );

        if(is_array($options) && count($options) > 0)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $defaultOptions))
                {
                    if(method_exists($this, $option))
                    {
                        $this->$option($value);
                    } else {
                        $this->addOption($value);
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Sets a configuration option
     *
     * Takes either an array with option => value, or an object created by
     * one of the configOptions child objects.
     *
     * @param mixed $option
     * @return \LineChart
     */
    public function addOption($option)
    {
        if(is_object($option))
        {
            $this->options = array_merge($this->options, $option->toArray());
        }

        if(is_array($option))
        {
            $this->options = array_merge($this->options, $option);
        }

        return $this;
    }

    /**
     * Assigns wich DataTable will be used for this LineChart. If a label is provided
     * then the defined DataTable will be used. If called with no argument, it will
     * attempt to use a DataTable with the same label as the LineChart
     *
     * @param mixed dataTableLabel String label or DataTable object
     * @return \gcharts\DataTable DataTable object
     * @throws Exception label missing or invalid
     */
    public function dataTable($data = NULL)
    {
        switch(gettype($data))
        {
            case 'object':
                if(get_class($data) == 'DataTable')
                {
                    $this->data = $data;
                    $this->dataTable = 'local';
                } else {
                    throw new Exception('Invalid dataTable object, must be type (DataTable).');
                }
            break;

            case 'string':
                if($data != '')
                {
                    $this->dataTable = $data;
                } else {
                    throw new Exception('Invalid dataTable label, must be type (string) non-empty.');
                }
            break;

            default:
                $this->dataTable = $this->chartLabel;
            break;
        }

        return $this;
    }

    /**
     * Register javascript callbacks for specific events. Valid values include
     * [ animationfinish | error | onmouseover | onmouseout | ready | select ]
     * associated to a respective pre-defined javascript function as the callback.
     *
     * @param array $events Array of events associated to a callback
     * @return \LineChart
     * @throws Exception Invalid event
     */
    public function events($events)
    {
        $values = array(
            'animationfinish',
            'error',
            'onmouseover',
            'onmouseout',
            'ready',
            'select'
        );

        if(is_array($events))
        {
            foreach($events as $event)
            {
                if(in_array($event, $values))
                {
                    $this->events[] = $event;
                } else {
                    throw new Exception('Invalid events array key value, must be (string) with any key '.array_string($values));
                }
            }
        } else {
            throw new Exception('Invalid events type, must be (array) containing any key '.array_string($values));
        }

        return $this;
    }


    /**
     * Animation Easing
     *
     * The easing function applied to the animation. The following options are available:
     * 'linear' - Constant speed.
     * 'in' - Ease in - Start slow and speed up.
     * 'out' - Ease out - Start fast and slow down.
     * 'inAndOut' - Ease in and out - Start slow, speed up, then slow down.
     *
     * @param string $easing
     * @return \LineChart
     * @throws Exception Invalid animationEasing
     */
//    public function animationEasing($easing = 'linear')
//    {
//        $values = array('linear', 'in', 'out', 'inAndOut');
//
//        if(in_array($easing, $values))
//        {
//            $this->easing = $easing;
//            return $this;
//        } else {
//            throw new Exception('Invalid animationEasing value, must be (string) '.array_string($values));
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
     * @return \LineChart
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
     * @return \LineChart
     * @throws Exception Invalid axisTitlesPosition
     */
    public function axisTitlesPosition($position)
    {
        $values = array('in', 'out', 'none');

        if(in_array($position, $values))
        {
            $this->addOption(array('axisTitlesPosition' => $position));
            return $this;
        } else {
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.array_string($values));
        }
    }

    /**
     * An object with members to configure the placement and size of the chart area
     * (where the chart itself is drawn, excluding axis and legends).
     * Two formats are supported: a number, or a number followed by %.
     * A simple number is a value in pixels; a number followed by % is a percentage.
     *
     * @param \chartArea $chartArea
     * @return \LineChart
     * @throws Exception Invalid chartArea
     */
    public function chartArea(chartArea $chartArea)
    {
        if(is_a($chartArea, 'chartArea'))
        {
            $this->addOption($chartArea->toArray());
            return $this;
        } else {
            throw new Exception('Invalid chartArea, must be (object) type chartArea');
        }
    }

    /**
     * The colors to use for the chart elements. An array of strings, where each
     * element is an HTML color string, for example: colors:['red','#004411'].
     *
     * @param array $colorArray
     * @return \LineChart
     * @throws Exception Invalid colors
     */
    public function colors($colorArray)
    {
        if(is_array($colorArray))
        {
            $this->addOption(array('colors' => $colorArray));
            return $this;
        } else {
            throw new Exception('Invalid colors, must be (array) with valid HTML colors');
        }
    }

    /**
     * Controls the curve of the lines when the line width is not zero. Can be one of the following:
     *
     * 'none' - Straight lines without curve.
     * 'function' - The angles of the line will be smoothed.
     *
     * @param string $curveType
     * @return \LineChart
     * @throws Exception Invalid curveType
     */
    public function curveType($curveType = 'none')
    {
        $values = array('none', 'function');

        if(in_array($curveType, $values))
        {
            $this->addOption(array('curveType' => (string) $curveType));
            return $this;
        } else {
            throw new Exception('Invalid curveType, must be (string) '.array_string($values));
        }
    }

    public function enableInteractivity($param)
    {

    }

    public function focusTarget($param)
    {

    }

    public function fontSize($param)
    {

    }

    public function fontName($param)
    {

    }

    /**
     * An object with members to configure various horizontal axis elements. To
     * specify properties of this property, create a new hAxis() object, set
     * the values then pass it to this function or to the constructor.
     *
     * @param hAxis $hAxis
     * @return \LineChart
     * @throws Exception
     */
    public function hAxis($hAxis)
    {
        if(is_a($hAxis, 'hAxis'))
        {
            $this->addOption($hAxis->toArray());
            return $this;
        } else {
            throw new Exception('Invalid hAxis, must be (object) type hAxis');
        }

        return $this;
    }

    /**
     * Height of the chart, in pixels.
     *
     * @param int $height
     * @return \LineChart
     * @throws Exception
     */
    public function height($height)
    {
        if(is_int($height))
        {
            $this->addOption(array('height' => $height));
            return $this;
        } else {
            throw new Exception('Invalid height, must be (int)');
        }
    }

    public function isHtml($param)
    {

    }

    /**
     * Whether to guess the value of missing points. If true, it will guess the
     * value of any missing data based on neighboring points. If false, it will
     * leave a break in the line at the unknown point.
     *
     * @param boolean $interpolateNulls
     * @return \LineChart
     */
    public function interpolateNulls($interpolateNulls)
    {
        if(is_bool($interpolateNulls))
        {
            $this->interpolateNulls = $interpolateNulls;
        } else {
            $this->interpolateNulls = FALSE;
        }

        return $this;
    }

    /**
     * An object with members to configure various aspects of the legend. To
     * specify properties of this object, create a new legend() object, set the
     * values then pass it to this function or to the constructor.
     *
     * @param legend $legendObj
     * @return \LineChart
     * @throws Exception
     */
    public function legend(legend $legendObj)
    {
        if(is_a($legendObj, 'legend'))
        {
            $this->addOption($legendObj->toArray());
        } else {
            throw new Exception('Invalid legend, must be (object) type legend');
        }

        return $this;
    }

    /**
     * Data line width in pixels. Use zero to hide all lines and show only the
     * points. You can override values for individual series using the series
     * property.
     *
     * @param int $width
     * @return \LineChart
     * @throws Exception
     */
    public function lineWidth($width = 2)
    {
        if(is_int($width))
        {
            $this->addOption(array('lineWidth' => $width));
        } else {
            throw new Exception('Invalid lineWidth, must be (int)');
        }

        return $this;
    }

    /**
     * Diameter of displayed points in pixels. Use zero to hide all points. You
     * can override values for individual series using the series property.
     *
     * @param int $size
     * @return \LineChart
     * @throws Exception
     */
    public function pointSize($size = 0)
    {
        if(is_int($size))
        {
            $this->addOption(array('pointSize' => $size));
        } else {
            throw new Exception('Invalid pointSize, must be (int)');
        }

        return $this;
    }

    public function reverseCatagories($param)
    {

    }

    public function series($param)
    {

    }

    public function theme($param)
    {

    }

    /**
     * Text to display above the chart.
     *
     * @param string $title
     * @return \LineChart
     */
    public function title($title = '')
    {
        $this->addOption(array('title' => (string) $title));

        return $this;
    }

    /**
     * An object with members to configure various tooltip elements. To specify
     * properties of this object, create a new tooltip() object, set the values
     * then pass it to this function or to the constructor.
     *
     * @param tooltip $tooltipObj
     * @return \LineChart
     * @throws Exception
     */
    public function tooltip(tooltip $tooltipObj)
    {
        if(is_a($tooltipObj, 'tooltip'))
        {
            $this->addOption($tooltipObj->toArray());
        } else {
            throw new Exception('Invalid tooltip, must be (object) type tooltip');
        }

        return $this;
    }

    /**
     * Where to place the chart title, compared to the chart area. Supported values:
     * 'in' - Draw the title inside the chart area.
     * 'out' - Draw the title outside the chart area.
     * 'none' - Omit the title.
     *
     * @param string $position
     * @return \LineChart
     * @throws Exception
     */
    public function titlePosition($position)
    {
        $values = array(
            'in',
            'out',
            'none'
        );

        if(in_array($position, $values))
        {
            $this->addOption(array('titlePosition' => $position));
        } else {
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.array_string($values));
        }

        return $this;
    }

    /**
     * An object that specifies the title text style. create a new textStyle()
     * object, set the values then pass it to this function or to the constructor.
     *
     * @param textStyle $textStyleObj
     * @return \LineChart
     * @throws Exception
     */
    public function titleTextStyle(textStyle $textStyleObj)
    {
        if(is_a($textStyleObj, 'textStyle'))
        {
            $this->addOption(array('titleTextStyle' => $textStyleObj->values()));
        } else {
            throw new Exception('Invalid titleTextStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * Width of the chart, in pixels.
     *
     * @param int $width
     * @return \LineChart
     * @throws Exception
     */
    public function width($width)
    {
        if(is_int($width))
        {
            $this->addOption(array('width' => $width));
        } else {
            throw new Exception('Invalid width, must be (int)');
        }

        return $this;
    }

    /**
     * Outputs the chart javascript into the page
     *
     * Pass in a string of the html elementID that you want the chart to be
     * rendered into. Plus, if the dataTable function was never called on the
     * chart to assign a DataTable to use, it will automatically attempt to use
     * a DataTable with the same label as the chart.
     *
     * @param string $elementID
     * @return string Javscript code blocks
     */
    public function outputInto($elementID = NULL)
    {
        if($this->dataTable === NULL)
        {
            $this->dataTable = $this->chartLabel;
        }

        if(gettype($elementID) == 'string' && $elementID != NULL)
        {
            $this->elementID = $elementID;
        }

        return Gcharts::_build_script_block($this);
    }

}

/* End of file LineChart.php */
/* Location: ./gcharts/charts/LineChart.php */
