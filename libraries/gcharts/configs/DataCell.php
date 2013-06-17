<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Data Cell Object
 *
 * Holds the information for a data point
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