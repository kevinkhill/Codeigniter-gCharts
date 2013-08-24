<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * GeoChart Class
 *
 * A Geochart is a map of a country, a continent, or a region with two modes:
 * - The region mode colorizes whole regions, such as countries, provinces,
 *   or states.
 * - The marker mode marks designated regions using bubbles that are scaled
 *   according to a value that you specify.
 *
 *
 * @author Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2013, KHill Designs
 * @link https://github.com/kevinkhill/Codeigniter-gCharts GitHub Repository Page
 * @link http://kevinkhill.github.io/Codeigniter-gCharts/ GitHub Project Page
 * @license http://opensource.org/licenses/MIT MIT
 */

class GeoChart extends Chart
{
    public function __construct($chartLabel)
    {
        parent::__construct($chartLabel);

        $this->defaults = array_merge($this->defaults, array(
            'colorAxis',
            'datalessRegionColor',
            'displayMode',
            'enableRegionInteractivity',
            'keepAspectRatio',
            'region',
            'magnifyingGlass',
            'markerOpacity',
            'resolution',
            'sizeAxis'
        ));
    }

    /**
     * An object that specifies a mapping between color column values and colors
     * or a gradient scale.
     *
     * @param colorAxis $colorAxis
     * @return \GeoChart
     */
    public function colorAxis($colorAxis)
    {
        if(is_a($colorAxis, 'colorAxis'))
        {
            $this->addOption($colorAxis);
        } else {
            $this->type_error(__FUNCTION__, 'colorAxis');
        }

        return $this;
    }

    /**
     * Color to assign to regions with no associated data.
     *
     * @param string $datalessRegionColor
     * @return \GeoChart
     */
    public function datalessRegionColor($datalessRegionColor)
    {
        if(is_string($datalessRegionColor) && ! empty($datalessRegionColor))
        {
            $this->addOption(array('datalessRegionColor' => $datalessRegionColor));
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    /**
     * Which type of map this is. The DataTable format must match the value specified. The following values are supported:
     *
     * 'auto' - Choose based on the format of the DataTable.
     * 'regions' - This is a region map
     * 'markers' - This is a marker map
     *
     * @param string $displayMode
     * @return \GeoChart
     */
    public function displayMode($displayMode)
    {
        $values = array(
            'auto',
            'regions',
            'markers',
        );

        if(in_array($displayMode, $values))
        {
            $this->addOption(array('displayMode' => $displayMode));
        } else {
            $this->type_error(__FUNCTION__, 'string', 'with a value of '.array_string($values));
        }

        return $this;
    }

    /**
     * If true, enable region interactivity, including focus and tool-tip
     * elaboration on mouse hover, and region selection and firing of
     * regionClick and select events on mouse click.
     *
     * The default is true in region mode, and false in marker mode.
     *
     * @param type $enableRegionInteractivity
     * @return \GeoChart
     */
    public function enableRegionInteractivity($enableRegionInteractivity)
    {
        if(is_bool($enableRegionInteractivity))
        {
            $this->addOption(array('enableRegionInteractivity' => $enableRegionInteractivity));
        } else {
            $this->type_error(__FUNCTION__, 'boolean');
        }

        return $this;
    }

    /**
     * If true, the map will be drawn at the largest size that can fit inside
     * the chart area at its natural aspect ratio. If only one of the width
     * and height options is specified, the other one will be calculated
     * according to the aspect ratio.
     *
     * If false, the map will be stretched to the exact size of the chart as
     * specified by the width and height options.
     *
     * @param boolean $keepAspectRatio
     * @return \GeoChart
     */
    public function keepAspectRatio($keepAspectRatio)
    {
        if(is_bool($keepAspectRatio))
        {
            $this->addOption(array('keepAspectRatio' => $keepAspectRatio));
        } else {
            $this->type_error(__FUNCTION__, 'boolean');
        }

        return $this;
    }

    /**
     * The area to display on the map. (Surrounding areas will be displayed
     * as well.) Can be one of the following:
     *
     * 'world' - A map of the entire world.
     * A continent or a sub-continent, specified by its 3-digit code, e.g., '011' for Western Africa.
     * A country, specified by its ISO 3166-1 alpha-2 code, e.g., 'AU' for Australia.
     * A state in the United States, specified by its ISO 3166-2:US code, e.g., 'US-AL' for Alabama. Note that the resolution option must be set to either 'provinces' or 'metros'.
     *
     * @param type $region
     * @return \GeoChart
     */
    public function region($region)
    {
        if(is_string($region))
        {
            if($this->_regionCodeSearch($region) !== FALSE)
            {
                $this->addOption(array('region' => $this->_regionCodeSearch($region)));
            } else {
                $this->type_error(__FUNCTION__, 'region code', '"'.$region.'" was not found');
            }
        } else {
            $this->type_error(__FUNCTION__, 'string');
        }

        return $this;
    }

    public function magnifyingGlass($magnifyingGlass)
    {

    }

    public function markerOpacity($markerOpacity)
    {

    }

    /**
     * The resolution of the map borders. Choose one of the following values:
     *
     * 'countries' - Supported for all regions, except for US state regions.
     * 'provinces' - Supported only for country regions and US state regions.
     *               Not supported for all countries; please test a country to
     *               see whether this option is supported.
     * 'metros' - Supported for the US country region and US state regions only.
     *
     * @param string $resolution
     * @return \GeoChart
     */
    public function resolution($resolution)
    {
        $values = array(
            'countries',
            'provinces',
            'metros',
        );

        if(in_array($resolution, $values))
        {
            $this->addOption(array('resolution' => $$resolution));
        } else {
            $this->type_error(__FUNCTION__, 'string', 'with a value of '.array_string($values));
        }

        return $this;
    }

    public function sizeAxis($sizeAxis)
    {

    }

    private function _regionCodeSearch($region)
    {
        $regionCodes = array(
            'africa' => '002',
                'north africa'    => '015',
                'northern africa' => '015',
                    'DZ' => '015',
                    'EG' => '015',
                    'EH' => '015',
                    'LY' => '015',
                    'MA' => '015',
                    'SD' => '015',
                    'TN' => '015',
                'west africa'    => '015',
                'western africa' => '015',
                    'BF' => '011',
                    'BJ' => '011',
                    'CI' => '011',
                    'CV' => '011',
                    'GH' => '011',
                    'GM' => '011',
                    'GN' => '011',
                    'GW' => '011',
                    'LR' => '011',
                    'ML' => '011',
                    'MR' => '011',
                    'NE' => '011',
                    'NG' => '011',
                    'SH' => '011',
                    'SL' => '011',
                    'SN' => '011',
                    'TG' => '011',
                'central africa' => '015',
                'middle africa'  => '015',
                    'AO' => '017',
                    'CD' => '017',
                    'ZR' => '017',
                    'CF' => '017',
                    'CG' => '017',
                    'CM' => '017',
                    'GA' => '017',
                    'GQ' => '017',
                    'ST' => '017',
                    'TD' => '017',
                'east africa'    => '014',
                'eastern africa' => '014',
                    'BI' => '014',
                    'DJ' => '014',
                    'ER' => '014',
                    'ET' => '014',
                    'KE' => '014',
                    'KM' => '014',
                    'MG' => '014',
                    'MU' => '014',
                    'MW' => '014',
                    'MZ' => '014',
                    'RE' => '014',
                    'RW' => '014',
                    'SC' => '014',
                    'SO' => '014',
                    'TZ' => '014',
                    'UG' => '014',
                    'YT' => '014',
                    'ZM' => '014',
                    'ZW' => '014',
                'south africa'    => '018',
                'southern africa' => '018',
                    'BW' => '018',
                    'LS' => '018',
                    'NA' => '018',
                    'SZ' => '018',
                    'ZA' => '018',
            'europe' => '150',
                'north europe'    => '154',
                'northern europe' => '154',
                    'GG' => '154',
                    'JE' => '154',
                    'AX' => '154',
                    'DK' => '154',
                    'EE' => '154',
                    'FI' => '154',
                    'FO' => '154',
                    'GB' => '154',
                    'IE' => '154',
                    'IM' => '154',
                    'IS' => '154',
                    'LT' => '154',
                    'LV' => '154',
                    'NO' => '154',
                    'SE' => '154',
                    'SJ' => '154',
                'west europe'    => '155',
                'western europe' => '155',
                    'AT' => '155',
                    'BE' => '155',
                    'CH' => '155',
                    'DE' => '155',
                    'DD' => '155',
                    'FR' => '155',
                    'FX' => '155',
                    'LI' => '155',
                    'LU' => '155',
                    'MC' => '155',
                    'NL' => '155',
                'east europe'    => '151',
                'eastern europe' => '151',
                    'BG' => '155',
                    'BY' => '155',
                    'CZ' => '155',
                    'HU' => '155',
                    'MD' => '155',
                    'PL' => '155',
                    'RO' => '155',
                    'RU' => '155',
                    'SU' => '155',
                    'SK' => '155',
                    'UA' => '155',
                'south europe'    => '039',
                'southern europe' => '039',
                    'AD' => '039',
                    'AL' => '039',
                    'BA' => '039',
                    'ES' => '039',
                    'GI' => '039',
                    'GR' => '039',
                    'HR' => '039',
                    'IT' => '039',
                    'ME' => '039',
                    'MK' => '039',
                    'MT' => '039',
                    'CS' => '039',
                    'RS' => '039',
                    'PT' => '039',
                    'SI' => '039',
                    'SM' => '039',
                    'VA' => '039',
                    'YU' => '039',
            'americas' => '019',
                'north america'    => '021',
                'northern america' => '021',
                    'BM' => '021',
                    'CA' => '021',
                    'GL' => '021',
                    'PM' => '021',
                    'US' => '021',
                'caribbean' => '029',
                    'AG' => '029',
                    'AI' => '029',
                    'AN' => '029',
                    'AW' => '029',
                    'BB' => '029',
                    'BL' => '029',
                    'BS' => '029',
                    'CU' => '029',
                    'DM' => '029',
                    'DO' => '029',
                    'GD' => '029',
                    'GP' => '029',
                    'HT' => '029',
                    'JM' => '029',
                    'KN' => '029',
                    'KY' => '029',
                    'LC' => '029',
                    'MF' => '029',
                    'MQ' => '029',
                    'MS' => '029',
                    'PR' => '029',
                    'TC' => '029',
                    'TT' => '029',
                    'VC' => '029',
                    'VG' => '029',
                    'VI' => '029',
                'central america' => '013',
                    'BZ' => '013',
                    'CR' => '013',
                    'GT' => '013',
                    'HN' => '013',
                    'MX' => '013',
                    'NI' => '013',
                    'PA' => '013',
                    'SV' => '013',
                'south america' => '005',
                    'AR' => '005',
                    'BO' => '005',
                    'BR' => '005',
                    'CL' => '005',
                    'CO' => '005',
                    'EC' => '005',
                    'FK' => '005',
                    'GF' => '005',
                    'GY' => '005',
                    'PE' => '005',
                    'PY' => '005',
                    'SR' => '005',
                    'UY' => '005',
                    'VE' => '005',
            'asia' => '142',
                'central asia' => '143',
                    'TM' => '143',
                    'TJ' => '143',
                    'KG' => '143',
                    'KZ' => '143',
                    'UZ' => '143',
                'east asia'    => '030',
                'eastern asia' => '030',
                    'CN' => '030',
                    'HK' => '030',
                    'JP' => '030',
                    'KP' => '030',
                    'KR' => '030',
                    'MN' => '030',
                    'MO' => '030',
                    'TW' => '030',
                'south asia'    => '034',
                'southern asia' => '034',
                    'AF' => '034',
                    'BD' => '034',
                    'BT' => '034',
                    'IN' => '034',
                    'IR' => '034',
                    'LK' => '034',
                    'MV' => '034',
                    'NP' => '034',
                    'PK' => '034',
                'south east asia'    => '035',
                'south-east asia'    => '035',
                'south-eastern asia' => '035',
                    'BN' => '035',
                    'ID' => '035',
                    'KH' => '035',
                    'LA' => '035',
                    'MM' => '035',
                    'BU' => '035',
                    'MY' => '035',
                    'PH' => '035',
                    'SG' => '035',
                    'TH' => '035',
                    'TL' => '035',
                    'TP' => '035',
                    'VN' => '035',
                'west asia'    => '145',
                'western asia' => '145',
                    'AE' => '145',
                    'AM' => '145',
                    'AZ' => '145',
                    'BH' => '145',
                    'CY' => '145',
                    'GE' => '145',
                    'IL' => '145',
                    'IQ' => '145',
                    'JO' => '145',
                    'KW' => '145',
                    'LB' => '145',
                    'OM' => '145',
                    'PS' => '145',
                    'QA' => '145',
                    'SA' => '145',
                    'NT' => '145',
                    'SY' => '145',
                    'TR' => '145',
                    'YE' => '145',
                    'YD' => '145'
        );

        $unitedStates = array(
            'US-AL',
            'US-AK',
            'US-AZ',
            'US-AR',
            'US-CA',
            'US-CO',
            'US-CT',
            'US-DE',
            'US-FL',
            'US-GA',
            'US-HI',
            'US-ID',
            'US-IL',
            'US-IN',
            'US-IA',
            'US-KS',
            'US-KY',
            'US-LA',
            'US-ME',
            'US-MD',
            'US-MA',
            'US-MI',
            'US-MN',
            'US-MS',
            'US-MO',
            'US-MT',
            'US-NE',
            'US-NV',
            'US-NH',
            'US-NJ',
            'US-NM',
            'US-NY',
            'US-NC',
            'US-ND',
            'US-OH',
            'US-OK',
            'US-OR',
            'US-PA',
            'US-RI',
            'US-SC',
            'US-SD',
            'US-TN',
            'US-TX',
            'US-UT',
            'US-VT',
            'US-VA',
            'US-WA',
            'US-WV',
            'US-WI',
            'US-WY',
            'US-DC',
            'US-AS',
            'US-GU',
            'US-MP',
            'US-PR',
            'US-UM',
            'US-VI'
        );

        if(array_key_exists($regionCodes, strtolower($region)))
        {
            return $regionCodes[$region];
        } else if(array_search($region, $unitedStates)) {
            return $region;
        } else {
            return FALSE;
        }
    }

}

/* End of file GeoChart.php */
/* Location: ./gcharts/charts/GeoChart.php */
