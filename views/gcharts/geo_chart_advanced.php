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

</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">

</pre>

<?php

var_dump($this->gcharts->GeoChart('Debt')->options);

?>