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
    private $baseline;
    var $baselineColor = 'black';
    var $direction = 1;
    var $format;
    var $gridlines;
    var $minorGridlines;
    var $logScale = FALSE;
    var $textPosition = 'out';
    var $textStyle;
    var $title = NULL;
    var $titleTextStyle;
    var $allowContainerBoundaryTextCufoff = FALSE;
    var $slantedText;
    var $slantedTextAngle = 30;
    var $maxAlternation = 2;
    var $maxTextLines;
    var $minTextSpacing;
    var $showTextEvery;
    var $maxValue;
    var $minValue;
    var $viewWindowMode = NULL;
    var $viewWindow = NULL;

    /**
     * hAxis Object
     *
     * Stores all the information about the horizontal axis. All options can be
     * set either by passing an array with associative values for option =>
     * value, or by chaining together the functions once an object has been
     * created.
     *
     * @param array $options
     * @return \hAxis
     */
    public function __construct($options = array())
    {
        $this->options = array(
            'baseline',
            'baselineColor',
            'direction',
            'format',
            'gridlines',
            'minorGridlines',
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
            'viewWindow'
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

        return $this;
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
            if(array_key_exists('count', $gridlines))
            {
                if($gridlines['count'] >= 2 || $gridlines['count'] == -1)
                {
                    $tmp['count'] = $gridlines['count'];
                } else {
                    $tmp['count'] = 5;
                }
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
            $this->titleTextStyle = $titleTextStyle->values();
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
     * @param boolean $cutoff
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

    /**
     * Horizontal Axis Label Slant
     *
     * If true, draw the horizontal axis text at an angle, to help fit more text
     * along the axis; if false, draw horizontal axis text upright. Default
     * behavior is to slant text if it cannot all fit when drawn upright.
     * Notice that this option is available only when the $this->textPosition is
     * set to 'out' (which is the default).
     *
     * This option is only supported for a discrete axis.
     *
     * @param boolean $slant
     * @return \hAxis
     */
    public function slantedText($slant)
    {
        if(is_bool($slant) && $this->textPosition == 'out')
        {
            $this->slantedText = $slant;
        } else {
            $this->slantedText = FALSE;
        }

        return $this;
    }

    /**
     * Horizontal Axis Label Slant Angle
     *
     * The angle of the horizontal axis text, if it's drawn slanted. Ignored if
     * hAxis.slantedText is false, or is in auto mode, and the chart decided to
     * draw the text horizontally.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $angle
     * @return \hAxis
     */
    public function slantedTextAngle($angle)
    {
        if(valid_int($angle) && $angle >= 1 && $angle <= 90)
        {
            $this->slantedTextAngle = $angle;
        } else {
            $this->slantedTextAngle = 30;
        }

        return $this;
    }

    /**
     * Horizontal Axis Max Alternation
     *
     * Maximum number of levels of horizontal axis text. If axis text labels
     * become too crowded, the server might shift neighboring labels up or down
     * in order to fit labels closer together. This value specifies the most
     * number of levels to use; the server can use fewer levels, if labels can
     * fit without overlapping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $alternation
     * @return \hAxis
     */
    public function maxAlternation($alternation)
    {
        if(valid_int($alternation))
        {
            $this->maxAlternation = $alternation;
        } else {
            $this->maxAlternation = 2;
        }

        return $this;
    }

    /**
     * Maximum number of lines allowed for the text labels. Labels can span
     * multiple lines if they are too long, and the nuber of lines is, by
     * default, limited by the height of the available space.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $maxTextLines
     * @return \hAxis
     */
    public function maxTextLines($maxTextLines)
    {
        if(valid_int($maxTextLines))
        {
            $this->maxTextLines = $maxTextLines;
        } else {
            $this->maxTextLines = NULL;
        }

        return $this;
    }

    /**
     * Minimum horizontal spacing, in pixels, allowed between two adjacent text
     * labels. If the labels are spaced too densely, or they are too long,
     * the spacing can drop below this threshold, and in this case one of the
     * label-unclutter measures will be applied (e.g, truncating the lables or
     * dropping some of them).
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $minTextSpacing
     * @return \hAxis
     */
    public function minTextSpacing($minTextSpacing)
    {
        if(valid_int($minTextSpacing))
        {
            $this->minTextSpacing = $minTextSpacing;
        } else {
            if(isset($this->textStyle['fontSize']))
            {
                $this->minTextSpacing = $this->textStyle['fontSize'];
            } else {
                $this->minTextSpacing = 12;
            }
        }

        return $this;
    }

    /**
     * How many horizontal axis labels to show, where 1 means show every label,
     * 2 means show every other label, and so on. Default is to try to show as
     * many labels as possible without overlapping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $showTextEvery
     * @return \hAxis
     */
    public function showTextEvery($showTextEvery)
    {
        if(valid_int($showTextEvery))
        {
            $this->showTextEvery = $showTextEvery;
        } else {
            $this->showTextEvery = NULL;
        }

        return $this;
    }

    /**
     * hAxis property that specifies the highest horizontal axis grid line. The
     * actual grid line will be the greater of two values: the maxValue option
     * value, or the highest data value, rounded up to the next higher grid mark.
     *
     * This option is only supported for a continuous axis.
     *
     * @param int $max
     * @return \hAxis
     */
    public function maxValue($max)
    {
        if(valid_int($max))
        {
            $this->maxValue = $max;
        } else {
            $this->maxValue = NULL;
        }

        return $this;
    }

    /**
     * hAxis property that specifies the lowest horizontal axis grid line. The
     * actual grid line will be the lower of two values: the minValue option
     * value, or the lowest data value, rounded down to the next lower grid mark.
     *
     * This option is only supported for a continuous axis.
     *
     * @param int $min
     * @return \hAxis
     */
    public function minValue($min)
    {
        if(valid_int($min))
        {
            $this->minValue = $min;
        } else {
            $this->minValue = NULL;
        }

        return $this;
    }

    /**
     * Specifies how to scale the horizontal axis to render the values within
     * the chart area. The following string values are supported:
     *
     * 'pretty' - Scale the horizontal values so that the maximum and minimum
     * data values are rendered a bit inside the left and right of the chart area.
     * 'maximized' - Scale the horizontal values so that the maximum and minimum
     * data values touch the left and right of the chart area.
     * 'explicit' - Specify the left and right scale values of the chart area.
     * Data values outside these values will be cropped. You must specify an
     * hAxis.viewWindow array describing the maximum and minimum values to show.
     *
     * This option is only supported for a continuous axis.
     *
     * @param string $viewMode
     * @return \hAxis
     */
    public function viewWindowMode($viewMode)
    {
        $values = array(
            'pretty',
            'maximized',
            'explicit',
        );

        if(in_array($viewMode, $values))
        {
            $this->viewWindowMode = $viewMode;
        } else {
            if($this->viewWindow == NULL)
            {
                $this->viewWindowMode = 'pretty';
            } else {
                $this->viewWindowMode = 'explicit';
            }
        }

        return $this;
    }

    /**
     * Specifies the cropping range of the horizontal axis.
     *
     * For a continuous axis:
     * The minimum and maximum horizontal data value to render. Has an effect
     * only if $this->viewWindowMode = 'explicit'.
     *
     * For a discrete axis:
     * 'min' - The zero-based row index where the cropping window begins. Data
     * points at indices lower than this will be cropped out. In conjunction with
     * vAxis->viewWindow['max'], it defines a half-opened range (min, max)
     * that denotes the element indices to display. In other words, every index
     * such that min <= index < max will be displayed.
     *
     * 'max' - The zero-based row index where the cropping window ends. Data
     * points at this index and higher will be cropped out. In conjunction with
     * vAxis->viewWindow['min'], it defines a half-opened range (min, max)
     * that denotes the element indices to display. In other words, every index
     * such that min <= index < max will be displayed.
     *
     * @param array $viewWindow
     * @return \hAxis
     */
    public function viewWindow($viewWindow)
    {
        $tmp = array();

        if(is_array($viewWindow))
        {
            if(array_key_exists('min', $viewWindow) && array_key_exists('max', $viewWindow))
            {
                $tmp['viewWindowMin'] = $viewWindow['min'];
                $tmp['viewWindowMax'] = $viewWindow['max'];

                $this->viewWindowMode = 'explicit';
            } else {
                $tmp['viewWindowMin'] = NULL;
                $tmp['viewWindowMax'] = NULL;
            }

            $this->viewWindow = $tmp;
        }

        return $this;
    }

}

/* End of file hAxis.php */
/* Location: ./gcharts/configs/hAxis.php */
