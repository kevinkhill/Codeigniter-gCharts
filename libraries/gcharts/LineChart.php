<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LineChart extends Gcharts
{
    var $title;
    var $elementID;

    public function __construct($labels) {
        parent::__construct();

        $this->setOptions(array());

        if(is_array($labels) && count($labels) > 1)
        {
            $tmp = array();
            foreach($labels as $label)
            {
                array_push($tmp, (string) $label);
            }

            $this->data[] = $tmp;
        } else {
            throw new Exception('Invalid labels, must have count > 1 and type (string) array("horizontal axis label", "first line label")');
            //$this->data[] = array();
        }

        return $this;
    }


    public function width($width)
    {
        if(is_int($width))
        {
            $this->addOption(array('width' => $width));
            return $this;
        } else {
            throw new Exception('Invalid width, must be (int)');
        }
    }

    public function height($height)
    {
        if(is_int($height))
        {
            $this->addOption(array('height' => $height));
            return $this;
        } else {
            throw new Exception('Invalid height, must be (int)');
        }
    }

    public function curveType($curveType = 'none')
    {
        $values = array('none', 'function');

        if(in_array($curveType, $values))
        {
            $this->addOption(array('curveType' => (string) $curveType));
            return $this;
        } else {
            throw new Exception('Invalid curveType, must be (string) '.$this->_array_string($values));
        }
    }

    public function title($title = '')
    {
        $this->addOption(array('title' => (string) $title));

        return $this;
    }

    public function titlePosition($position)
    {
        $values = array('in', 'out', 'none');

        if(in_array($position, $values))
        {
            $this->addOption(array('axisTitlesPosition' => $position));
            return $this;
        } else {
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.$this->_array_string($values));
        }
    }

    public function titleTextStyle($textStyleObj)
    {
        if(is_a($textStyleObj, 'textStyle'))
        {
            $this->addOption(array('titleTextStyle' => $textStyleObj->values()));
            return $this;
        } else {
            throw new Exception('Invalid titleTextStyle, must be (object) type textStyle');
        }
    }

    public function lineWidth($width = 2)
    {
        if(is_int($width))
        {
            $this->addOption(array('lineWidth' => $width));
            return $this;
        } else {
            throw new Exception('Invalid lineWidth, must be (int)');
        }
    }

    public function pointSize($size = 0)
    {
        if(is_int($size))
        {
            $this->addOption(array('pointSize' => $size));
            return $this;
        } else {
            throw new Exception('Invalid pointSize, must be (int)');
        }
    }

    public function output($elementID = '')
    {
        $this->elementID = $elementID;
        $this->jsonData = json_encode($this->data);
        $this->jsonOptions = json_encode($this->options);

        $this->output = static::$jsOpen.PHP_EOL;
        $this->output .= "google.load('visualization', '1', {'packages':['corechart']});".PHP_EOL;
        $this->output .= "google.setOnLoadCallback(drawChart);".PHP_EOL;
        $this->output .= "function drawChart() {".PHP_EOL;
        $this->output .= "var data = new google.visualization.arrayToDataTable(";
        $this->output .= $this->jsonData;
        $this->output .= ");".PHP_EOL;
        $this->output .= "var options = ".$this->jsonOptions.";".PHP_EOL;
        $this->output .= "var chart = new google.visualization.LineChart(document.getElementById('".$this->elementID."'));".PHP_EOL;
        $this->output .= "chart.draw(data,options);".PHP_EOL."}".PHP_EOL;
        $this->output .= static::$jsClose.PHP_EOL;

        return $this->output;
    }


//////////////////////////////////////////////
// PRIVATE METHODS
//////////////////////////////////////////////

    private function _array_string($array)
    {
        $tmp = '[ ';

        foreach($array as $k => $v)
        {
            $tmp .= $v . ' | ';
        }

        return substr_replace($tmp, "", -1) . ' ]';
    }

}

/* End of file LineChart.php */
/* Location: ./application/libraries/gcharts/LineChart.php */