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
        'LineChart',
        'AreaChart',
        'PieChart'
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
            require_once(self::$chartPath.'Chart.php');
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
     */
    public function load($chartName)
    {
        if(file_exists(self::$chartPath.$chartName.'.php'))
        {
            require_once(self::$chartPath.$chartName.'.php');
        } else {
            $this->_set_error(get_class($this), 'Invalid Chart, could not load "'.self::$chartPath.$chartName.'.php"');
        }
    }

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
     * @param int $width
     * @param int $height
     * @return string HTML div element
     */
    public function div($width = 0, $height = 0)
    {
        if($width == 0 && $height == 0)
        {
            if(isset(self::$elementID))
            {
                return sprintf('<div id="%s"></div>', self::$elementID);
            } else {
                $this->_set_error(get_class($this), 'Error, output element ID is not set.');
            }
        } else {
            if((is_int($width) && $width > 0) && (is_int($height) && $height > 0))
            {
                if(isset(self::$elementID))
                {
                    $format = '<div id="%s" style="width:%spx;height:%spx;"></div>';
                    return sprintf($format, self::$elementID, $width, $height);
                } else {
                    $this->_set_error(get_class($this), 'Error, output element ID is not set.');
                }
            } else {
                $this->_set_error(get_class($this), 'Invalid div width | height, must be type (int) > 0');
            }
        }
    }

    static function hasErrors()
    {
        return self::$hasError;
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
            return NULL;
        }
    }

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
                 self::_set_error(get_class($this), 'Error loading javascript file, in '.$callback.'.js');
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
