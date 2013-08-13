<h1>Basic Line Chart</h1>
<?php
    echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');
    echo $this->gcharts->div(600, 300);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>