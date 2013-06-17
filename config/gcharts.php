<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Use this array to enable the use of specific charts. The currently supported
 * charts include:
 *
 * LineChart
 *
 * More coming soon!
 *
 */
    $config['autoloadCharts'] = array(
        'LineChart'
    );


/**
 * Enable the use of Global Text Styles for the charts.
 *
 * TRUE - Will use the array below to define all text in the charts.
 * FALSE - Will ignore the array below and use google's default vaules
 *
 */
    $config['useGlobalTextStyle'] = FALSE;


/**
 * Use this array to define the default textStyle for any chart created by gcharts
 *
 * 'color' - Any HTML color string, for example: 'red' or '#00cc00'
 * 'fontName' - The default font face for all text in the chart.
 * 'fontSize' - The default font size, in pixels, of all text in the chart.
 *
 */
    $config['globalTextStyle'] = array(
        'color' => 'black',
        'fontName' => 'Arial',
        'fontSize' => 12
    );