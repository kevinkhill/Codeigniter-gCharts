<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Data Table Object
 *
 * Holds all the data for charts
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

class DataTable
{

    public function __construct()
    {

    }

    public function addColumn($type, $opt_label, $opt_id)
    {

    }

//    public function addColumn($description_object)
//    {
//
//    }

    public function addRow($opt_cellArray)
    {

    }

    public function addRows($numOrArray)
    {

    }

    public function __clone()
    {

    }

    public function getColumnId($columnIndex)
    {

    }

    public function getColumnLabel($columnIndex)
    {

    }

    public function getColumnPattern($columnIndex)
    {

    }

    public function getColumnProperty($columnIndex, $name)
    {

    }

    public function getColumnRange($columnIndex)
    {

    }

    public function getColumnRole($columnIndex)
    {

    }

    public function getColumnType($columnIndex)
    {

    }

    public function getDistinctValues($columnIndex)
    {

    }

    public function getFilteredRows($filters)
    {

    }

    public function getFormattedValue($rowIndex, $columnIndex)
    {

    }

    public function getNumberOfColumns()
    {

    }

    public function getNumberOfRows()
    {

    }

    public function getProperties($rowIndex, $columnIndex)
    {

    }

    public function getProperty($rowIndex, $columnIndex, $name)
    {

    }

    public function getRowProperties($rowIndex)
    {

    }

    public function getRowProperty($rowIndex, $name)
    {

    }

    public function getSortedRows($sortColumns)
    {

    }

    public function getTableProperties()
    {

    }

    public function getTableProperty($name)
    {

    }

    public function getValue($rowIndex, $columnIndex)
    {

    }

    public function insertColumn($columnIndex, $type, $label='', $id='')
    {

    }

    public function insertRows($rowIndex, $numberOrArray)
    {

    }

    public function removeColumn($columnIndex)
    {

    }

    public function removeColumns($columnIndex, $numberOfColumns)
    {

    }

    public function removeRow($rowIndex)
    {

    }

    public function removeRows($rowIndex, $numberOfRows)
    {

    }

    public function setCell($rowIndex, $columnIndex, $value='', $formattedValue='', $properties='')
    {

    }

    public function setColumnLabel($columnIndex, $label)
    {

    }

    public function setColumnProperty($columnIndex, $name, $value)
    {

    }

    public function setColumnProperties($columnIndex, $properties)
    {

    }

    public function setFormattedValue($rowIndex, $columnIndex, $formattedValue)
    {

    }

    public function setProperty($rowIndex, $columnIndex, $name, $value)
    {

    }

    public function setProperties($rowIndex, $columnIndex, $properties)
    {

    }

    public function setRowProperty($rowIndex, $name, $value)
    {

    }

    public function setRowProperties($rowIndex, $properties)
    {

    }

    public function setTableProperty($name, $value)
    {

    }

    public function setTableProperties($properties)
    {

    }

    public function setValue($rowIndex, $columnIndex, $value)
    {

    }

    public function sort($sortColumns)
    {

    }

    public function toJSON()
    {
        return json_encode($this);
    }

}

/* End of file DataTable.php */
/* Location: ./application/libraries/gcharts/DataTable.php */