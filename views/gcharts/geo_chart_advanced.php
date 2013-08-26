<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Geo Chart</h1>
<?php
    echo $this->gcharts->GeoChart('Debt')->outputInto('debt_div');
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

$this->gcharts->DataTable('Debt')
     ->addColumn('string', 'State', 'state')
     ->addColumn('number', 'Population', 'population')
     ->addRows(array(
        array('California', 38041430),
        array('Texas', 26059203),
        array('New York', 19570261),
        array('Florida', 19317568),
        array('Illinois', 12875255),
        array('Pennsylvania', 12763536),
        array('Ohio', 11544225),
        array('Georgia', 9919945),
        array('Michigan', 9883360),
        array('North Carolina', 9752073),
        array('New Jersey', 8864590),
        array('Virginia', 8185867),
        array('Washington', 6897012),
        array('Massachusetts', 6646144),
        array('Arizona', 6553255),
        array('Indiana', 6537334),
        array('Tennessee', 6456243),
        array('Missouri', 6021988),
        array('Maryland', 5884563),
        array('Wisconsin', 5726398),
        array('Minnesota', 5379139),
        array('Colorado', 5187582),
        array('Alabama', 4822023),
        array('South Carolina', 4723723),
        array('Louisiana', 4601893),
        array('Kentucky', 4380415),
        array('Oregon', 3899353),
        array('Oklahoma', 3814820),
        array('Connecticut', 3590347),
        array('Iowa', 3074186),
        array('Mississippi', 2984926),
        array('Arkansas', 2949131),
        array('Kansas', 2885905),
        array('Utah', 2855287),
        array('Nevada', 2758931),
        array('New Mexico', 2085538),
        array('Nebraska', 1855525),
        array('West Virginia', 1855413),
        array('Idaho', 1595728),
        array('Hawaii', 1392313),
        array('Maine', 1329192),
        array('New Hampshire', 1320718),
        array('Rhode Island', 1050292),
        array('Montana', 1005141),
        array('Delaware', 917092),
        array('South Dakota', 833354),
        array('Alaska', 731449),
        array('North Dakota', 699628),
        array('District of Columbia', 632323),
        array('Vermont', 626011),
        array('Wyoming', 576412)
    ));

$colorAxis = $this->gcharts->colorAxis()
                  ->colors(array('blue', 'orange'));

$sizeAxis = $this->gcharts->sizeAxis()
                          ->minSize(1)
                          ->minValue(500000)
                          ->maxSize(40)
                          ->maxValue(40000000);

$config = array(
    'sizeAxis' => $sizeAxis,
    'colorAxis' => $colorAxis,
    'datalessRegionColor' => '#DDF6FF',
    'displayMode' => 'markers',
    'enableRegionInteractivity' => TRUE,
    'magnifyingGlass' => new magnifyingGlass(3),
    'region' => 'US',
    'resolution' => 'provinces'

);

$this->gcharts->GeoChart('Debt')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->GeoChart('Debt')->outputInto('debt_div');
echo $this->gcharts->div(1024, 768);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>
