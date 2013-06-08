<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backgroundColor extends configOptions
{
    var $stroke;
    var $strokeWidth;
    var $fill;

    public function __construct($options = array()) {

        $this->options = array('stroke', 'fill', 'strokeWidth');

        if(is_array($options) && count($options) > 1)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    if($option == 'strokeWidth')
                    {
                        $this->$option = $this->_valid_int($value);
                    } else {
                        $this->$option = $value;
                    }
                }
            }
        }

        return $this;
    }

    /**
     * The color of the chart border, as an HTML color string.
     * 
     * @param string HTML color string
     * @return \backgroundColor
     */
    public function stroke($stroke)
    {
        if(is_string($stroke))
        {
            $this->stroke = $stroke;
        } else {
            $this->stroke = '#666';
        }

        return $this;
    }

    /**
     * The border width, in pixels.
     * 
     * @param int,string width
     * @return \backgroundColor
     */
    public function strokeWidth($strokeWidth)
    {
        if(is_int($strokeWidth) || is_string($strokeWidth))
        {
            $this->strokeWidth = $this->_valid_int($strokeWidth);
        } else {
            $this->strokeWidth = 0;
        }

        return $this;
    }

    /**
     * The chart fill color, as an HTML color string.
     * 
     * @param string HTML color string
     * @return \backgroundColor
     */
    public function fill($fill)
    {
        if(is_string($fill))
        {
            $this->fill = $fill;
        } else {
            $this->fill = 'white';
        }

        return $this;
    }
    
}

/* End of file Gcharts.php */
/* Location: ./application/libraries/gcharts/backgroundColor.php */