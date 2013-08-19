<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Line Chart</h1>
<?php
    echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');
    echo $this->gcharts->div(800, 300);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
$this->gcharts->load('LineChart');

$dataTable = $this->gcharts->DataTable('Stocks');

$dataTable->addColumn('number', 'Count', 'count');
$dataTable->addColumn('number', 'Projected', 'projected');
$dataTable->addColumn('number', 'Official', 'official');

for($a = 1; $a < 25; $a++)
{
    $data[0] = $a; //Count
    $data[1] = rand(800,1000); //Line 1's data
    $data[2] = rand(800,1000); //Line 2's data

    $dataTable->addRow($data);
}

$config = array(
    'title' => 'Stocks'
);

$this->gcharts->LineChart('Stocks')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');
echo $this->gcharts->div(800, 300);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>