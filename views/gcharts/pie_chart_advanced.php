<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Pie Chart</h1>
<?php
    echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
$this->gcharts->load('PieChart');

$slice1 = rand(0,50);
$slice2 = rand(0,50);
$slice3 = rand(0,50);
$slice4 = rand(0,50);

$this->gcharts->DataTable('Activities')
              ->addColumn('string', 'Foods', 'food')
              ->addColumn('string', 'Amount', 'amount')
              ->addRow(array('TV', $slice1))
              ->addRow(array('Running', $slice2))
              ->addRow(array('Video Games', $slice3))
              ->addRow(array('Sleeping', $slice4))
              ->addRow(array('Working', 1))
              ->addRow(array('Sprinting', 1))
              ->addRow(array('Driving', 1))
              ->addRow(array('Golfing', 1));

$config = array(
    'title' => 'Activities',
    'titleTextStyle' => new textStyle(array(
        'color' => 'blue',
        'fontName' => 'Impact',
        'fontSize' => 24
    )),
    'pieSliceBorderColor' => '#D0D0D0',
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
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>