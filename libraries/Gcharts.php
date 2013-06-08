<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter gCharts Library
 *
 * An open source library to extend the power of google charts into CI
 * for PHP 5.3 or newer
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

    public static $googleAPI = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';

    /**
     * Loads the required classes from the gcharts folder for the library to 
     * work.
     */
    public function __construct()
    {
        spl_autoload_register(function($class) {
            include 'gcharts/' . $class . '.php';
        });
    }

    /**
     * Creates a new LineChart object within the gcharts library.
     *
     * @param array horizontal and line titles
     * @return object gchart
     */
    public function LineChart($options = array())
    {
        $this->LineChart = new LineChart($options);
        return $this->LineChart;
    }
    
    /**
     * Creates a new AreaChart object within the gcharts library.
     *
     * @param array horizontal and line titles
     * @return object gchart
     */    
    public function AreaChart($options = array())
    {
        $this->AreaChart = new AreaChart($options);
        return $this->AreaChart;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

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

    public function addData($data)
    {
        array_push($this->data, $data);

        return $this;
    }


//    public function PieChart($options = array())
//    {
//        return new PieChart($options);
//    }

    /**
     * Builds the javascript block for the actual chart and passes it back to 
     * output function of the calling chart object.
     *
     * @param string type of chart to display
     * @return string javascript code block
     */
    public function _build_script_block($className)
    {
        $this->output = '<script type="text/javascript">'.PHP_EOL;
        $this->output .= "google.load('visualization', '1', {'packages':['corechart']});".PHP_EOL;
        $this->output .= "google.setOnLoadCallback(drawChart);".PHP_EOL;
        $this->output .= "function drawChart() {".PHP_EOL;
        $this->output .= "var data = new google.visualization.arrayToDataTable(".$this->jsonData.");".PHP_EOL;
        $this->output .= "var options = ".$this->jsonOptions.";".PHP_EOL;
        $this->output .= "var chart = new google.visualization.".$className."(document.getElementById('".$this->elementID."'));".PHP_EOL;
        $this->output .= "chart.draw(data,options);".PHP_EOL."}".PHP_EOL;
        $this->output .= '</script>'.PHP_EOL;

        return $this->output;        
    }
    
    /**
     * Takes an array of values and ouputs them as a string between
     * brackets and separated by a pipe.
     * 
     * @param array default values
     * @return string contains array values
     */
    public function _array_string($array)
    {
        $tmp = '[ ';

        foreach($array as $k => $v)
        {
            $tmp .= $v . ' | ';
        }

        return substr_replace($tmp, "", -1) . ' ]';
    }
    
}

/* End of file Gcharts.php */
/* Location: ./application/libraries/Gcharts.php */