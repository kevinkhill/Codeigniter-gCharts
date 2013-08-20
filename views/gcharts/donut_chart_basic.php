<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Donut Chart</h1>
<?php
    echo $this->gcharts->PieChart('Foods')->outputInto('food_div');
    echo $this->gcharts->div(500,300);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
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
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->PieChart('Foods')->outputInto('food_div');
echo $this->gcharts->div(500,300);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>