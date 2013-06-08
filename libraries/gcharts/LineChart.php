<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LineChart extends Gcharts
{
    var $width;
    var $height;
    var $curveType;
    var $title;
    var $titlePosition;
    var $titleTextStyle;
    var $lineWidth;
    var $pointSize;
    
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
            throw new Exception('Invalid labels, must have count > 1 and type (string) array("horizontal axis label", "first line label", "etc...")');
            //$this->data[] = array();
        }

        return $this;
    }

    /**
     * Where to place the axis titles, compared to the chart area. Supported values:
     * in - Draw the axis titles inside the the chart area.
     * out - Draw the axis titles outside the chart area.
     * none - Omit the axis titles.
     * 
     * @param string [ in | out | none ]
     * @return \LineChart
     * @throws Exception Invalid axisTitlesPosition
     */
    public function axisTitlesPosition($position)
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
    
    /**
     * Controls the curve of the lines when the line width is not zero. Can be one of the following:
     * 'none' - Straight lines without curve.
     * 'function' - The angles of the line will be smoothed.
     * 
     * @param string [ none | function ]
     * @return \LineChart
     * @throws Exception Invalid curveType
     */
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
            $this->addOption(array('titlePosition' => $position));
            return $this;
        } else {
            throw new Exception('Invalid axisTitlesPosition, must be (string) '.$this->_array_string($values));
        }
    }

    public function titleTextStyle(textStyle $textStyleObj)
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
    
    public function output($elementID = '')
    {
        $this->elementID = $elementID;
        $this->jsonData = json_encode($this->data);
        $this->jsonOptions = json_encode($this->options);
        
        return parent::_build_script_block(get_class($this));
    }

}

/* End of file LineChart.php */
/* Location: ./application/libraries/gcharts/LineChart.php */