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
    var $chartType;
    var $chartLabel;
    var $dataTable;

    var $data;
    var $options;
    var $events;
    var $elementID;

    public function __construct($chartLabel)
    {
        $this->chartType = get_class($this);
        $this->chartLabel = $chartLabel;
    }

    /**
     * Assigns wich DataTable will be used for this LineChart. If a label is provided
     * then the defined DataTable will be used. If called with no argument, it will
     * attempt to use a DataTable with the same label as the LineChart
     *
     * @param string $dataTableLabel
     * @return \gcharts\DataTable DataTable object
     * @throws Exception label missing or invalid
     */
    public function useDataTable($dataTableLabel = '')
    {
        if($dataTableLabel == '')
        {
            $this->dataTable = $this->chartLabel;
        } else {
            $this->dataTable = $dataTableLabel;
        }

        return $this;
    }

    /**
     * Register Events
     *
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
                    throw new Exception('Invalid events array key value, must be (string) with any key '.$this->_array_string($values));
                }
            }
        } else {
            throw new Exception('Invalid events type, must be (array) containing any key '.$this->_array_string($values));
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
    public function animationEasing($easing = 'linear')
    {
        $values = array('linear', 'in', 'out', 'inAndOut');

        if(in_array($easing, $values))
        {
            $this->easing = $easing;
            return $this;
        } else {
            throw new Exception('Invalid animationEasing value, must be (string) '.$this->_array_string($values));
        }

        return $this;
    }

    /**
     * Animation Duration
     *
     * The duration of the animation, in milliseconds.
     *
     * @param mixed $duration
     * @return \LineChart
     */
    public function animationDuration($duration)
    {
        if(is_int($duration) || is_string($duration))
        {
            $this->duration = $this->_valid_int($duration);
        } else {
            $this->duration = 0;
        }

        return $this;
    }

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
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.$this->_array_string($values));
        }
    }

    /**
     * Chart Area
     *
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
     * Chart Element Colors
     *
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
            throw new Exception('Invalid curveType, must be (string) '.$this->_array_string($values));
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

    public function hAxis(hAxis $param)
    {

    }

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

    public function interpolateNulls($param)
    {

    }

    public function legend(legend $legendObj)
    {
        if(is_a($legendObj, 'legend'))
        {
            $this->addOption($legendObj->toArray());
            return $this;
        } else {
            throw new Exception('Invalid legend, must be (object) type legend');
        }
    }

    public function lineWidth($width = 2)
    {
        if(is_int($width))
        {
            $this->addOption(array('lineWidth' => $width));
            return $this;
        } else {
            throw new Exception('Invalid lineWidth, must be (int)');
        }
    }

    public function pointSize($size = 0)
    {
        if(is_int($size))
        {
            $this->addOption(array('pointSize' => $size));
            return $this;
        } else {
            throw new Exception('Invalid pointSize, must be (int)');
        }
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

    public function title($title = '')
    {
        $this->addOption(array('title' => (string) $title));

        return $this;
    }

    public function tooltip(tooltip $tooltipObj)
    {
        if(is_a($tooltipObj, 'tooltip'))
        {
            $this->addOption($tooltipObj->toArray());
            return $this;
        } else {
            throw new Exception('Invalid tooltip, must be (object) type tooltip');
        }
    }

    public function titlePosition($position)
    {
        $values = array('in', 'out', 'none');

        if(in_array($position, $values))
        {
            $this->addOption(array('titlePosition' => $position));
            return $this;
        } else {
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.$this->_array_string($values));
        }
    }

    public function titleTextStyle(textStyle $textStyleObj)
    {
        if(is_a($textStyleObj, 'textStyle'))
        {
            $this->addOption(array('titleTextStyle' => $textStyleObj->values()));
            return $this;
        } else {
            throw new Exception('Invalid titleTextStyle, must be (object) type textStyle');
        }
    }


    public function width($width)
    {
        if(is_int($width))
        {
            $this->addOption(array('width' => $width));
            return $this;
        } else {
            throw new Exception('Invalid width, must be (int)');
        }
    }

    public function outputInto($elementID = '')
    {
//        if(gettype($this->data) == 'object' && get_class($this->data))
//        {
//            $this->jsonData = $this->data->toJSON();
//        } else {
//            $this->jsonData = json_encode($this->data);
//        }

        $this->elementID = $elementID;
//        $this->jsonOptions = json_encode($this->options);

        return Gcharts::_build_script_block($this);
    }

}

/* End of file LineChart.php */
/* Location: ./application/libraries/gcharts/LineChart.php */