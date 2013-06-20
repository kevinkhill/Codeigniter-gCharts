<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Data Cell Object
 *
 * Holds the information for a data point
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

class DataCell
{
    var $v;
    var $f;
    var $p;

    /**
     * Defines a DataCell
     *
     * @param type $v The cell value
     * @param type $f A string version of the v value
     * @param type $p An object that is a map of custom values applied to the cell
     */
    public function __construct($v = NULL, $f = NULL, $p = NULL)
    {
        $this->v = $v;
        $this->f = $f;

        if(gettype($p) == 'array')
        {
            $vals = array();
            foreach($p as $k => $v)
            {
                $vals[$k] = $v;
            }
            $this->p = $vals;
        } else {
            $this->p = $p;
        }

        return $this;
    }

    public function toJSON()
    {
        $output = array();

        if($this->v != NULL) { $output['v'] = $this->v; }
        if($this->f != NULL) { $output['f'] = $this->f; }
        if($this->p != NULL) { $output['p'] = $this->p; }

        return json_encode($output);
    }
}

/* End of file DataCell.php */
/* Location: ./application/libraries/gcharts/DataCell.php */
