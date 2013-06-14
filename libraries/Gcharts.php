<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter gCharts Library
 *
 * An open source library to extend the power of google charts into CodeIgniter
 * for PHP 5.3 or newer
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

class Gcharts
{
    var $data;
    var $options;
    var $output;

    var $jsonData;
    var $jsonOptions;

    var $workingDir;

    /**
     * Loads the required classes from the gcharts folder for the library to
     * work.
     */
    public function __construct()
    {
        $this->workingDir = realpath(dirname(__FILE__)) . '/';

//Charts
        require_once('gcharts/LineChart.php');
        require_once('gcharts/AreaChart.php');
        //require_once('gcharts/PieChart.php');

//Configs
        require_once('gcharts/configOptions.php');
        require_once('gcharts/DataTable.php');
        require_once('gcharts/backgroundColor.php');
        require_once('gcharts/chartArea.php');
        require_once('gcharts/hAxis.php');
        require_once('gcharts/legend.php');
        require_once('gcharts/textStyle.php');
        require_once('gcharts/tooltip.php');
    }

    /**
     * Creates a new LineChart object
     *
     * Pass an array with the first item as the label for the xAxis, the second
     * item being the label for the first set of data, the third item for the
     * second set of data, etc...
     *
     * @param array $options
     * @return \Gcharts
     */
    public function LineChart($options = array())
    {
        $this->LineChart = new LineChart($options);
        return $this->LineChart;
    }

    /**
     * Creates a new AreaChart object
     *
     * Pass an array with the first item as the label for the xAxis, the second
     * item being the label for the first set of data, the third item for the
     * second set of data, etc...
     *
     * @param array $options
     * @return \Gcharts
     */
    public function AreaChart($options = array())
    {
        $this->AreaChart = new AreaChart($options);
        return $this->AreaChart;
    }

    /**
     * Sets the options from an array
     *
     * You can set the options all at once instead of passing them individually
     * or chaining the functions from the chart objects.
     *
     * @param type $options
     * @return \Gcharts
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Adds configuration option
     *
     * Takes either an array with option => value, or an object created by
     * one of the configOptions child objects.
     *
     * @param mixed $option
     * @return \Gcharts
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
     * Add data to the charts
     *
     * Takes an array of values and adds them to the charts as data points to
     * plot once the chart is rendered.
     *
     * @param array $data
     * @return \Gcharts
     */
    public function addData($data)
    {
        array_push($this->data, $data);

        return $this;
    }

    /**
     * Builds the Javascript code block
     *
     * This will build the script block for the actual chart and passes it
     * back to output function of the calling chart object. If there are any
     * events defined, they will be automatically be attached to the chart and
     * pulled from the callbacks folder.
     *
     * @param string $className Passed from the calling chart
     * @return string javascript code block
     */
    public function _build_script_block($className)
    {
        $this->output = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'.PHP_EOL;

        if($className != 'AnnotatedTimeLine')
        {
            if(isset($this->events) && count($this->events) > 0)
            {
                $this->output .= '<script type="text/javascript">'.PHP_EOL;
                $this->output .= $this->_load_event_callbacks();
                $this->output .= '</script>'.PHP_EOL;

            }
            $this->output .= '<script type="text/javascript">'.PHP_EOL;

                $this->output .= "google.load('visualization', '1', {'packages':['corechart']});".PHP_EOL;
                $this->output .= "google.setOnLoadCallback(drawChart);".PHP_EOL;
                $this->output .= "function drawChart() {".PHP_EOL;
                $this->output .= "var data = new google.visualization.arrayToDataTable(".$this->jsonData.");".PHP_EOL;
                $this->output .= "var options = ".$this->jsonOptions.";".PHP_EOL;
                $this->output .= "var chart = new google.visualization.".$className."(document.getElementById('".$this->elementID."'));".PHP_EOL;
                $this->output .= "chart.draw(data, options);".PHP_EOL;

                if(isset($this->events) && count($this->events) > 0)
                {
                    foreach($this->events as $event)
                    {
                        $this->output .= "google.visualization.events.addListener(chart, '".$event."', ";
                        $this->output .= "function(event){".$className.".".$event."(event);});".PHP_EOL;
                    }
                }

                $this->output .= "}".PHP_EOL;

            $this->output .= '</script>'.PHP_EOL;

            return $this->output;
        } else { //AnnotatedTimeLine https://developers.google.com/chart/interactive/docs/gallery/annotatedtimeline
            $this->output .= '<script type="text/javascript">'.PHP_EOL;
            $this->output .= "google.load('visualization', '1', {'packages':['annotatedtimeline']});".PHP_EOL;
            $this->output .= "google.setOnLoadCallback(drawChart);".PHP_EOL;
            $this->output .= "function drawChart() {".PHP_EOL;
            $this->output .= "var data = new google.visualization.DataTable();".PHP_EOL;
//            $this->output .= "var data = new google.visualization.arrayToDataTable(".$this->jsonData.");".PHP_EOL;
            $this->output .= "var options = ".$this->jsonOptions.";".PHP_EOL;
            $this->output .= "var chart = new google.visualization.".$className."(document.getElementById('".$this->elementID."'));".PHP_EOL;
            $this->output .= "chart.draw(data, options);".PHP_EOL;
            $this->output .= "}".PHP_EOL;

            $this->output .= '</script>'.PHP_EOL;
        }
    }

    /**
     * Builds the javascript object for the event callbacks
     *
     * @return string Javascript code block
     * @throws Exception file not found
     */
    public function _load_event_callbacks()
    {
        $script = "if(typeof LineChart !== 'object') { ".get_class($this)." = {}; }".PHP_EOL.PHP_EOL;

        foreach($this->events as $event)
        {
             $script .= get_class($this).".".$event." = function(event) {".PHP_EOL;

             $callbackScript = file_get_contents($this->workingDir.'gcharts/callbacks/'.get_class($this).'.'.$event.'.js');

             if($callbackScript !== FALSE)
             {
                $script .= $callbackScript.PHP_EOL;
             } else {
                 throw new Exception('Error loading javascript file, in '.$this->workingDir.'gcharts/callbacks/'.get_class($this).$event.'.js');
             }

             $script .= "};".PHP_EOL;
        }

        return $script;
    }

    /**
     * Converts array to string
     *
     * Takes an array of values and ouputs them as a string between
     * brackets and separated by a pipe.
     *
     * @param array $defaultValues
     * @return string contains array values in readable form
     */
    public function _array_string($defaultValues)
    {
        $tmp = '[ ';

        foreach($defaultValues as $k => $v)
        {
            $tmp .= $v . ' | ';
        }

        return substr_replace($tmp, "", -2) . ']';
    }

}

/* End of file Gcharts.php */
/* Location: ./application/libraries/Gcharts.php */