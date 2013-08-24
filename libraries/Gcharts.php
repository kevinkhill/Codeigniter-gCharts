<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter gCharts Library
 *
 * An open source library to extend the power of Google Charts into CodeIgniter
 * for PHP 5.3+
 *
 *
 * NOTICE OF LICENSE
 *
 * Copyright (c) 2013, Kevin Hill of KHill Designs
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 *
 * You should have received a copy of the MIT License along with CodeIgniter-gCharts.
 * If not, see <http://opensource.org/licenses/MIT>.
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class Gcharts
{
    /**
     * Holds the configuration values from /config/gcharts.php
     *
     * @var array
     */
    static $config = array();

    /**
     * Property defining if the library is being ran within CodeIgniter or not.
     *
     * @todo Will implement this feature in the future.
     * @var boolean
     */
    static $ignited = TRUE;

    /**
     * Holds all the html and javscript to be output into the browser.
     *
     * @var string
     */
    static $output = NULL;

    /**
     * The ID of the HTML element that will be receiving the chart.
     *
     * @var string
     */
    static $elementID = NULL;

    /**
     * The base path where the library is installed.
     *
     * @var string
     */
    static $masterPath = NULL;

    /**
     * The path where the config files are located, relative to the masterPath.
     *
     * @var string
     */
    static $configPath = NULL;

    /**
     * The path where the chart files are located, relative to the masterPath.
     *
     * @var string
     */
    static $chartPath = NULL;

    /**
     * The path where the callback javascript files are located, relative to
     * the masterPath.
     *
     * @var string
     */
    static $callbackPath = NULL;

    /**
     * Version of Google's DataTable.
     *
     * @var string
     */
    static $dataTableVersion = '0.6';

    /**
     * Opening Javascript tag.
     *
     * @var string
     */
    static $jsOpen = '<script type="text/javascript">';

    /**
     * Closing Javascript tag.
     *
     * @var string
     */
    static $jsClose = '</script>';

    /**
     * Javscript block with a link to Google's Chart API.
     *
     * @var string
     */
    static $googleAPI = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';

    /**
     * Property defining if the generation of charts occured any errors.
     *
     * @var boolean
     */
    static $hasError = FALSE;

    /**
     * Array containing the list of errors.
     *
     * @var array
     */
    static $errorLog = array();

    /**
     * Holds all of the defined DataTables.
     *
     * @var array
     */
    static $dataTables = array();

    /**
     * Holds all of the defined Charts.
     *
     * @var array
     */
    static $lineCharts   = array();
    static $areaCharts   = array();
    static $pieCharts    = array();
    static $donutCharts  = array();
    static $columnCharts = array();
    static $geoCharts    = array();

    /**
     * Currently supported types of charts that can be created.
     * Used by the magic __call function to prevent errors.
     *
     * @var array
     */
    private $supportedClasses = array(
        'DataTable',
        'LineChart',
        'AreaChart',
        'PieChart',
        'DonutChart',
        'ColumnChart',
        'GeoChart'
    );

    /**
     * Holds all of the defined configuration class names.
     *
     * @var array
     */
    private $configClasses = array(
        'configOptions',
        'Axis',
//        'DataCell',
        'backgroundColor',
        'chartArea',
        'colorAxis',
        'hAxis',
        'jsDate',
        'legend',
        'magnifyingGlass',
        'textStyle',
        'tooltip',
        'sizeAxis',
        'slice',
        'vAxis'
    );


    /**
     * Loads everything needed for the library to work.
     */
    public function __construct()
    {
        $CI = get_instance();
        $CI->load->config('gcharts');
        $CI->load->helper('gcharts');

        self::$masterPath = realpath(dirname(__FILE__)).'/gcharts/';
        self::$configPath = self::$masterPath.'configs/';
        self::$chartPath = self::$masterPath.'charts/';
        self::$callbackPath = self::$masterPath.'callbacks/';

// @TODO: build this functionality
//        self::$ignited = (defined('CI_VERSION') ? TRUE : FALSE);
//        <LOGIC FOR IF CI LIBRARY OR NOT>

        self::$config['autoloadCharts'] = config_item('autoloadCharts');
        self::$config['errorPrepend'] = config_item('errorPrepend');
        self::$config['errorAppend'] = config_item('errorAppend');

// @TODO: build this functionality
//        self::$config['useGlobalTextStyle'] = config_item('useGlobalTextStyle');
//        self::$config['globalTextStyle'] = config_item('globalTextStyle');

        //Load Chart Base and DataTable Class
        require_once(self::$chartPath.'Chart.php');
        require_once(self::$configPath.'DataTable.php');

        //Autoload Chart Classes
        if(is_array(self::$config['autoloadCharts']))
        {
            foreach(self::$config['autoloadCharts'] as $chart)
            {
                if(in_array($chart, $this->supportedClasses))
                {
                    if($chart == 'DonutChart')
                    {
                        require_once(self::$chartPath.'PieChart.php');
                    }

                    require_once(self::$chartPath.$chart.'.php');
                } else {
                    self::_set_error(__METHOD__, $chart.' is not a valid chart and was not loaded.');
                }
            }
        } else {
            self::_set_error(__METHOD__, 'Config value autoloadCharts must be type (array)');
        }

        //Load Config Classes
        foreach($this->configClasses as $configClass)
        {
            require_once(self::$configPath.$configClass.'.php');
        }
    }

    /**
     * Magic function to reduce repetitive coding and create aliases.
     *
     * This is never called directly.
     *
     * @param string Name of method
     * @param array Passed arguments
     * @return object Returns Charts, DataTables, and Config Objects
     */
    public function __call($member, $arguments)
    {
        if(in_array($member, $this->configClasses))
        {
            return $this->_config_object_factory($member, empty($arguments[0]) ? array() : $arguments);
        } else {
            if(in_array($member, $this->supportedClasses))
            {
                return $this->_chart_and_table_factory($member, empty($arguments[0]) ? '' : $arguments[0]);
            } else {
                exit(get_class($this).'::'.$member.'() IS UNDEFINED');
            }
        }
    }

    /**
     * Creates and stores Chart/DataTable
     *
     * If there is no label, then the Chart/DataTable is just returned.
     * If there is a label, the Chart/DataTable is stored within the Gcharts
     * objects in an array, accessable via a call to the type of object, with
     * the label as the paramater.
     *
     * @access private
     * @param string Which type of object to generate.
     * @param string Label applied to generated object.
     * @return mixed Returns Charts or DataTables
     */
    private function _chart_and_table_factory($objType, $objLabel)
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
     * Creates configuration objects to save a step instansiating and allow for
     * chaining directly from creation.
     *
     * @access private
     * @param string $configObject
     * @return object configuration object
     */
    private function _config_object_factory($configObject, $options)
    {
        if(in_array($configObject, $this->configClasses))
        {
            if($configObject == 'jsDate')
            {
                $jsDate = new jsDate();
                return $jsDate->parseArray($options);
            } else {
                if(empty($options[0]))
                {
                    return new $configObject();
                } else {
                    return new $configObject($options[0]);
                }
            }
        } else {
            exit('['.__METHOD__.'()] -> '.$configObject.' is not a valid configObject');
        }
    }

    /**
     * Loads a specified chart manually.
     *
     * @param string Name of chart to load.
     */
    public function load($chartName)
    {
        if(file_exists(self::$chartPath.$chartName.'.php'))
        {
            if($chartName == 'DonutChart')
            {
                require_once(self::$chartPath.'PieChart.php');
            }
            require_once(self::$chartPath.$chartName.'.php');
        } else {
            $this->_set_error(__METHOD__, 'Invalid Chart, could not load "'.self::$chartPath.$chartName.'.php"');
        }
    }

    /**
     * Returns the Javascript block to place in the page manually.
     *
     * @return string Javascript code blocks.
     */
    public function getOutput()
    {
        return self::$output;
    }

    /**
     * Builds a div html element for a chart to be rendered into.
     *
     * Calling with no arguments will return a div with the ID set to what was
     * given to the outputInto() function.
     *
     * Passing two (int)s will set the width and height respectivly and the div
     * ID will be set via the string given in the outputInto() function.
     *
     *
     * This is useful for the AnnotatedTimeLine Chart since it MUST have explicitly
     * defined dimensions of the div it is rendered into.
     *
     * The other charts do not require height and width, but do require an ID of
     * the div that will be receiving the chart.
     *
     * @param int Width of the containing div (optional).
     * @param int Height of the containing div (optional).
     * @return string HTML div element.
     */
    public function div($width = 0, $height = 0)
    {
        if($width == 0 || $height == 0)
        {
            if(isset(self::$elementID))
            {
                return sprintf('<div id="%s"></div>', self::$elementID);
            } else {
                $this->_set_error(__METHOD__, 'Error, output element ID is not set.');
            }
        } else {
            if((is_int($width) && $width > 0) && (is_int($height) && $height > 0))
            {
                if(isset(self::$elementID))
                {
                    $format = '<div id="%s" style="width:%spx;height:%spx;"></div>';
                    return sprintf($format, self::$elementID, $width, $height);
                } else {
                    $this->_set_error(__METHOD__, 'Error, output element ID is not set.');
                }
            } else {
                $this->_set_error(__METHOD__, 'Invalid div width & height, must be type (int) > 0');
            }
        }
    }

    /**
     * Checks if any errors have occured.
     *
     * @return boolean TRUE if any errors we created while building charts,
     * otherwise FALSE.
     */
    static function hasErrors()
    {
        return self::$hasError;
    }

    /**
     * Gets the error messages.
     *
     * Each error message is wrapped in the HTML element defined within the
     * configuration for gcharts.
     *
     * @return mixed NULL if there are no errors, otherwise a string with the
     * errors
     */
    static function getErrors()
    {
        if(count(self::$errorLog) > 0 && self::$hasError === TRUE)
        {
            $errors = '';

            foreach(self::$errorLog as $where => $error)
            {
                $errors .= self::$config['errorPrepend'];
                $errors .= '['.$where.'] -> '.$error;
                $errors .= self::$config['errorAppend'];
            }

            return $errors;
        } else {
            return NULL;
        }
    }

    /**
     * Sets an error message.
     *
     * @param string Where the error occured.
     * @param string What the error was.
     */
    static function _set_error($where, $what)
    {
        self::$hasError = TRUE;
        self::$errorLog[$where] = $what;
    }

    /**
     * Builds the Javascript code block
     *
     * This will build the script block for the actual chart and passes it
     * back to output function of the calling chart object. If there are any
     * events defined, they will be automatically be attached to the chart and
     * pulled from the callbacks folder.
     *
     * @param string Passed from the calling chart.
     * @return string Javascript code block.
     */
    static function _build_script_block($chart)
    {
        self::$elementID = $chart->elementID;

        $out = self::$googleAPI.PHP_EOL;

//        if(isset($chart->events) && is_array($chart->events) && count($chart->events) > 0)
//        {
//            $out .= self::_build_event_callbacks($chart->chartType, $chart->events);
//        }

        $out .= self::$jsOpen.PHP_EOL;

        if($chart->elementID == NULL)
        {
            $out .= 'alert("Error calling '.$chart->chartType.'(\''.$chart->chartLabel.'\')->outputInto(), requires a valid html elementID.");'.PHP_EOL;
        }

        if(isset($chart->data) === FALSE && isset(self::$dataTables[$chart->dataTable]) === FALSE)
        {
            $out .= 'alert("No DataTable has been defined for '.$chart->chartType.'(\''.$chart->chartLabel.'\').");'.PHP_EOL;
        }

        switch($chart->chartType)
        {
            case 'AnnotatedTimeLine':
                $vizType = 'annotatedtimeline';
            break;

            case 'GeoChart':
                $vizType = 'geochart';
            break;

            default:
                $vizType = 'corechart';
            break;
        }

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

        $out .= "var options = ".$chart->optionsToJSON().";".PHP_EOL;
        $out .= "var chart = new google.visualization.".$chart->chartType;
            $out .= sprintf("(document.getElementById('%s'));", $chart->elementID).PHP_EOL;
        $out .= "chart.draw(data, options);".PHP_EOL;

//        if(isset($chart->events) && count($chart->events) > 0)
//        {
//            foreach($chart->events as $event)
//            {
//                $out .= sprintf('google.visualization.events.addListener(chart, "%s", ', $event);
//                $out .= sprintf('function(event) { %s.%s(event); });', $chart->chartType, $event).PHP_EOL;
//            }
//        }

        $out .= "}".PHP_EOL;

        $out .= self::$jsClose.PHP_EOL;

        self::$output = $out;

        return self::$output;
    }

    /**
     * Builds the javascript object for the event callbacks.
     *
     * @param string Chart type.
     * @param array Array of events to apply to the chart.
     * @return string Javascript code block.
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
                 self::_set_error(__METHOD__, 'Error loading javascript file, in '.$callback.'.js');
             }

             $script .= "};".PHP_EOL;
        }

        $tmp = self::$jsOpen.PHP_EOL;
        $tmp .= $script;
        $tmp .= self::$jsClose.PHP_EOL;

        return $tmp;
    }

}

/* End of file Gcharts.php */
/* Location: ./Gcharts.php */
