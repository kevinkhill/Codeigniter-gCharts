<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Line Chart</h1>
<?php
    echo $this->gcharts->ColumnChart('Inventory')->outputInto('inventory_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
$dataTable = $this->gcharts->DataTable('Inventory');

$dataTable->addColumn('string', 'Products', 'products');
$dataTable->addColumn('number', 'Pencils', 'pencils');
$dataTable->addColumn('number', 'Markers', 'markers');
$dataTable->addColumn('number', 'Erasers', 'erasers');
$dataTable->addColumn('number', 'Binders', 'binders');

$dataTable->addRow(array('Pencils', 165));
$dataTable->addRow(array('Marker', 104));
$dataTable->addRow(array('Erasers', 122));
$dataTable->addRow(array('Binders', 56));

$config = array(
    'title' => 'Inventory'
);

$this->gcharts->ColumnChart('Inventory')->setConfig($config);

$this->load->view('gcharts/column_chart_basic');
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->ColumnChart('Inventory')->outputInto('inventory_div');
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>