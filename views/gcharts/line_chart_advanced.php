<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Line Chart</h1>
<?php
    echo $this->gcharts->LineChart('Times')->outputInto('time_div');
    echo $this->gcharts->div(800, 500);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->LineChart('Times')->outputInto('time_div');
echo $this->gcharts->div(800, 500);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>