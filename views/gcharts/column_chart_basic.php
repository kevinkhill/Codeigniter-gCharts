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
$this->gcharts->load('ColumnChart');

$this->gcharts->DataTable('Inventory')
              ->addColumn('string', 'Classroom', 'class')
              ->addColumn('number', 'Pencils', 'pencils')
              ->addColumn('number', 'Markers', 'markers')
              ->addColumn('number', 'Erasers', 'erasers')
              ->addColumn('number', 'Binders', 'binders')
              ->addRow(array(
                  'Science Class',
                  rand(50, 100),
                  rand(50, 100),
                  rand(50, 100),
                  rand(50, 100)
              ));

$config = array(
    'title' => 'Inventory'
);

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