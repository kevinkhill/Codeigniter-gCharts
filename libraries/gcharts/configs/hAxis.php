<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Horizontal Axis Properties Object
 *
 * An object containing all the values for the axis which can be
 * passed into the chart's options
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

class hAxis extends Axis
{
    var $baseline;
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
    var $allowContainerBoundaryTextCutoff = FALSE;
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
     * Stores all the information about the horizontal axis. All options can be
     * set either by passing an array with associative values for option =>
     * value, or by chaining together the functions once an object has been
     * created.
     *
     * @param array $options
     * @return \axis
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

        return parent::__construct();
    }

    /**
     * The baseline for the axis.
     *
     * This option is only supported for a continuous axis.
     *
     * @param mixed $baseline
     * @return \axis
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
     * The color of the baseline for the axis.
     *
     * Can be any HTML color string, for example: 'red' or '#00cc00'.
     * This option is only supported for a continuous axis.
     *
     * @param string $color
     * @return \axis
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
     * The direction in which the values along the axis grow.
     * Specify -1 to reverse the order of the values.
     *
     * @param int $direction
     * @return \axis
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
     * @return \axis
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
     * An array with members to configure the gridlines on the axis.
     * To specify properties of this option, use an array, as shown here:
     *
     * array('color' => '#333', 'count' => 4);
     *
     * This option is only supported for a continuous axis.
     *
     * @param array $gridlines
     * @return \axis
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
     * An array with members to configure the minor gridlines on the horizontal
     * axis, similar to the gridlines option.
     *
     * 'color' - The color of the minor gridlines inside the chart
     * area. Specify a valid HTML color string.
     * 'count' - The number of minor gridlines between two regular
     * gridlines.
     *
     * This option is only supported for a continuous axis.
     *
     * @param array $minorGridlines
     * @return \axis
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
     * axis property that makes the axis a logarithmic scale
     * (requires all values to be positive). Set to [ TRUE | FALSE ].
     *
     * This option is only supported for a continuous axis.
     *
     * @param boolean $log
     * @return \axis
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
     * Position of the axis text, relative to the chart area.
     * Supported values: 'out', 'in', 'none'.
     *
     * @param string $position
     * @return \axis
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
     * This function takes a textStyle object, created via "new textStyle();"
     *
     * @param textStyle $textStyle
     * @return \axis
     */
    public function textStyle(textStyle $textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->textStyle = $textStyle->values();
        } else {
            Gcharts::_set_error(get_class($this), 'Invalid textStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * axis property that specifies the title of the axis.
     *
     * @param string $title
     * @return \axis
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
     * An object that specifies the axis title text style.
     *
     * @param textStyle $titleTextStyle
     * @return \axis
     * @throws Exception
     */
    public function titleTextStyle(textStyle $titleTextStyle)
    {
        if(is_a($titleTextStyle, 'textStyle'))
        {
            $this->titleTextStyle = $titleTextStyle->values();
        } else {
            Gcharts::_set_error(get_class($this), 'Invalid titleTextStyle, must be (object) type textStyle');
        }

        return $this;
    }

    /**
     * If false, will hide outermost labels rather than allow them to be
     * cropped by the chart container. If true, will allow label cropping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param boolean $cutoff
     * @return \axis
     */
    public function allowContainerBoundaryTextCutoff($cutoff)
    {
        if(is_bool($cutoff))
        {
            $this->allowContainerBoundaryTextCutoff = $cutoff;
        } else {
            $this->allowContainerBoundaryTextCutoff = FALSE;
        }

        return $this;
    }

    /**
     * If true, draw the axis text at an angle, to help fit more text
     * along the axis; if false, draw axis text upright. Default
     * behavior is to slant text if it cannot all fit when drawn upright.
     * Notice that this option is available only when the $this->textPosition is
     * set to 'out' (which is the default).
     *
     * This option is only supported for a discrete axis.
     *
     * @param boolean $slant
     * @return \axis
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
     * The angle of the axis text, if it's drawn slanted. Ignored if
     * axis.slantedText is false, or is in auto mode, and the chart decided to
     * draw the text horizontally.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $angle
     * @return \axis
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
     * Maximum number of levels of axis text. If axis text labels
     * become too crowded, the server might shift neighboring labels up or down
     * in order to fit labels closer together. This value specifies the most
     * number of levels to use; the server can use fewer levels, if labels can
     * fit without overlapping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $alternation
     * @return \axis
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
     * @return \axis
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
     * Minimum spacing, in pixels, allowed between two adjacent text
     * labels. If the labels are spaced too densely, or they are too long,
     * the spacing can drop below this threshold, and in this case one of the
     * label-unclutter measures will be applied (e.g, truncating the lables or
     * dropping some of them).
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $minTextSpacing
     * @return \axis
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
     * How many axis labels to show, where 1 means show every label,
     * 2 means show every other label, and so on. Default is to try to show as
     * many labels as possible without overlapping.
     *
     * This option is only supported for a discrete axis.
     *
     * @param int $showTextEvery
     * @return \axis
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
     * axis property that specifies the highest axis grid line. The
     * actual grid line will be the greater of two values: the maxValue option
     * value, or the highest data value, rounded up to the next higher grid mark.
     *
     * This option is only supported for a continuous axis.
     *
     * @param int $max
     * @return \axis
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
     * axis property that specifies the lowest axis grid line. The
     * actual grid line will be the lower of two values: the minValue option
     * value, or the lowest data value, rounded down to the next lower grid mark.
     *
     * This option is only supported for a continuous axis.
     *
     * @param int $min
     * @return \axis
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
     * Specifies how to scale the axis to render the values within
     * the chart area. The following string values are supported:
     *
     * 'pretty' - Scale the values so that the maximum and minimum
     * data values are rendered a bit inside the left and right of the chart area.
     * 'maximized' - Scale the values so that the maximum and minimum
     * data values touch the left and right of the chart area.
     * 'explicit' - Specify the left and right scale values of the chart area.
     * Data values outside these values will be cropped. You must specify an
     * axis.viewWindow array describing the maximum and minimum values to show.
     *
     * This option is only supported for a continuous axis.
     *
     * @param string $viewMode
     * @return \axis
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
     * Specifies the cropping range of the axis.
     *
     * For a continuous axis:
     * The minimum and maximum data value to render. Has an effect
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
     * @return \axis
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

/* End of file axis.php */
/* Location: ./gcharts/configs/axis.php */
