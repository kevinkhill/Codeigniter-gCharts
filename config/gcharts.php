<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Auto Load Charts
|--------------------------------------------------------------------------
|
| Use this array to autoload the use of specific charts.
|
| If a chart is not listed in the array, then the chart must be loaded before use.
| This is done by using the $this->gcharts->load() function.
|
| The currently supported charts are:
| - LineChart
| - AreaChart
| - PieChart
| - DonutChart
| - ColumnChart (beta)
| - GeoChart (beta)
|
| - More coming soon!
|
| Autoload Example:
|  $config['autoloadCharts'] = array(
|     'LineChart',
|     'AreaChart',
|     'PieChart',
|     'ColumnChart'
|  );
*/
$config['autoloadCharts'] = array();


/*
|--------------------------------------------------------------------------
| Error Delimiters
|--------------------------------------------------------------------------
|
| When retrieving the errors from the error log, these will be use to wrap
| each error. Feel free to change to div's or span's, or apply a css class.
|
*/
$config['errorPrepend'] = '<p style="color:red;">';
$config['errorAppend'] = '</p>';

/*
|--------------------------------------------------------------------------
| Global Text Styles - Coming Soon!
|--------------------------------------------------------------------------
|
| Enable the use of Global Text Styles for the charts.
|
| TRUE - Will use the array below to define all text in the charts.
| FALSE - Will ignore the array below and use google's default vaules
|
| Use this array to define the default textStyle for any chart created by gcharts
|
| 'color' - Any HTML color string, for example: 'red' or '#00cc00'
| 'fontName' - The default font face for all text in the chart.
| 'fontSize' - The default font size, in pixels, of all text in the chart.
|
*/
//$config['useGlobalTextStyle'] = FALSE;
//$config['globalTextStyle'] = array(
//    'color' => 'black',
//    'fontName' => 'Arial',
//    'fontSize' => 12
//);