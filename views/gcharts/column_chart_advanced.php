<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Column Chart</h1>
<?php
    echo $this->gcharts->ColumnChart('Finances')->outputInto('money_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->ColumnChart('Finances')->outputInto('money_div');
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>