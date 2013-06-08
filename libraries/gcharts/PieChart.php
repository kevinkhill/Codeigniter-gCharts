<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PieChart Object
 *
 * Holds all the configuration for the PieChart
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

class PieChart extends Gcharts
{
    public function __construct($data, $options) {
        parent::__construct('LineChart');
        parent::setData($data);
        parent::setOptions($options);

        return $this;
    }

    public function hAxisTitle($title = '')
    {
        $this->addOption(array('hAxisTitle' => $title));
    }

    public function axisTitlesPosition($position)
    {
        $values = array('in', 'out', 'none');

        if(in_array($position, $values))
        {
            array('axisTitlesPosition' => $position);
        } else {
            throw new Exception('Invalid axisTitlesPosition '.$this->_array_string($values));
        }

        return $this;
    }


//////////////////////////////////////////////
// PRIVATE METHODS
//////////////////////////////////////////////

    private function _array_string($array)
    {
        $tmp = '[';

        foreach ($values as $value)
        {
            $tmp .= $value . '|';
        }

        return rtrim('|', $tmp) . ']';
    }
}

/* End of file LineChart.php */
/* Location: ./application/libraries/gcharts/LineChart.php */