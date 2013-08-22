<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Area Chart</h1>
<?php
    echo $this->gcharts->AreaChart('Depths')->outputInto('lake_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->AreaChart('Depths')->outputInto('lake_div');
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>