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
    var $workingDir;

    static $dataTables = array();
    static $lineCharts = array();

    static $output;

    /**
     * Loads the required classes from the gcharts folder for the library to
     * work.
     */
    public function __construct()
    {
        $this->workingDir = realpath(dirname(__FILE__)) . '/';

//        require_once('gcharts/MasterChart.php');

        foreach(config_item('autoload_charts') as $chart)
        {
            require_once('gcharts/'.$chart.'.php');
        }

//        require_once('gcharts/AreaChart.php');
//        require_once('gcharts/PieChart.php');

//Configuration Classes
        require_once('gcharts/DataTable.php');
        require_once('gcharts/configOptions.php');
        require_once('gcharts/backgroundColor.php');
        require_once('gcharts/chartArea.php');
        require_once('gcharts/hAxis.php');
        require_once('gcharts/legend.php');
        require_once('gcharts/textStyle.php');
        require_once('gcharts/tooltip.php');
    }

    /**
     * Loads a specified chart manually
     *
     * @param string $chartName
     * @throws Exception
     */
    public function load($chartName)
    {
        if(file_exists('gcharts/'.$chartName.'.php'))
        {
            require_once('gcharts/'.$chartName.'.php');
        } else {
            throw new Exception('Invalid Chart, could not load "gcharts/'.$chartName.'.php"');
        }
    }

    /**
     * Creates and returns a new DataTable object if undefined or returns the
     * corresponding labeled DataTable if it is defined.
     *
     * @param string $dataTableLabel
     * @return \gcharts\DataTable DataTable object
     * @throws Exception label missing or invalid
     */
    public function DataTable($dataTableLabel = '')
    {
        if(is_string($dataTableLabel) && $dataTableLabel != '')
        {
            if(isset(Gcharts::$dataTables[$dataTableLabel]))
            {
                return Gcharts::$dataTables[$dataTableLabel];
            } else {
                Gcharts::$dataTables[$dataTableLabel] = new DataTable($dataTableLabel);
                return Gcharts::$dataTables[$dataTableLabel];
            }
        } else {
            throw new Exception('You must provide a label for the DataTable type (sring).');
        }
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
    public function LineChart($lineChartLabel = '')
    {
        if(is_string($lineChartLabel) && $lineChartLabel != '')
        {
            if(isset(Gcharts::$lineCharts[$lineChartLabel]))
            {
                return Gcharts::$lineCharts[$lineChartLabel];
            } else {
                Gcharts::$lineCharts[$lineChartLabel] = new LineChart($lineChartLabel);
                return Gcharts::$lineCharts[$lineChartLabel];
            }
        } else {
            throw new Exception('You must provide a label for the LineChart type (sring).');
        }
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
    public static function _build_script_block($chart)
    {
        Gcharts::$output = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'.PHP_EOL;

        if($chart->chartType != 'AnnotatedTimeLine')
        {
            if(isset($chart->events) && count($chart->events) > 0)
            {
                Gcharts::$output .= '<script type="text/javascript">'.PHP_EOL;
                Gcharts::$output .= $this->_load_event_callbacks();
                Gcharts::$output .= '</script>'.PHP_EOL;

            }
            Gcharts::$output .= '<script type="text/javascript">'.PHP_EOL;

                Gcharts::$output .= "google.load('visualization', '1', {'packages':['corechart']});".PHP_EOL;
                Gcharts::$output .= "google.setOnLoadCallback(drawChart);".PHP_EOL;
                Gcharts::$output .= "function drawChart() {".PHP_EOL;
//                if(gettype($chart->data) == 'object' && get_class($data) == 'DataTable')
//                {
                    $data = Gcharts::$dataTables[$chart->dataTable];
                    Gcharts::$output .= "var data = new google.visualization.DataTable(".$data->toJSON().", 0.6);".PHP_EOL;
//                } else {
//                    Gcharts::$output .= "var data = new google.visualization.arrayToDataTable(".$this->jsonData.");".PHP_EOL;
//                }
                Gcharts::$output .= "var options = ".json_encode($chart->options).";".PHP_EOL;
                Gcharts::$output .= "var chart = new google.visualization.".$chart->chartType;
                    Gcharts::$output .= "(document.getElementById('".$chart->elementID."'));".PHP_EOL;
                Gcharts::$output .= "chart.draw(data, options);".PHP_EOL;

                if(isset($chart->events) && count($chart->events) > 0)
                {
                    foreach($chart->events as $event)
                    {
                        Gcharts::$output .= "google.visualization.events.addListener(chart, '".$event."', ";
                        Gcharts::$output .= "function(event){".$chart->chartType.".".$event."(event);});".PHP_EOL;
                    }
                }

                Gcharts::$output .= "}".PHP_EOL;

            Gcharts::$output .= '</script>'.PHP_EOL;

            return Gcharts::$output;

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

    public function _getDataTable($dataTableLabel)
    {
        if(isset($this->dataTables[$dataTableLabel]))
        {
            return $this->dataTables[$dataTableLabel];
        } else {
            throw new Exception('Error, DataTable with label "'.$dataTableLabel.'" not found.');
        }
    }

}

/* End of file Gcharts.php */
/* Location: ./application/libraries/Gcharts.php */