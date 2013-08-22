<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Area Chart</h1>
<?php
    echo $this->gcharts->AreaChart('Rain')->outputInto('weather_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
$this->gcharts->load('AreaChart');

$this->gcharts->DataTable('Rain')
              ->addColumn('number', 'Count', 'count')
              ->addColumn('number', 'Last Year', 'past')
              ->addColumn('number', 'This Year', 'current');

for($a = 1; $a < 30; $a++)
{
    $data = array(
        $a,           //Count
        rand(-10,10), //Line 1
        rand(-10,10), //Line 2
    );

    $this->gcharts->DataTable('Rain')->addRow($data);
}

$config = array(
    'title' => 'Rainfall'
);

$this->gcharts->AreaChart('Rain')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->AreaChart('Rain')->outputInto('weather_div');
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>