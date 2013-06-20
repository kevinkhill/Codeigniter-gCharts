<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PieChart Object
 *
 * Holds all the configuration for the PieChart
 *
 *
 * NOTICE OF LICENSE
 *
 * This file is part of CodeIgniter gCharts.
 * CodeIgniter gCharts is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * CodeIgniter gCharts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CodeIgniter gCharts.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts Github Page
 * @license http://www.gnu.org/licenses/gpl.html GPL-V3
 *
 */
class PieChart
{
    var $chartType = NULL;
    var $chartLabel = NULL;
    var $dataTable = NULL;

    var $data = NULL;
    var $options = NULL;
    var $events = NULL;
    var $elementID = NULL;

    public function __construct($chartLabel)
    {
        $this->chartType = get_class($this);
        $this->chartLabel = $chartLabel;
        $this->options = array();
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
            Gcharts::_set_error(get_class($this), 'Invalid axisTitlesPosition '.$this->_array_string($values));
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
