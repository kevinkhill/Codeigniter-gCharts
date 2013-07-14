<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description Object
 *
 * Defines the specifics for columns of data in a DataTable.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
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
