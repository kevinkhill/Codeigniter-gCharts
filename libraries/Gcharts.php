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
 * This file is part of CodeIgniter gCharts.
 * CodeIgniter gCharts is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CodeIgniter gCharts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CodeIgniter gCharts.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://www.gnu.org/licenses/gpl.html GPL-V3
 *
 */

//@TODO: do these really need to be static?
class Gcharts
{
    static $config;
    static $ignited;

    static $output;
    static $elementID;
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

    static $hasError = FALSE;
    static $errorLog = array();

    private $supportedClasses = array(
        'DataTable',
        'LineChart'
    );

    private $configClasses = array(
        'configOptions',
        'Axis',
        'DataTable',
        'DataCell',
        'backgroundColor',
        'chartArea',
        'hAxis',
        'jsDate',
        'legend',
        'textStyle',
        'tooltip',
        'vAxis'
    );


    /**
     * Loads the required classes for the library to work.
     */
    public function __construct()
    {
        self::$masterPath = realpath(dirname(__FILE__)).'/gcharts/';
        self::$configPath = self::$masterPath.'configs/';
        self::$chartPath = self::$masterPath.'charts/';
        self::$callbackPath = self::$masterPath.'callbacks/';
        self::$ignited = (defined('CI_VERSION') ? TRUE : FALSE);

        self::$config = new stdClass();
        self::$config->autoloadCharts = config_item('autoloadCharts');
        self::$config->errorPrepend = config_item('errorPrepend');
        self::$config->errorAppend = config_item('errorAppend');
// @TODO: build this functionality
//        self::$config->useGlobalTextStyle = config_item('useGlobalTextStyle');
//        self::$config->globalTextStyle = config_item('globalTextStyle');


        //Autoload Chart Classes
        if(is_array(self::$config->autoloadCharts) && count(self::$config->autoloadCharts) > 0)
        {
            foreach(self::$config->autoloadCharts as $chart)
            {
                require_once(self::$chartPath.$chart.'.php');
            }
        }

        //Load Config Classes
        foreach($this->configClasses as $configClass)
        {
            require_once(self::$configPath.$configClass.'.php');
        }
    }

    public function __call($member, $arguments)
    {
        if(in_array($member, $this->supportedClasses))
        {
            return $this->_generator($member, $arguments[0]);
        } else {
            exit($member.'() IS UNDEFINED');
        }
    }

    private function _generator($objType, $objLabel)
    {
        if(is_string($objLabel) && $objLabel != '')
        {
            $objStorage = lcfirst($objType) . 's';

            if(isset(self::${$objStorage}[$objLabel]))
            {
                return self::${$objStorage}[$objLabel];
            } else {
                self::${$objStorage}[$objLabel] = new $objType($objLabel);
                return self::${$objStorage}[$objLabel];
            }
        } else {
            return new $objType();
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
//    public function configObj($type)
//    {
//        $configObjects = array(
//            'chartArea',
//            'date',
//            'legend',
//            'textStyle',
//            'tooltip'
//        );
//
//        if(in_array($type, $configObjects))
//        {
//            return new $type();
//        } else {
//            throw new Exception('Error, "'.$type.'" is not a valid config object');
//        }
//    } @TODO: Depreciated

    /**
     * When passed a label as a (string), this creates and stores a new DataTable
     * object within the Gcharts parent object and returns it.
     *
     * If already defined, it returns the corresponding labeled DataTable.
     *
     * If called with no argument, it just returns a new DataTable without storing
     * it within the parent object.
     *
     * @param string $dataTableLabel
     * @return \gcharts\DataTable
     */
//    public function DataTable($dataTableLabel)
//    {
//        if(is_string($dataTableLabel) && $dataTableLabel != '')
//        {
//            if(isset(self::$dataTables[$dataTableLabel]))
//            {
//                return self::$dataTables[$dataTableLabel];
//            } else {
//                self::$dataTables[$dataTableLabel] = new DataTable();
//                return self::$dataTables[$dataTableLabel];
//            }
//        } else {
//            return new DataTable();
//        }
//    } //@TODO:DEPRECIATED

    /**
     * LineChart Object
     *
     * When passed a label as a (string), this creates and stores a new LineChart
     * object within the Gcharts parent object and returns it.
     *
     * If already defined, it returns the corresponding labeled LineChart.
     *
     * If called with no argument, it just returns a new LineChart without storing
     * it within the parent object.
     *
     * @param string $lineChartLabel
     * @return \charts\LineChart
     */
//    public function LineChart1($lineChartLabel)
//    {
//        if(is_string($lineChartLabel) && $lineChartLabel != '')
//        {
//            if(isset(self::$lineCharts[$lineChartLabel]))
//            {
//                return self::$lineCharts[$lineChartLabel];
//            } else {
//                self::$lineCharts[$lineChartLabel] = new LineChart($lineChartLabel);
//                return self::$lineCharts[$lineChartLabel];
//            }
//        } else {
//            return new LineChart();
//        }
//    }//@TODO:DEPRECIATED

    /**
     * AreaChart Object
     *
     * When passed a label as a (string), this creates and stores a new AreaChart
     * object within the Gcharts parent object and returns it.
     *
     * If already defined, it returns the corresponding labeled AreaChart.
     *
     * If called with no argument, it just returns a new AreaChart without storing
     * it within the parent object.
     *
     * @param string $areaChartLabel
     * @return \charts\AreaChart
     */
//    public function AreaChart1($areaChartLabel)
//    {
//        if(is_string($areaChartLabel) && $areaChartLabel != '')
//        {
//            if(isset(self::$areaCharts[$areaChartLabel]))
//            {
//                return self::$areaCharts[$areaChartLabel];
//            } else {
//                self::$areaCharts[$areaChartLabel] = new LineChart($areaChartLabel);
//                return self::$areaCharts[$areaChartLabel];
//            }
//        } else {
//            return new AreaChart();
//        }
//    }//@TODO:DEPRECIATED

    /**
     * Returns the Javascript block to place in the page
     *
     * @return string javascript blocks
     */
    public function getOutput()
    {
        return self::$output;
    }

    /**
     * Builds a div html element for a chart to be rendered into.
     *
     * Passing two (int)s will set the width and height respectivly and the div
     * ID will be set via the string given in the outputInto() function.
     *
     * Passing a (string) and two (int)s will set div's ID, and set the width
     * and height respectivly
     *
     *
     * This is useful for the AnnotatedTimeLine Chart since it MUST have explicitly
     * defined dimensions of the div it is rendered into.
     *
     * The other charts do not require height and width, but do require an ID of
     * the div that will be receiving the chart.
     *
     * @return string HTML div element
     */
    // @TODO: Fix up this function
    public function div()//string $elementID = '', int $width = 960, int $height = 540)
    {
        $format = '<div id="%s" style="width:%spx;height:%spx;"></div>';
        $args = array();

        for($i = 0; $i < func_num_args(); $i++)
        {
            $args[$i] = func_get_arg($i);
        }

        switch(func_num_args())
        {
            case 0:
                if(isset(self::$elementID))
                {
                    return sprintf($format, self::$elementID, 1280, 720);
                } else {
                    //error, not set
                }
            break;

            case 2:
                if(is_int($args[0]) && is_int($args[1]))
                {
                    if(isset(self::$elementID))
                    {
                        return sprintf($format, self::$elementID, $width, $height);
                    } else {
                        //error, not set
                    }
                } else {
                    // invalid params, int int
                }
            break;

            case 3:
                if(is_string($args[0]) && is_int($args[1]) && is_int($args[2]))
                {
                    return sprintf($format, $args[0], $args[1], $args[2]);
                } else {
                    // invalid params, string int int
                }
            break;

            default:
                if(func_num_args() > 3)
                {
                    //TOO MANY
                }

                if(func_num_args() == 1)
                {
                    //NOT ENOUGH
                }
            break;
        }
    }

    static function _set_error($where, $what)
    {
        self::$hasError = TRUE;
        self::$errorLog[$where] = $what;
    }

    public function hasErrors()
    {
        return self::$hasError = TRUE;
    }

    static function getErrors()
    {
        if(count(self::$errorLog) > 0 && self::$hasError === TRUE)
        {
            $errors = '';

            foreach(self::$errorLog as $where => $error)
            {
                $errors .= self::$config->errorPrepend;
                $errors .= '['.$where.'] -> '.$error;
                $errors .= self::$config->errorAppend;
            }

            return $errors;
        } else {
            return 'No Errors.';
        }
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
    static function _build_script_block($chart)
    {
        self::$elementID = $chart->elementID;

        $out = self::$googleAPI.PHP_EOL;

        if(isset($chart->events) && is_array($chart->events) && count($chart->events) > 0)
        {
            $out .= self::_build_event_callbacks($chart->chartType, $chart->events);
        }

        $out .= self::$jsOpen.PHP_EOL;

        if($chart->elementID == NULL)
        {
            $out .= 'alert("Error calling '.$chart->chartType.'(\''.$chart->chartLabel.'\')->outputInto(), requires a valid html elementID.");'.PHP_EOL;
        }

        if(isset($chart->data) === FALSE && isset(self::$dataTables[$chart->dataTable]) === FALSE)
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
            $out .= sprintf($format, $data, self::$dataTableVersion).PHP_EOL;
        }
        if(isset(self::$dataTables[$chart->dataTable]))
        {
            $data = self::$dataTables[$chart->dataTable];
            $format = 'var data = new google.visualization.DataTable(%s, %s);';
            $out .= sprintf($format, $data->toJSON(), self::$dataTableVersion).PHP_EOL;
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

        $out .= self::$jsClose.PHP_EOL;

        self::$output = $out;

        return self::$output;
    }

    /**
     * Builds the javascript object for the event callbacks
     *
     * @return string Javascript code block
     * @throws Exception file not found
     */
    static function _build_event_callbacks($chartType, $chartEvents)
    {
        $script = sprintf('if(typeof %s !== "object") { %s = {}; }', $chartType, $chartType).PHP_EOL.PHP_EOL;

        foreach($chartEvents as $event)
        {
             $script .= sprintf('%s.%s = function(event) {', $chartType, $event).PHP_EOL;

             $callback = self::$callbackPath.$chartType.'.'.$event.'.js';
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
        $tmp = self::$jsOpen.PHP_EOL;
        $tmp .= $script;
        $tmp .= self::$jsClose.PHP_EOL;

        return $tmp;
    }

    private function _init_config()
    {

    }
}

/* End of file Gcharts.php */
/* Location: ./Gcharts.php */
