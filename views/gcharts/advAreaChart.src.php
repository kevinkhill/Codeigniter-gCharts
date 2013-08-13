<?php
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

$this->gcharts->LineChart('Growth')->setConfig($config);
?>
