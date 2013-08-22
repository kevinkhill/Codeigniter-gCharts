<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Donut Chart</h1>
<?php
    echo $this->gcharts->DonutChart('Foods')->outputInto('food_div');
    echo $this->gcharts->div(500,300);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />
<p><em>NOTE:</em> DonutChart has all the same properties as PieChart.<br>DonutChart is an alias class extending PieChart allowing the 'pieHole' config property to be set.</p>
<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->DonutChart('Foods')->outputInto('food_div');
echo $this->gcharts->div(500,300);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>