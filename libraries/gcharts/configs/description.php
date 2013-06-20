<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description Object
 *
 * Holds all the data for charts
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

class description
{
    var $type = NULL;
    var $label = NULL;
    var $id = NULL;
    var $role = NULL;
    var $pattern = NULL;

    public function __construct($type, $label = '', $id = '', $role = '', $pattern = '')
    {
        $values = array(
            'string',
            'number',
            'boolean',
            'date',
            'datetime',
            'timeofday'
        );

        if(is_array($options) && count($options) > 1)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    $this->$option = $this->_valid_int_or_percent($value);
                }
            }
        }

        return $this;
    }

}

/* End of file description.php */
/* Location: ./gcharts/configs/description.php */
