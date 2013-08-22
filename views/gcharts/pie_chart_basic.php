<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Line Chart</h1>
<?php
    echo $this->gcharts->PieChart('Foods')->outputInto('food_div');
    echo $this->gcharts->div(700,400);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->PieChart('Foods')->outputInto('food_div');
echo $this->gcharts->div(700,400);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>