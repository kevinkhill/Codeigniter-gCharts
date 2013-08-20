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

        $dataTable = $this->gcharts->DataTable('Stocks');

        $dataTable->addColumn('number', 'Count', 'count');
        $dataTable->addColumn('number', 'Projected', 'projected');
        $dataTable->addColumn('number', 'Official', 'official');

        for($a = 1; $a < 25; $a++)
        {
            $data[0] = $a; //Count
            $data[1] = rand(800,1000); //Line 1's data
            $data[2] = rand(800,1000); //Line 2's data

            $dataTable->addRow($data);
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

        $dataTable = $this->gcharts->DataTable('Times');

        $dataTable->addColumn('date', 'Dates', 'dates');
        $dataTable->addColumn('number', 'Run Time', 'run_time');
        $dataTable->addColumn('number', 'Schedule Time', 'schedule_time');

        for($a = 1; $a < 30; $a++)
        {
            $line1 = rand(1,5);
            $line2 = rand(1,5);
            $dataTable->addRow(array(new jsDate(2013, 8, $a), $line1, $line2));
        }

        //Either Chain functions together to set configuration
        $titleStyle = new textStyle();
        $titleStyle->color('#FF0A04')->fontName('Georgia')->fontSize(18);

        $legendStyle = new textStyle();
        $legendStyle->color('#F3BB00')->fontName('Arial')->fontSize(20);

        //Or pass and array with configuration options
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

        $dataTable = $this->gcharts->DataTable('Rain');

        $dataTable->addColumn('number', 'Count', 'count');
        $dataTable->addColumn('number', 'Last Year', 'past');
        $dataTable->addColumn('number', 'This Year', 'current');

        for($a = 1; $a < 30; $a++)
        {
            $line1 = rand(-10,10);
            $line2 = rand(-10,10);
            $dataTable->addRow(array($a, $line1, $line2));
        }

        $config = array(
            'title' => 'Rain'
        );

        $this->gcharts->AreaChart('Rain')->setConfig($config);

        $this->load->view('gcharts/area_chart_basic');
    }

    public function area_chart_advanced()
    {
        $this->gcharts->load('AreaChart');

        $dataTable = $this->gcharts->DataTable('Growth');

        $dataTable->addColumn('date', 'Dates', 'dates');
        $dataTable->addColumn('number', 'Corn', 'corn');
        $dataTable->addColumn('number', 'Tomatoes', 'tomatoes');
        $dataTable->addColumn('number', 'Onions', 'onions');

        for($a = 1; $a < 30; $a++)
        {
            $line1 = rand(1,50);
            $line2 = rand(1,50);
            $line3 = rand(1,50);
            $dataTable->addRow(array(new jsDate(2013, 2, $a), $line1, $line2, $line3));
        }

        //Either Chain functions together to set configuration
        $titleStyle = new textStyle();
        $titleStyle->color('#FF0A04')->fontName('Georgia')->fontSize(18);

        $legendStyle = new textStyle();
        $legendStyle->color('#F3BB00')->fontName('Arial')->fontSize(20);

        //Or pass and array with configuration options
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
            'title' => 'Crop Growth',
            'titlePosition' => 'out'
        );

        $this->gcharts->AreaChart('Growth')->setConfig($config);

        $this->load->view('gcharts/area_chart_advanced');
    }


/* ---------- Pie Charts ---------- */
    public function pie_chart_basic()
    {
        $this->gcharts->load('PieChart');

        $dataTable = $this->gcharts->DataTable('Foods');

        $dataTable->addColumn('string', 'Foods', 'food');
        $dataTable->addColumn('string', 'Amount', 'amount');

        $p1 = rand(0,50);
        $p2 = rand(0,50);
        $p3 = rand(0,50);
        $p4 = rand(0,50);

        $dataTable->addRow(array('Pizza', $p1));
        $dataTable->addRow(array('Beer', $p2));
        $dataTable->addRow(array('Steak', $p3));
        $dataTable->addRow(array('Bacon', $p4));

        $config = array(
            'title' => 'My Foods',
            'is3D' => TRUE
        );

        $this->gcharts->PieChart('Foods')->setConfig($config);

        $this->load->view('gcharts/pie_chart_basic');
    }

    public function donut_chart_basic()
    {
        $this->gcharts->load('PieChart');

        $dataTable = $this->gcharts->DataTable('Foods');

        $dataTable->addColumn('string', 'Foods', 'food');
        $dataTable->addColumn('string', 'Amount', 'amount');

        $p1 = rand(0,50);
        $p2 = rand(0,50);
        $p3 = rand(0,50);
        $p4 = rand(0,50);

        $dataTable->addRow(array('Pizza', $p1));
        $dataTable->addRow(array('Beer', $p2));
        $dataTable->addRow(array('Steak', $p3));
        $dataTable->addRow(array('Bacon', $p4));

        $config = array(
            'title' => 'My Foods',
            'pieHole' => .4
        );

        $this->gcharts->PieChart('Foods')->setConfig($config);

        $this->load->view('gcharts/donut_chart_basic');
    }

    public function pie_chart_advanced()
    {
        $this->gcharts->load('PieChart');

        $dataTable = $this->gcharts->DataTable('Activities');
        $dataTable->addColumn('string', 'Foods', 'food');
        $dataTable->addColumn('string', 'Amount', 'amount');

        $p1 = rand(0,50);
        $p2 = rand(0,50);
        $p3 = rand(0,50);
        $p4 = rand(0,50);

        $dataTable->addRow(array('TV', $p1));
        $dataTable->addRow(array('Running', $p2));
        $dataTable->addRow(array('Video Games', $p3));
        $dataTable->addRow(array('Sleeping', $p4));
        $dataTable->addRow(array('Working', 1));
        $dataTable->addRow(array('Sprinting', 1));
        $dataTable->addRow(array('Driving', 1));
        $dataTable->addRow(array('Golfing', 1));

        $config = array(
            'title' => 'Activities',
            'titleTextStyle' => new textStyle(array(
                'color' => 'blue',
                'fontName' => 'Impact',
                'fontSize' => 24
            )),
            'pieSliceBorderColor' => 'orange',
            'pieSliceTextStyle' => new textStyle(array(
                'color' => 'yellow',
                'fontName' => 'Arial',
                'fontSize' => 18
            )),
            'reverseCategories' => TRUE,
            'sliceVisibilityThreshold' => .04,
            'pieResidueSliceColor' => '#0C04A0',
            'pieResidueSliceLabel' => 'Stuff I Do',
        );

        $this->gcharts->PieChart('Activities')->setConfig($config);

        $this->load->view('gcharts/pie_chart_advanced');
    }


    public function column_chart_basic()
    {
        $this->gcharts->load('ColumnChart');

        $dataTable = $this->gcharts->DataTable('Inventory');

        $dataTable->addColumn('string', 'Classroom', 'class');
        $dataTable->addColumn('number', 'Pencils', 'pencils');
        $dataTable->addColumn('number', 'Markers', 'markers');
        $dataTable->addColumn('number', 'Erasers', 'erasers');
        $dataTable->addColumn('number', 'Binders', 'binders');

        $dataTable->addRow(array(
            'Science Class',
            rand(0, 100),
            rand(0, 100),
            rand(0, 100),
            rand(0, 100)
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

        $dataTable = $this->gcharts->DataTable('Finances');

        $dataTable->addColumn('string', 'Year', 'month');
        $dataTable->addColumn('number', 'Gross Income', 'gross');
        $dataTable->addColumn('number', 'Bills Paid', 'bills');
        $dataTable->addColumn('number', 'Net Income', 'income');

        $gross = rand(80000, 90000); $bills = rand(15000, 25000);
        $dataTable->addRow(array('2009', $gross, $bills, ($gross - $bills)));

        $gross = rand(80000, 90000); $bills = rand(15000, 25000);
        $dataTable->addRow(array('2010', $gross, $bills, ($gross - $bills)));

        $gross = rand(80000, 90000); $bills = rand(15000, 25000);
        $dataTable->addRow(array('2011', $gross, $bills, ($gross - $bills)));

        $gross = rand(80000, 90000); $bills = rand(15000, 25000);
        $dataTable->addRow(array('2012', $gross, $bills, ($gross - $bills)));


        //Either Chain functions together to set configuration
        $titleStyle = new textStyle();
        $titleStyle->color('#55BB9A')->fontName('Georgia')->fontSize(22);

        $legendStyle = new textStyle();
        $legendStyle->color('#F3BB00')->fontName('Arial')->fontSize(16);

        //Or pass and array with configuration options
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
            'barGroupWidth' => '90%',
            'chartArea' => new chartArea(array(
                'left' => 80,
                'top' => 80,
                'width' => '70%',
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
                    'count' => 4
                ),
                'minorGridlines' => array(
                    'color' => '#FEBCDA',
                    'count' => 2
                ),
                'textPosition' => 'out',
                'textStyle' => new textStyle(array(
                    'color' => '#C42B5F',
                    'fontName' => 'Tahoma',
                    'fontSize' => 14
                )),
                'slantedText' => TRUE,
                'slantedTextAngle' => 45,
                'title' => 'Years',
                'titleTextStyle' => new textStyle(array(
                    'color' => '#BB33CC',
                    'fontName' => 'Impact',
                    'fontSize' => 18
                ))
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

}

/* End of file gchart_examples.php */
/* Location: ./application/controllers/gchart_examples.php */