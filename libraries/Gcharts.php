<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gcharts
{
    var $data;
    var $options;
    var $output;

    var $jsonData;
    var $jsonOptions;

    public static $googleAPI = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
    public static $jsOpen = '<script type="text/javascript">';
    public static $jsClose = '</script>';

    public function __construct()
    {
        spl_autoload_register(function($class) {
            include 'gcharts/' . $class . '.php';
        });
    }

    public function googleAPI()
    {
        return static::$googleAPI;
    }

    public function LineChart($options = array())
    {
        if(isset($this->LineChart))
        {
            return $this->LineChart;
        } else {
            $this->LineChart = new LineChart($options);
            return $this;
        }
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

//    public function AreaChart($options = array())
//    {
//        return new AreaChart($options);
//    }
//
//    public function PieChart($options = array())
//    {
//        return new PieChart($options);
//    }

}

/* End of file Gcharts.php */
/* Location: ./application/libraries/Gcharts.php */