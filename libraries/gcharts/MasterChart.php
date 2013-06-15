<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Master Chart Class
 *
 * The is the base for all the charts, holding the data and configuration options
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

class MasterChart extends Gcharts
{
    var $chartType;
    var $chartLabel;
//    var $dataTableLabel;
    var $data;
    var $options;
    var $output;

    var $jsonData;
    var $jsonOptions;

    public function __construct($chartType, $chartLabel)
    {
        $this->chartType = $chartType;
        $this->chartLabel = $chartLabel;
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
     * Takes an array of values or a DataTable object and adds them to the
     * charts as data points to plot once the chart is rendered.
     *
     * @param mixed $data
     * @return \Gcharts
     * @throws Exception
     */
    public function addData($data)
    {
        switch(gettype($data))
        {
            case 'object':
                if(get_class($data) == 'DataTable')
                {
                    $this->data = $data;
                } else {
                    throw new Exception('Invalid data, must be (object) type DataTable');
                }
            break;

//            case 'array':
//                array_push($this->data, $data);
//            break;

            case 'string':
//                var_dump($this->dataTables[$data]);
                if(isset($this->dataTables[$data]))
                {
                    $this->data = $this->dataTables[$data];
                } else {
                    throw new Exception('Invalid DataTable label, there is no DataTable defined as "'.$data.'"');
                }
            break;

            default:
                throw new Exception('Invalid data, must be (object) type DataTable or (array)');
            break;
        }

        return $this;
    }
//
//    public function useDataTable($dataTableLabel)
//    {
//        if(get_class(parent::DataTable($dataTableLabel)) == 'DataTable')
//        {
//            $this->data = parent::DataTable($dataTableLabel);
//        } else {
//            throw new Exception('Invalid DataTable label, there is no DataTable defined as "'.$dataTableLabel.'"');
//        }
//    }

    /**
     * Encodes the object into JSON notation.
     *
     * @return string JSON encoded string
     */
    public function toJSON()
    {
        return json_encode($this);
    }

    public function _setDataTable($dataTableLabel)
    {
        return parent::_setDataTable($dataTableLabel);
    }

}

/* End of file Gcharts.php */
/* Location: ./application/libraries/Gcharts.php */