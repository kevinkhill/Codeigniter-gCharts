<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Horizontal Axis Properties Object
 *
 * An object containing all the values for the hAxis which can be
 * passed into the chart's options
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

class hAxis extends configOptions
{
    var $baseline;
    var $baselineColor;
    var $direction;
    var $format;
    var $gridlines;
    var $minorGridlines;
    var $minorGridlinesColor;
    var $minorGridlinesCount;
    var $logScale;
    var $textPosition;
    var $textStyle;
    var $title;
    var $titleTextStyle;
    var $allowContainerBoundaryTextCufoff;
    var $slantedText;
    var $slantedTextAngle;
    var $maxAlternation;
    var $maxTextLines;
    var $minTextSpacing;
    var $showTextEvery;
    var $maxValue;
    var $minValue;
    var $viewWindowMode;
    var $viewWindow;
    var $viewWindowMax;
    var $viewWindowMin;

    /**
     * hAxis Object
     *
     * Stores all the information about the horizontal axis. All options can be
     * set either by passing an array with associative values for option =>
     * value, or by chaining together the functions once an object has been
     * created.
     *
     * @param array $options
     */
    public function __construct($options = array())
    {
        $this->options = array(
            'baseline',
            'baselineColor',
            'direction',
            'format',
            'gridlines',
            'gridlinesColor',
            'gridlinesCount',
            'minorGridlines',
            'minorGridlinesColor',
            'minorGridlinesCount',
            'logScale',
            'textPosition',
            'textStyle',
            'title',
            'titleTextStyle',
            'allowContainerBoundaryTextCufoff',
            'slantedText',
            'slantedTextAngle',
            'maxAlternation',
            'maxTextLines',
            'minTextSpacing',
            'showTextEvery',
            'maxValue',
            'minValue',
            'viewWindowMode',
            'viewWindow',
            'viewWindowMax',
            'viewWindowMin'
        );

        if(is_array($options) && count($options) > 0)
        {
            foreach($options as $option => $value)
            {
                if(in_array($option, $this->options))
                {
                    $this->$option($value);
                }
            }
        }
    }

    /**
     * Horizontal Axis Baseline Position
     *
     * The baseline for the horizontal axis.
     *
     * This option is only supported for a continuous axis.
     *
     * @param mixed $baseline
     * @return \hAxis
     */
    public function baseline($baseline)
    {
        if(valid_int($baseline))
        {
            $this->baseline = $baseline;
        }

        return $this;
    }

    /**
     * Horizontal Axis Baseline Color
     *
     * The color of the baseline for the horizontal axis.
     *
     * Can be any HTML color string, for example: 'red' or '#00cc00'.
     * This option is only supported for a continuous axis.
     *
     * @param string $color
     * @return \hAxis
     */
    public function baselineColor($color)
    {
        if(is_string($color))
        {
            $this->baselineColor = $color;
        } else {
            $this->baselineColor = 'black';
        }

        return $this;
    }

    /**
     * Horizontal Axis Text Direction
     *
     * The direction in which the values along the horizontal axis grow.
     * Specify -1 to reverse the order of the values.
     *
     * @param int $direction
     * @return \hAxis
     */
    public function direction($direction)
    {
        if($direction == 1 || $direction == -1)
        {
            $this->direction = $direction;
        } else {
            $this->direction = 1;
        }

        return $this;
    }

    /**
     * Horizontal Axis Text Formatting
     *
     * For number axis labels, this is a subset of the decimal formatting ICU
     * pattern set. For instance, {format:'#,###%'} will display values
     * "1,000%", "750%", and "50%" for values 10, 7.5, and 0.5.
     *
     * For date axis labels, this is a subset of the date formatting ICU pattern
     * set. For instance, {format:'MMM d, y'} will display the value
     * "Jul 1, 2011" for the date of July first in 2011.
     *
     * The actual formatting applied to the label is derived from the locale the
     * API has been loaded with. For more details, see loading charts with a
     * specific locale.
     *
     * This option is only supported for a continuous axis.
     *
     * @param string $format format string for numeric or date axis labels.
     * @return \hAxis
     */
    public function format($format)
    {
        if(is_string($format))
        {
            $this->format = $format;
        } else {
            $this->format = 'auto';
        }

        return $this;
    }

    /**
     * Horizontal Axis Major Gridlines
     *
     * An array with members to configure the gridlines on the horizontal axis.
     * To specify properties of this option, use an array, as shown here:
     *
     * array('color' => '#333', 'count' => 4);
     *
     * This option is only supported for a continuous axis.
     *
     * @param array $gridlines
     * @return \hAxis
     */
    public function gridlines($gridlines)
    {
        $tmp = array();

        if(is_array($gridlines))
        {
            if(array_key_exists('count', $gridlines) &&
                    $gridlines['count'] >= 2 ||
                    $gridlines['count'] == -1
            ) {
                $tmp['count'] = $gridlines['count'];
            } else {
                $tmp['count'] = 5;
            }

            if(array_key_exists('color', $gridlines))
            {
                $tmp['color'] = $gridlines['color'];
            } else {
                $tmp['color'] = '#CCC';
            }

            $this->gridlines = $tmp;
        } else {
            $this->gridlines = NULL;
        }

        return $this;
    }

    /**
     * Horizontal Axis Minor Gridlines
     *
     * An array with members to configure the minor gridlines on the horizontal
     * axis, similar to the gridlines option.
     *
     * 'color' - The color of the horizontal minor gridlines inside the chart
     * area. Specify a valid HTML color string.
     * 'count' - The number of horizontal minor gridlines between two regular
     * gridlines.
     *
     * This option is only supported for a continuous axis.
     *
     * @param array $minorGridlines
     * @return \hAxis
     */
    public function minorGridlines($minorGridlines)
    {
       $tmp = array();

        if(is_array($minorGridlines))
        {
            if(array_key_exists('count', $minorGridlines) &&
                    $minorGridlines['count'] >= 2 ||
                    $minorGridlines['count'] == -1
            ) {
                $tmp['count'] = $minorGridlines['count'];
            } else {
                $tmp['count'] = 0;
            }

            if(array_key_exists('color', $minorGridlines))
            {
                $tmp['color'] = $minorGridlines['color'];
            }

            $this->minorGridlines = $tmp;
        } else {
            $this->minorGridlines = NULL;
        }

        return $this;
    }

    /**
     * Horizontal Axis Scaling
     *
     * hAxis property that makes the horizontal axis a logarithmic scale
     * (requires all values to be positive). Set to [ TRUE | FALSE ].
     *
     * This option is only supported for a continuous axis.
     *
     * @param boolean $log
     * @return \hAxis
     */
    public function logScale($log)
    {
        if(is_bool($log))
        {
            $this->logScale = $log;
        } else {
            $this->logScale = FALSE;
        }

        return $this;
    }

    /**
     * Horizontal Axis Text Position
     *
     * Position of the horizontal axis text, relative to the chart area.
     * Supported values: 'out', 'in', 'none'.
     *
     * @param string $position
     * @return \hAxis
     */
    public function textPosition($position)
    {
        $values = array(
            'out',
            'in',
            'none'
        );

        if(in_array($position, $values))
        {
            $this->textPosition = $position;
        } else {
            $this->textPosition = 'out';
        }

        return $this;
    }

    /**
     * Horizontal Axis Text Style
     *
     * This function takes a textStyle object, created via "new textStyle();"
     *
     * @param textStyle $textStyle
     * @return \hAxis
     */
    public function textStyle(textStyle $textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            throw new Exception('Invalid textStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * Horizontal Axis Title
     *
     * hAxis property that specifies the title of the horizontal axis.
     *
     * @param string $title
     * @return \hAxis
     */
    public function title($title)
    {
        if(is_string($title))
        {
            $this->title = $title;
        } else {
            $this->title = NULL;
        }

        return $this;
    }

    /**
     * Horizontal Axis Text Style
     *
     * An object that specifies the horizontal axis title text style.
     *
     * @param textStyle $titleTextStyle
     * @return \hAxis
     * @throws Exception
     */
    public function titleTextStyle(textStyle $titleTextStyle)
    {
        if(is_a($titleTextStyle, 'textStyle'))
        {
            $this->textStyle = $titleTextStyle->values();
        } else {
            throw new Exception('Invalid titleTextStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * Horizontal Axis Label Cutoff
     *
     * If false, will hide outermost labels rather than allow them to be
     * cropped by the chart container. If true, will allow label cropping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param type $cutoff
     * @return \hAxis
     */
    public function allowContainerBoundaryTextCufoff($cutoff)
    {
        if(is_bool($cutoff))
        {
            $this->allowContainerBoundaryTextCufoff = $cutoff;
        } else {
            $this->allowContainerBoundaryTextCufoff = FALSE;
        }

        return $this;
    }

    public function slantedText()
    {

    }

    public function slantedTextAngle()
    {

    }

    public function maxAlternation()
    {

    }

    public function maxTextLines()
    {

    }

    public function minTextSpacing()
    {

    }

    public function showTextEvery()
    {

    }

    public function maxValue()
    {

    }

    public function minValue()
    {

    }

    public function viewWindowMode()
    {

    }

    public function viewWindow()
    {

    }

    public function viewWindowMax()
    {

    }

    public function viewWindowMin()
    {

    }

}

/* End of file hAxis.php */
/* Location: ./gcharts/configs/hAxis.php */
