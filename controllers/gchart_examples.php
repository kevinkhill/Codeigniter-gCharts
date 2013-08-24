<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gchart_examples extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('gcharts');
    }

    public function index()
    {
        $this->load->view('gcharts/index');
    }


/* ---------- Line Charts ---------- */
    public function line_chart_basic()
    {
        $this->gcharts->load('LineChart');

        $this->gcharts->DataTable('Stocks')
                      ->addColumn('number', 'Count', 'count')
                      ->addColumn('number', 'Projected', 'projected')
                      ->addColumn('number', 'Official', 'official');

        for($a = 1; $a < 25; $a++)
        {
            $data = array(
                $a,             //Count
                rand(800,1000), //Line 1's data
                rand(800,1000)  //Line 2's data
            );

            $this->gcharts->DataTable('Stocks')->addRow($data);
        }

        $config = array(
            'title' => 'Stocks'
        );

        $this->gcharts->LineChart('Stocks')->setConfig($config);

        $this->load->view('gcharts/line_chart_basic');
    }

    public function line_chart_advanced()
    {
        $this->gcharts->load('LineChart');

        $this->gcharts->DataTable('Times')
             ->addColumn('date', 'Dates', 'dates')
             ->addColumn('number', 'Run Time', 'run_time')
             ->addColumn('number', 'Schedule Time', 'schedule_time');

        for($a = 1; $a < 30; $a++)
        {
            $data = array(
                new jsDate(2013, 8, $a), //Date object
                rand(1,10),              //Line 1's data
                rand(1,10),              //Line 2's data
            );

            $this->gcharts->DataTable('Times')->addRow($data);
        }

        //Either Chain functions together to set configuration options
        $titleStyle = $this->gcharts->textStyle()
                                    ->color('#FF0A04')
                                    ->fontName('Georgia')
                                    ->fontSize(18);

        $legendStyle = $this->gcharts->textStyle()
                                     ->color('#F3BB00')
                                     ->fontName('Arial')
                                     ->fontSize(20);

        $legend = $this->gcharts->legend()
                                ->position('bottom')
                                ->alignment('start')
                                ->textStyle($legendStyle);

        //Or pass an array with the configuration options into the function
        $tooltipStyle = new textStyle(array(
                        'color' => '#C0C0B0',
                        'fontName' => 'Courier New',
                        'fontSize' => 10
                    ));

        $tooltip = new tooltip(array(
                        'showColorCode' => TRUE,
                        'textStyle' => $tooltipStyle
                    ));


        $config = array(
            'backgroundColor' => new backgroundColor(array(
                'stroke' => '#BBBBBB',
                'strokeWidth' => 8,
                'fill' => '#EFEFFF'
            )),
            'chartArea' => new chartArea(array(
                'left' => 100,
                'top' => 75,
                'width' => '85%',
                'height' => '55%'
            )),
            'titleTextStyle' => $titleStyle,
            'legend' => $legend,
            'tooltip' => $tooltip,
            'title' => 'Times for Deliveries',
            'titlePosition' => 'out',
            'curveType' => 'function',
            'width' => 1000,
            'height' => 450,
            'pointSize' => 3,
            'lineWidth' => 1,
            'colors' => array('#4F9CBB', 'green'),
            'hAxis' => new hAxis(array(
                'baselineColor' => '#fc32b0',
                'gridlines' => array(
                    'color' => '#43fc72',
                    'count' => 6
                ),
                'minorGridlines' => array(
                    'color' => '#b3c8d1',
                    'count' => 3
                ),
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#C42B5F',
                    'fontName' => 'Tahoma',
                    'fontSize' => 10
                )),
                'slantedText' => TRUE,
                'slantedTextAngle' => 30,
                'title' => 'Delivery Dates',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#BB33CC',
                    'fontName' => 'Impact',
                    'fontSize' => 14
                )),
                'maxAlternation' => 6,
                'maxTextLines' => 2
            )),
            'vAxis' => new vAxis(array(
                'baseline' => 1,
                'baselineColor' => '#CF3BBB',
                'format' => '## hrs',
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#DDAA88',
                    'fontName' => 'Arial Bold',
                    'fontSize' => 10
                )),
                'title' => 'Delivery Time',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#5C6DAB',
                    'fontName' => 'Verdana',
                    'fontSize' => 14
                )),
            ))
        );

        $this->gcharts->LineChart('Times')->setConfig($config);

        $this->load->view('gcharts/line_chart_advanced');
    }


/* ---------- Area Charts ---------- */
    public function area_chart_basic()
    {
        $this->gcharts->load('AreaChart');

        $this->gcharts->DataTable('Rain')
                      ->addColumn('number', 'Count', 'count')
                      ->addColumn('number', 'Last Year', 'past')
                      ->addColumn('number', 'This Year', 'current');

        for($a = 1; $a < 30; $a++)
        {
            $data = array(
                $a,           //Count
                rand(-10,10), //Line 1
                rand(-10,10), //Line 2
            );

            $this->gcharts->DataTable('Rain')->addRow($data);
        }

        $config = array(
            'title' => 'Rainfall'
        );

        $this->gcharts->AreaChart('Rain')->setConfig($config);

        $this->load->view('gcharts/area_chart_basic');
    }

    public function area_chart_advanced()
    {
        $this->gcharts->load('AreaChart');

        $this->gcharts->DataTable('Depths')
                      ->addColumn('date', 'Dates', 'dates')
                      ->addColumn('number', 'Beaver Lake', 'beaver')
                      ->addColumn('number', 'Tree Lake', 'tree')
                      ->addColumn('number', 'Sunny Lake', 'sunny');

        for($a = 1; $a < 12; $a++)
        {
            $data = array(
                new jsDate(2013, $a, 1), //Dates
                rand(1,50),              //Line 1
                rand(1,50),              //Line 2
                rand(1,50)               //Line 3
            );

            $this->gcharts->DataTable('Depths')->addRow($data);
        }

        //Either Chain functions together to setup configuration objects
        $titleStyle = $this->gcharts->textStyle()
                                    ->color('#FF0A04')
                                    ->fontName('Georgia')
                                    ->fontSize(24);

        $legendStyle = $this->gcharts->textStyle()
                                     ->color('#F3BB00')
                                     ->fontName('Arial Bold')
                                     ->fontSize(16);

        //Or pass an array with configuration options
        $legend = new legend(array(
            'position' => 'bottom',
            'alignment' => 'start',
            'textStyle' => $legendStyle
        ));

        $tooltipStyle = new textStyle(array(
            'color' => '#C0C0B0',
            'fontName' => 'Courier New',
            'fontSize' => 10
        ));

        $tooltip = new tooltip(array(
            'showColorCode' => TRUE,
            'textStyle' => $tooltipStyle
        ));


        $config = array(
                'backgroundColor' => new backgroundColor(array(
                'stroke' => '#3B52C1',
                'strokeWidth' => 12,
                'fill' => '#DFFFDA'
            )),
            'chartArea' => new chartArea(array(
                'left' => 89,
                'top' => 63,
                'width' => '80%',
                'height' => '60%'
            )),
            'titleTextStyle' => $titleStyle,
            'legend' => $legend,
            'tooltip' => $tooltip,
            'title' => 'Lake Depths',
            'titlePosition' => 'in',
            'width' => 1000,
            'height' => 450,
            'pointSize' => 5,
            'lineWidth' => 3,
            'colors' => array('#26BB93', 'yellow', '#BCDEFA'),
            'hAxis' => new hAxis(array(
                'baselineColor' => 'orange',
                'gridlines' => array(
                    'color' => '#000000',
                    'count' => 12
                ),
                'minorGridlines' => array(
                    'color' => '#A4F2BC',
                    'count' => 30
                ),
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#C42B5F',
                    'fontName' => 'Tahoma',
                    'fontSize' => 10
                )),
                'slantedText' => TRUE,
                'slantedTextAngle' => 45,
                'title' => 'Dates',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#BB33CC',
                    'fontName' => 'Impact',
                    'fontSize' => 14
                )),
                'maxAlternation' => 1,
                'maxTextLines' => 12
            )),
            'vAxis' => new vAxis(array(
                'baseline' => 1,
                'baselineColor' => '#623BBB',
                'format' => '## feet',
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#DDAA88',
                    'fontName' => 'Arial Bold',
                    'fontSize' => 10
                )),
                'title' => 'Depth',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#5C6DAB',
                    'fontName' => 'Verdana',
                    'fontSize' => 14
                )),
            ))
        );

        $this->gcharts->AreaChart('Depths')->setConfig($config);

        $this->load->view('gcharts/area_chart_advanced');
    }


/* ---------- Pie Charts ---------- */
    public function pie_chart_basic()
    {
        $this->gcharts->load('PieChart');

        $slice1 = rand(0,40);
        $slice2 = rand(0,40);
        $slice3 = rand(0,40);
        $slice4 = rand(0,40);

        $this->gcharts->DataTable('Foods')
                      ->addColumn('string', 'Foods', 'food')
                      ->addColumn('string', 'Amount', 'amount')
                      ->addRow(array('Pizza', $slice1))
                      ->addRow(array('Beer', $slice2))
                      ->addRow(array('Steak', $slice3))
                      ->addRow(array('Bacon', $slice4));

        $config = array(
            'title' => 'My Foods',
            'is3D' => TRUE
        );

        $this->gcharts->PieChart('Foods')->setConfig($config);

        $this->load->view('gcharts/pie_chart_basic');
    }

    public function pie_chart_advanced()
    {
        $this->gcharts->load('PieChart');

        $this->gcharts->DataTable('Activities')
                      ->addColumn('string', 'Foods', 'food')
                      ->addColumn('string', 'Amount', 'amount')
                      ->addRow(array('Driving', 5))
                      ->addRow(array('Video Games', 5))
                      ->addRow(array('Eating', 10))
                      ->addRow(array('TV', 25))
                      ->addRow(array('Working', 30))
                      ->addRow(array('Sleeping', 20))
                      ->addRow(array('Gym', 2))
                      ->addRow(array('Running', 1))
                      ->addRow(array('Walking Dog', 1));

        $config = array(
            'title' => 'Activities',
            'titleTextStyle' => new textStyle(array(
                'color' => 'blue',
                'fontName' => 'Impact',
                'fontSize' => 24
            )),
            'width' => 800,
            'height' => 600,
            'backgroundColor' => new backgroundColor(array(
                'stroke' => '#C2A86F',
                'strokeWidth' => 5,
                'fill' => '#C8F9FC'
            )),
            'legend' => new legend(array(
                'position' => 'bottom',
                'alignment' => 'start',
                'textStyle' => new textStyle(array(
                    'color' => '#7F4818',
                    'fontName' => 'Arial Bold',
                    'fontSize' => 14
                ))
            )),
            'tooltip' => new tooltip(array(
                'showColorCode' => TRUE,
                'textStyle' => new textStyle(array(
                    'color' => '#00C0B0',
                    'fontName' => 'Courier New',
                    'fontSize' => 18
                ))
            )),
            'pieSliceBorderColor' => '#F050F0',
            'pieSliceTextStyle' => new textStyle(array(
                'color' => 'yellow',
                'fontName' => 'Arial',
                'fontSize' => 16
            )),
            'pieStartAngle' => 100,
            'reverseCategories' => TRUE,
            'sliceVisibilityThreshold' => .03,
            'pieResidueSliceColor' => '#0C04A0',
            'pieResidueSliceLabel' => 'Stuff I Do',
            'slices' => array(
                4 => new slice(array(
                    'color' => 'red',
                    'offset' => .2,
                    'textStyle' => new textStyle(array(
                        'color' => '#7CA8FA',
                        'fontName' => 'Helvetica',
                        'fontSize' => 13
                    ))
                )),
                5 => new slice(array(
                    'color' => 'yellow',
                    'offset' => .2,
                    'textStyle' => new textStyle(array(
                        'color' => '#2CF80A',
                        'fontName' => 'Times New Roman',
                        'fontSize' => 11
                    ))
                )),
                6 => new slice(array(
                    'color' => '#000000',
                    'offset' => .2,
                    'textStyle' => new textStyle(array(
                        'color' => '#3B20FE',
                        'fontName' => 'Impact',
                        'fontSize' => 15
                    ))
                ))
            )
        );

        $this->gcharts->PieChart('Activities')->setConfig($config);

        $this->load->view('gcharts/pie_chart_advanced');
    }

    public function donut_chart_basic()
    {
        $this->gcharts->load('DonutChart');

        $slice1 = rand(0,50);
        $slice2 = rand(0,50);
        $slice3 = rand(0,50);
        $slice4 = rand(0,50);

        $this->gcharts->DataTable('Foods')
                      ->addColumn('string', 'Foods', 'food')
                      ->addColumn('string', 'Amount', 'amount')
                      ->addRow(array('Pizza', $slice1))
                      ->addRow(array('Beer', $slice2))
                      ->addRow(array('Steak', $slice3))
                      ->addRow(array('Bacon', $slice4));

        $config = array(
            'title' => 'My Foods',
            'pieHole' => .4
        );

        $this->gcharts->DonutChart('Foods')->setConfig($config);

        $this->load->view('gcharts/donut_chart_basic');
    }

    public function column_chart_basic()
    {
        $this->gcharts->load('ColumnChart');

        $this->gcharts->DataTable('Inventory')
                      ->addColumn('string', 'Classroom', 'class')
                      ->addColumn('number', 'Pencils', 'pencils')
                      ->addColumn('number', 'Markers', 'markers')
                      ->addColumn('number', 'Erasers', 'erasers')
                      ->addColumn('number', 'Binders', 'binders')
                      ->addRow(array(
                          'Science Class',
                          rand(50, 100),
                          rand(50, 100),
                          rand(50, 100),
                          rand(50, 100)
                      ));

        $config = array(
            'title' => 'Inventory'
        );

        $this->gcharts->ColumnChart('Inventory')->setConfig($config);

        $this->load->view('gcharts/column_chart_basic');
    }

    public function column_chart_advanced()
    {
        $this->gcharts->load('ColumnChart');

        $this->gcharts->DataTable('Finances')
                      ->addColumn('date', 'Year', 'month')
                      ->addColumn('number', 'Gross Income', 'gross')
                      ->addColumn('number', 'Bills Paid', 'bills')
                      ->addColumn('number', 'Net Income', 'income');

        for($year = 2005; $year <= 2010; $year++)
        {
            $gross = rand(80000, 90000);
            $bills = rand(15000, 25000);

            $data = array(
                new jsDate($year, 11, 30), //Year
                $gross,                  //Gross Income
                $bills,                  //Bills
                ($gross - $bills)        //Net Income
            );

            $this->gcharts->DataTable('Finances')->addRow($data);
        }

        //Either Chain functions together to setup configuration objects
        $titleStyle = $this->gcharts->textStyle()
                                    ->color('#55BB9A')
                                    ->fontName('Georgia')
                                    ->fontSize(22);

        $legendStyle = $this->gcharts->textStyle()
                                     ->color('#F3BB00')
                                     ->fontName('Arial')
                                     ->fontSize(16);

        //Or pass an array with configuration options
        $legend = new legend(array(
            'position' => 'right',
            'alignment' => 'start',
            'textStyle' => $legendStyle
        ));

        $tooltipStyle = new textStyle(array(
            'color' => '#000000',
            'fontName' => 'Courier New',
            'fontSize' => 10
        ));

        $tooltip = new tooltip(array(
            'showColorCode' => TRUE,
            'textStyle' => $tooltipStyle
        ));

        $config = array(
            'axisTitlesPosition' => 'out',
            'backgroundColor' => new backgroundColor(array(
                'stroke' => '#CDCDCD',
                'strokeWidth' => 4,
                'fill' => '#EEFFCC'
            )),
            'barGroupWidth' => '20%',
            'chartArea' => new chartArea(array(
                'left' => 80,
                'top' => 80,
                'width' => '80%',
                'height' => '60%'
            )),
            'titleTextStyle' => $titleStyle,
            'legend' => $legend,
            'tooltip' => $tooltip,
            'title' => 'My Finances',
            'titlePosition' => 'out',
            'width' => 1000,
            'height' => 450,
            'colors' => array('#00A100', '#FF0000', '#00FF00'),
            'hAxis' => new hAxis(array(
                'baselineColor' => '#BB99BB',
                'gridlines' => array(
                    'color' => '#ABCDEF',
                    'count' => 1
                ),
                'minorGridlines' => array(
                    'color' => '#FEBCDA',
                    'count' => 12
                ),
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#C42B5F',
                    'fontName' => 'Tahoma',
                    'fontSize' => 14
                )),
                'slantedText' => TRUE,
                'slantedTextAngle' => 70,
                'title' => 'Years',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#BB33CC',
                    'fontName' => 'Impact',
                    'fontSize' => 18
                )),
                'maxAlternation' => 2,
                'maxTextLines' => 10,
                'showTextEvery' => 1
            )),
            'vAxis' => new vAxis(array(
                'baseline' => 1,
                'baselineColor' => '#5F0BB1',
                'format' => '$ ##,###',
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#DDAA88',
                    'fontName' => 'Verdana',
                    'fontSize' => 10
                )),
                'title' => 'Dollars',
                'titleTextStyle' => new textStyle(array(
                    'color' => 'blue',
                    'fontName' => 'Verdana',
                    'fontSize' => 14
                )),
            ))
        );

        $this->gcharts->ColumnChart('Finances')->setConfig($config);

        $this->load->view('gcharts/column_chart_advanced');
    }


/* ---------- Line Charts ---------- */
    public function geo_chart_basic()
    {
        $this->gcharts->load('GeoChart');

        $dataTable = $this->gcharts->DataTable('Population');

        $dataTable->addColumn('string', 'Country', 'country');
        $dataTable->addColumn('number', 'Population', 'population');

        $dataTable->addRow(array('United States', 312000000));
        $dataTable->addRow(array('Mexico', 115000000));
        $dataTable->addRow(array('France', 63300000));
        $dataTable->addRow(array('China', 1347000000));
        $dataTable->addRow(array('India', 1241000000));
        $dataTable->addRow(array('Russia', 143000000));

//        $config = array(
//            'title' => 'Stocks'
//        );

        $this->gcharts->GeoChart('Population');//->setConfig($config);

        $this->load->view('gcharts/geo_chart_basic');
    }

    public function geo_chart_advanced()
    {
        $this->gcharts->load('GeoChart');

        $this->gcharts->DataTable('Debt')
             ->addColumn('string', 'Country', 'country')
             ->addColumn('number', 'National Debt', 'debt')
             ->addRow(array('United States', 16737246099998))
             ->addRow(array('United Kingdom', 9836000000000))
             ->addRow(array('France', 5633000000000))
             ->addRow(array('Japan', 2719000000000))
             ->addRow(array('Australia', 1466000000000))
             ->addRow(array('China', 771700000000))
             ->addRow(array('Finland', 577700000000))
             ->addRow(array('Mexico', 217700000000))
             ->addRow(array('Iceland', 116053000000))
             ->addRow(array('Iraq', 50268000000))
             ->addRow(array('Bangladesh', 36210000000))
             ->addRow(array('Iran', 9452000000))
             ->addRow(array('Kuwait', 14000000000))
             ->addRow(array('Qatar', 467600000));

        $colorAxis = $this->gcharts->colorAxis()
                          ->minValue(50000000)
                          ->maxValue(20000000000000)
                          ->values(array(50000000, 1000000000000, 20000000000000))
                          ->colors(array('green', 'yellow', 'red'));

        $sizeAxis = new sizeAxis();
        $sizeAxis->minSize(15)->minValue(50000000)->maxSize(40)->maxValue(20000000000000);

        $config = array(
            'colorAxis' => $colorAxis,
            'datalessRegionColor' => '#DDFFF6',
            'displayMode' => 'markers',
            'enableRegionInteractivity' => TRUE,
            'keepAspectRatio' => FALSE,
            'sizeAxis' => $sizeAxis,
            'markerOpacity' => 0.6,
            'magnifyingGlass' => new magnifyingGlass(3)
        );

        $this->gcharts->GeoChart('Debt')->setConfig($config);

        $this->load->view('gcharts/geo_chart_advanced');
    }

    public function geo_chart_advanced2()
    {
        $this->gcharts->load('GeoChart');

        $this->gcharts->DataTable('Debt')
             ->addColumn('string', 'State', 'state')
             ->addColumn('number', 'Population', 'population')
             ->addRows(array(
                array('California', 38041430),
                array('Texas', 26059203),
                array('New York', 19570261),
                array('Florida', 19317568),
                array('Illinois', 12875255),
                array('Pennsylvania', 12763536),
                array('Ohio', 11544225),
                array('Georgia', 9919945),
                array('Michigan', 9883360),
                array('North Carolina', 9752073),
                array('New Jersey', 8864590),
                array('Virginia', 8185867),
                array('Washington', 6897012),
                array('Massachusetts', 6646144),
                array('Arizona', 6553255),
                array('Indiana', 6537334),
                array('Tennessee', 6456243),
                array('Missouri', 6021988),
                array('Maryland', 5884563),
                array('Wisconsin', 5726398),
                array('Minnesota', 5379139),
                array('Colorado', 5187582),
                array('Alabama', 4822023),
                array('South Carolina', 4723723),
                array('Louisiana', 4601893),
                array('Kentucky', 4380415),
                array('Oregon', 3899353),
                array('Oklahoma', 3814820),
                array('Connecticut', 3590347),
                array('Iowa', 3074186),
                array('Mississippi', 2984926),
                array('Arkansas', 2949131),
                array('Kansas', 2885905),
                array('Utah', 2855287),
                array('Nevada', 2758931),
                array('New Mexico', 2085538),
                array('Nebraska', 1855525),
                array('West Virginia', 1855413),
                array('Idaho', 1595728),
                array('Hawaii', 1392313),
                array('Maine', 1329192),
                array('New Hampshire', 1320718),
                array('Rhode Island', 1050292),
                array('Montana', 1005141),
                array('Delaware', 917092),
                array('South Dakota', 833354),
                array('Alaska', 731449),
                array('North Dakota', 699628),
                array('District of Columbia', 632323),
                array('Vermont', 626011),
                array('Wyoming', 576412)
            ));

        $colorAxis = $this->gcharts->colorAxis()
                          ->colors(array('blue', 'orange'));

        $sizeAxis = $this->gcharts->sizeAxis()
                                  ->minSize(1)
                                  ->minValue(500000)
                                  ->maxSize(40)
                                  ->maxValue(40000000);

        $config = array(
            'sizeAxis' => $sizeAxis,
            'colorAxis' => $colorAxis,
            'datalessRegionColor' => '#DDF6FF',
            'displayMode' => 'markers',
            'enableRegionInteractivity' => TRUE,
            'magnifyingGlass' => new magnifyingGlass(3),
            'region' => 'US',
            'resolution' => 'provinces'

        );

        $this->gcharts->GeoChart('Debt')->setConfig($config);

        $this->load->view('gcharts/geo_chart_advanced');
    }

}

/* End of file gchart_examples.php */
/* Location: ./application/controllers/gchart_examples.php */