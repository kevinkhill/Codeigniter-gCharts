<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Column Chart</h1>
<?php
    echo $this->gcharts->ColumnChart('Inventory')->outputInto('inventory_div');
    echo $this->gcharts->div(600, 500);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
$dataTable = $this->gcharts->DataTable('Inventory');

$dataTable->addColumn('string', 'Classroom', 'class');
$dataTable->addColumn('number', 'Pencils', 'pencils');
$dataTable->addColumn('number', 'Markers', 'markers');
$dataTable->addColumn('number', 'Erasers', 'erasers');
$dataTable->addColumn('number', 'Binders', 'binders');

$dataTable->addRow(array(
    'Science Class',
    rand(0, 100),
    rand(0, 100),
    rand(0, 100),
    rand(0, 100)
));

$this->gcharts->ColumnChart('Inventory')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->ColumnChart('Inventory')->outputInto('inventory_div');
echo $this->gcharts->div(600, 500);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>