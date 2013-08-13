<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Pie Chart</h1>
<?php
    echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
    echo $this->gcharts->div(600, 400);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
echo $this->gcharts->div(600, 400);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>