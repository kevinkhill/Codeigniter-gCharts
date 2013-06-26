<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PieChart Object
 *
 * Holds all the configuration for the PieChart
 *
 * Rows: Each row in the table represents a slice.
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

class PieChart extends Chart
{
    public function __construct($chartLabel)
    {
        parent::__construct($chartLabel);

        $this->defaults = array_merge($this->defaults, array(
            'is3D',
//            'slices',
            'pieSliceBorderColor',
            'pieSliceText',
            'pieSliceTextStyle',
            'reverseCategories',
            'sliceVisibilityThreshold',
            'pieResidueSliceColor',
            'pieResidueSliceLabel',
        ));
    }

    /**
     * If set to true, displays a three-dimensional chart.
     *
     * @param boolean $is3D
     * @return \charts\PieChart
     */
    public function is3D($is3D)
    {
        if(is_bool($is3D))
        {
            $this->addOption(array('is3D' => $is3D));
        } else {
            $this->error('Invalid value for is3D, must be type (boolean).');
        }

        return $this;
    }

    public function slices()
    {

    }

    /**
     * The color of the slice borders. Only applicable when the chart is two-dimensional.
     *
     * @param string $pieSliceBorderColor
     * @return \charts\PieChart
     */
    public function pieSliceBorderColor($pieSliceBorderColor)
    {
        if(is_string($pieSliceBorderColor))
        {
            $this->addOption(array('pieSliceBorderColor' => $pieSliceBorderColor));
        } else {
            $this->error('Invalid value for pieSliceBorderColor, must be type (string).');
        }

        return $this;
    }

    /**
     * The content of the text displayed on the slice. Can be one of the following:
     *
     * 'percentage' - The percentage of the slice size out of the total.
     * 'value' - The quantitative value of the slice.
     * 'label' - The name of the slice.
     * 'none' - No text is displayed.
     *
     * @param string $pieSliceText
     * @return \charts\PieChart
     */
    public function pieSliceText($pieSliceText)
    {
        $values = array(
            'percentage',
            'value',
            'label',
            'none'
        );

        if(in_array($pieSliceText, $values))
        {
            $this->addOption(array('pieSliceText' => $pieSliceText));
        } else {
            $this->error('Invalid value for pieSliceText, must be type (string) '.$this->_array_string($values));
        }

        return $this;
    }

    /**
     * An object that specifies the slice text style. create a new textStyle()
     * object, set the values then pass it to this function or to the constructor.
     *
     * @param textStyle $textStyle
     * @return \charts\PieChart
     */
    public function pieSliceTextStyle($textStyle)
    {
        if(is_a($textStyle, 'textStyle'))
        {
            $this->addOption(array('pieSliceTextStyle' => $textStyle));
        } else {
            $this->error('Invalid value for textStyle, must be an object type (textStyle).');
        }

        return $this;
    }

    /**
     * If set to true, will draw slices counterclockwise. The default is to
     * draw clockwise.
     *
     * @param boolean $reverseCategories
     * @return \charts\PieChart
     */
    public function reverseCategories($reverseCategories)
    {
        if(is_bool($reverseCategories))
        {
            $this->addOption(array('reverseCategories' => $reverseCategories));
        } else {
            $this->error('Invalid value for reverseCategories, must be type (boolean).');
        }
    }

    /**
     * The slice relative part, below which a slice will not show individually.
     * All slices that have not passed this threshold will be combined to a
     * single slice, whose size is the sum of all their sizes. Default is not
     * to show individually any slice which is smaller than half a degree.
     *
     * @param numeric $sliceVisibilityThreshold
     * @return \charts\PieChart
     */
    public function sliceVisibilityThreshold($sliceVisibilityThreshold)
    {
        if(is_numeric($sliceVisibilityThreshold))
        {
            $this->addOption(array('sliceVisibilityThreshold' => $sliceVisibilityThreshold));
        } else {
            $this->error('Invalid value for sliceVisibilityThreshold, must be (numeric).');
        }
    }

    /**
     * Color for the combination slice that holds all slices below
     * sliceVisibilityThreshold.
     *
     * @param type $pieResidueSliceColor
     * @return \charts\PieChart
     */
    public function pieResidueSliceColor($pieResidueSliceColor)
    {
        if(is_string($pieResidueSliceColor))
        {
            $this->addOption(array('pieResidueSliceColor' => $pieResidueSliceColor));
        } else {
            $this->error('Invalid value for pieResidueSliceColor, must be a valid HTML color type (string).');
        }
    }

    /**
     * A label for the combination slice that holds all slices below
     * sliceVisibilityThreshold.
     *
     * @param string $pieResidueSliceLabel
     * @return \charts\PieChart
     */
    public function pieResidueSliceLabel($pieResidueSliceLabel)
    {
        if(is_string($pieResidueSliceLabel))
        {
            $this->addOption(array('pieResidueSliceLabel' => $pieResidueSliceLabel));
        } else {
            $this->error('Invalid value for pieResidueSliceLabel, must be type (string).');
        }
    }

}

/* End of file PieChart.php */
/* Location: ./gcharts/charts/PieChart.php */
