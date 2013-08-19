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
    'color' => '#C0C0B0',
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
        'width' => '90%',
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