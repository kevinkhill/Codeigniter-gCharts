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
    static $config;
    static $ignited;
    static $output;
    static $masterPath;
    static $configPath;
    static $chartPath;
    static $callbackPath;
    static $dataTableVersion = '0.6';
    static $jsOpen = '<script type="text/javascript">';
    static $jsClose = '</script>';
    static $googleAPI = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
    static $dataTables = array();
    static $lineCharts = array();
    static $areaCharts = array();
    static $pieCharts = array();

    /**
     * Loads the required classes for the library to work.
     */
    public function __construct()
    {
        $this->_building_static();

//Configuration Classes
        $configClasses = array(
            'DataTable',
            'DataCell',
            'configOptions',
            'backgroundColor',
            'chartArea',
            'date',
            'hAxis',
            'legend',
            'textStyle',
            'tooltip'
        );

        //Autoload Chart Classes
        if(is_array(Gcharts::$config->autoloadCharts) && count(Gcharts::$config->autoloadCharts) > 0)
        {
            foreach(Gcharts::$config->autoloadCharts as $chart)
            {
                require_once(Gcharts::$chartPath.$chart.'.php');
            }
        }
        //Load Config Classes
        foreach($configClasses as $configClass)
        {
            require_once(Gcharts::$configPath.$configClass.'.php');
        }
    }

    /**
     * Loads a specified chart manually
     *
     * @param string $chartName
     * @throws Exception
     */
    public function load($chartName)
    {
        if(file_exists('gcharts/charts/'.$chartName.'.php'))
        {
            require_once('gcharts/charts/'.$chartName.'.php');
        } else {
            throw new Exception('Invalid Chart, could not load "gcharts/charts/'.$chartName.'.php"');
        }
    }

    /**
     * Creates and returns a new configuration object
     *
     * @param string $type config object name
     * @return \configs\configOptions
     * @throws Exception invalid config object
     */
    public function configObj($type)
    {
        $configObjects = array(
            'chartArea',
            'date',
            'legend',
            'textStyle',
            'tooltip'
        );

        if(in_array($type, $configObjects))
        {
            return new $type();
        } else {
            throw new Exception('Error, "'.$type.'" is not a valid config object');
        }
    }

    /**
     * When passed a string label, this creates and stores within the gcharts
     * parent object a new DataTable object and returns it.
     *
     * If already defined, it returns the corresponding labeled DataTable.
     *
     * If called with no argument, it just returns a new DataTable without storing
     * it within the parent object.
     *
     * @param string $dataTableLabel
     * @return \gcharts\DataTable DataTable object
     */
    public function DataTable($dataTableLabel = NULL)
    {
        if(is_string($dataTableLabel) && $dataTableLabel != NULL)
        {
            if(isset(Gcharts::$dataTables[$dataTableLabel]))
            {
                return Gcharts::$dataTables[$dataTableLabel];
            } else {
                Gcharts::$dataTables[$dataTableLabel] = new DataTable();
                return Gcharts::$dataTables[$dataTableLabel];
            }
        } else {
            return new DataTable();
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
    public function AreaChart($areaChartLabel = '')
    {
        if(is_string($areaChartLabel) && $areaChartLabel != '')
        {
            if(isset(Gcharts::$areaCharts[$areaChartLabel]))
            {
                return Gcharts::$areaCharts[$areaChartLabel];
            } else {
                Gcharts::$areaCharts[$areaChartLabel] = new LineChart($areaChartLabel);
                return Gcharts::$areaCharts[$areaChartLabel];
            }
        } else {
            throw new Exception('You must provide a label for the AreaChart type (sring).');
        }
    }

    /**
     * Returns the Javascript block to place in the page
     *
     * @return string javascript blocks
     */
    public function getOutput()
    {
        return Gcharts::$output;
    }

    /**
     * Builds a div html element for a chart to be rendered into.
     *
     * This is useful for the AnnotatedTimeLine Chart since it MUST have explicitly
     * defined dimensions of the div it is rendered into.
     *
     * The other charts do not require height and width, but do require an ID of
     * the div that will be receiving the chart.
     *
     * @param string $elementID
     * @param int $width
     * @param int $height
     * @return string HTML div element
     */
    public function div($elementID, $width = 960, $height = 540)
    {
        $format = '<div id="%s" style="width:%spx;height:%spx;"></div>';
        return sprintf($format, $elementID, $width, $height);
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
        $out = Gcharts::$googleAPI.PHP_EOL;

        if(isset($chart->events) && is_array($chart->events) && count($chart->events) > 0)
        {
            $out .= Gcharts::_build_event_callbacks($chart->chartType, $chart->events);
        }

        $out .= Gcharts::$jsOpen.PHP_EOL;

        if($chart->elementID == NULL)
        {
            $out .= 'alert("Error calling '.$chart->chartType.'(\''.$chart->chartLabel.'\')->outputInto(), requires a valid html elementID.");'.PHP_EOL;
        }

        if(isset($chart->data) === FALSE && isset(Gcharts::$dataTables[$chart->dataTable]) === FALSE)
        {
            $out .= 'alert("No DataTable has been defined for '.$chart->chartType.'(\''.$chart->chartLabel.'\').");'.PHP_EOL;
        }

        $vizType = ($chart->chartType == 'AnnotatedTimeLine' ? 'annotatedtimeline' : 'corechart');

        $out .= sprintf("google.load('visualization', '1', {'packages':['%s']});", $vizType).PHP_EOL;
        $out .= 'google.setOnLoadCallback(drawChart);'.PHP_EOL;
        $out .= 'function drawChart() {'.PHP_EOL;

        if(isset($chart->data) && $chart->dataTable == 'local')
        {
            $data = $chart->data->toJSON();
            $format = 'var data = new google.visualization.DataTable(%s, %s);';
            $out .= sprintf($format, $data, Gcharts::$dataTableVersion).PHP_EOL;
        }
        if(isset(Gcharts::$dataTables[$chart->dataTable]))
        {
            $data = Gcharts::$dataTables[$chart->dataTable];
            $format = 'var data = new google.visualization.DataTable(%s, %s);';
            $out .= sprintf($format, $data->toJSON(), Gcharts::$dataTableVersion).PHP_EOL;
        }
//$out .= "var data = new google.visualization.arrayToDataTable(".$this->jsonData.");".PHP_EOL;

        $out .= "var options = ".json_encode($chart->options).";".PHP_EOL;
        $out .= "var chart = new google.visualization.".$chart->chartType;
            $out .= sprintf("(document.getElementById('%s'));", $chart->elementID).PHP_EOL;
        $out .= "chart.draw(data, options);".PHP_EOL;

        if(isset($chart->events) && count($chart->events) > 0)
        {
            foreach($chart->events as $event)
            {
                $out .= sprintf('google.visualization.events.addListener(chart, "%s", ', $event);
                $out .= sprintf('function(event) { %s.%s(event); });', $chart->chartType, $event).PHP_EOL;
            }
        }

        $out .= "}".PHP_EOL;

        $out .= Gcharts::$jsClose.PHP_EOL;

        Gcharts::$output = $out;

        return Gcharts::$output;
    }

    /**
     * Builds the javascript object for the event callbacks
     *
     * @return string Javascript code block
     * @throws Exception file not found
     */
    private static function _build_event_callbacks($chartType, $chartEvents)
    {
        $script = sprintf('if(typeof %s !== "object") { %s = {}; }', $chartType, $chartType).PHP_EOL.PHP_EOL;

        foreach($chartEvents as $event)
        {
             $script .= sprintf('%s.%s = function(event) {', $chartType, $event).PHP_EOL;

             $callback = Gcharts::$callbackPath.$chartType.'.'.$event.'.js';
             $callbackScript = file_get_contents($callback);
            
             if($callbackScript !== FALSE)
             {
                $script .= $callbackScript.PHP_EOL;
             } else {
                 throw new Exception('Error loading javascript file, in '.$callback.'.js');
             }

             $script .= "};".PHP_EOL;
        }
//var_dump($script);
        $tmp = Gcharts::$jsOpen.PHP_EOL;
        $tmp .= $script;
        $tmp .= Gcharts::$jsClose.PHP_EOL;
        
        return $tmp;
    }

    private function _building_static()
    {
        Gcharts::$masterPath = realpath(dirname(__FILE__)).'/gcharts/';
        Gcharts::$configPath = Gcharts::$masterPath.'configs/';
        Gcharts::$chartPath = Gcharts::$masterPath.'charts/';
        Gcharts::$callbackPath = Gcharts::$masterPath.'callbacks/';
        Gcharts::$ignited = (defined('CI_VERSION') ? TRUE : FALSE);

        Gcharts::$config = new stdClass();
        Gcharts::$config->autoloadCharts = config_item('autoloadCharts');
        Gcharts::$config->useGlobalTextStyle = config_item('useGlobalTextStyle');
        Gcharts::$config->globalTextStyle = config_item('globalTextStyle');
    }

}

/* End of file Gcharts.php */
/* Location: ./Gcharts.php */
