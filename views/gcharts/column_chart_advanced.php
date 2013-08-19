<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Basic Column Chart</h1>
<?php
    echo $this->gcharts->ColumnChart('Finances')->outputInto('money_div');
    echo $this->gcharts->div(800, 500);

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
$this->gcharts->load('ColumnChart');

$dataTable = $this->gcharts->DataTable('Finances');

$dataTable->addColumn('string', 'Year', 'month');
$dataTable->addColumn('number', 'Gross Income', 'gross');
$dataTable->addColumn('number', 'Bills Paid', 'bills');
$dataTable->addColumn('number', 'Net Income', 'income');

$gross = rand(80000, 90000); $bills = rand(15000, 20000);
$dataTable->addRow(array('2009', $gross, $bills, ($gross - $bills)));

$gross = rand(80000, 90000); $bills = rand(15000, 20000);
$dataTable->addRow(array('2010', $gross, $bills, ($gross - $bills)));

$gross = rand(80000, 90000); $bills = rand(15000, 20000);
$dataTable->addRow(array('2011', $gross, $bills, ($gross - $bills)));

$gross = rand(80000, 90000); $bills = rand(15000, 20000);
$dataTable->addRow(array('2012', $gross, $bills, ($gross - $bills)));





$this->gcharts->ColumnChart('Finances')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#f2f2f2;padding:5px;">
echo $this->gcharts->ColumnChart('Finances')->outputInto('money_div');
echo $this->gcharts->div(800, 500);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>