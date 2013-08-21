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

$this->gcharts->DataTable('Stocks')
              ->addColumn('number', 'Count', 'count')
              ->addColumn('number', 'Projected', 'projected')
              ->addColumn('number', 'Official', 'official');

for($a = 1; $a < 25; $a++)
{
    $data = array(
        $a,             //Count
        rand(800,1000), //Line 1's data
        rand(800,1000)  //Line 2's data
    );

    $this->gcharts->DataTable('Stocks')->addRow($data);
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