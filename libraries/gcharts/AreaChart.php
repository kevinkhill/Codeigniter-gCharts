<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AreaChart extends Gcharts
{
    var $data;
    var $jsonData;
    var $options;
    var $jsonOptions;
    var $chartType;
    var $javascript;
    var $html;
    
    public function __construct($data, $options) {
        parent::__construct('AreaChart');
        parent::setData($data);
        parent::setOptions($options);

        return $this;
    }

    public function addOption($option)
    {
        parent::addOption($option);
    }

    public function addData($data)
    {
        parent::addData($data);
    }

    public function chartTitle($title = '')
    {
        parent::addOption(array('title' => $title));
    }

    public function hAxisTitle($title = '')
    {
        parent::addOption(array('hAxisTitle' => $title));
    }

    public function axisTitlesPosition($position)
    {
        $values = array('in', 'out', 'none');

        if(in_array($position, $values))
        {
            parent::addOption(array('axisTitlesPosition' => $position));
            return $this;
        } else {
            throw new Exception('Invalid axisTitlesPosition '.$this->_array_string($values));
        }
    }


//////////////////////////////////////////////
// PRIVATE METHODS
//////////////////////////////////////////////

    private function _array_string($array)
    {
        $tmp = '[';

        foreach($array as $k => $v)
        {
            $tmp .= $v . '|';
        }

        return substr_replace($tmp, "", -1) . ']';
    }
}

/* End of file LineChart.php */
/* Location: ./application/libraries/gcharts/LineChart.php */