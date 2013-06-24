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
    var $allowContainerBoundaryTextCutoff;
    var $slantedText;
    var $slantedTextAngle;
    var $maxAlternation;
    var $maxTextLines;
    var $minTextSpacing;
    var $showTextEvery;

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
        array_merge($this->options, array(
            'allowContainerBoundaryTextCutoff',
            'slantedText',
            'slantedTextAngle',
            'maxAlternation',
            'maxTextLines',
            'minTextSpacing',
            'showTextEvery',
        ));

        return parent::__construct($options);
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

}

/* End of file hAxis.php */
/* Location: ./gcharts/configs/hAxis.php */
