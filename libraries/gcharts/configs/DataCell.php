<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Data Cell Object
 *
 * Holds the information for a data point
 *
 *
 * NOTICE OF LICENSE
 *
 * You should have received a copy of the MIT License along with this project.
 * If not, see <http://opensource.org/licenses/MIT>.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
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

        if(is_array($p))
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
