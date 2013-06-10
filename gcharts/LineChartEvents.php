<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Line Chart Events Object
 *
 * Holds javscript event callbacks for the LineChart
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

class LineChartEvents
{
    var $animationFinish;
    var $error;
    var $onMouseOver;
    var $onMouseOut;
    var $ready;
    var $select;

    public function __construct()
    {

    }

    /**
     * Animation Finish Callback
     *
     * Fired when transition animation is complete.
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function animationFinish($callback)
    {

    }

    /**
     * Error Callback
     *
     * Fired when an error occurs when attempting to render the chart.
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function error($callback)
    {

    }

    /**
     * MouseOver Callback
     *
     * Fired when the user mouses over a visual entity. Passes back the row and
     * column indices of the corresponding data table element. A point or
     * annotation correlates to a cell in the data table, a legend entry to a
     * column (row index is null), and a category to a row (column index is null).
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function onMouseOver($callback)
    {

    }

    /**
     * MouseOut Callback
     *
     * Fired when the user mouses away from a visual entity. Passes back the
     * row and column indices of the corresponding data table element. A point
     * or annotation correlates to a cell in the data table, a legend entry to
     * a column (row index is null), and a category to a row (column index is null).
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function onMouseOut($callback)
    {

    }

    /**
     * Ready Callback
     *
     * The chart is ready for external method calls. If you want to interact
     * with the chart, and call methods after you draw it, you should set up a
     * listener for this event before you call the draw method, and call them
     * only after the event was fired.
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function ready($callback)
    {

    }

    /**
     * Select Callback
     *
     * Fired when the user clicks a visual entity. To learn what has been
     * selected, call getSelection().
     *
     * @param string $callback Javscript function name
     * @return \LineChartEvents
     */
    public function select($callback)
    {

    }


/*
    Name -> Properties

    animationfinish -> None
    error -> id, message
    onmouseover -> row, column
    onmouseout -> row, column
    ready -> None
    select -> none
*/


}

?>
