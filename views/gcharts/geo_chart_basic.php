<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Geo Chart</h1>
<?php
    echo $this->gcharts->GeoChart('Population')->outputInto('pop_div');
    echo $this->gcharts->div(1024, 768);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
$this->gcharts->load('GeoChart');

$dataTable = $this->gcharts->DataTable('Population');

$dataTable->addColumn('string', 'Country', 'country');
$dataTable->addColumn('number', 'Population', 'population');

$dataTable->addRow(array('United States', 312000000));
$dataTable->addRow(array('Mexico', 115000000));
$dataTable->addRow(array('France', 63300000));
$dataTable->addRow(array('China', 1347000000));
$dataTable->addRow(array('India', 1241000000));
$dataTable->addRow(array('Russia', 143000000));

$this->gcharts->GeoChart('Population');
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->GeoChart('Population')->outputInto('pop_div');
echo $this->gcharts->div(1024, 768);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>