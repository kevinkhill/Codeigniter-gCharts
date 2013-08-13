<?php
$dataTable = $this->gcharts->DataTable('Rain');

$dataTable->addColumn('number', 'Count', 'count');
$dataTable->addColumn('number', 'Last Year', 'past');
$dataTable->addColumn('number', 'This Year', 'current');

for($a = 1; $a < 30; $a++)
{
    $line1 = rand(-10,10);
    $line2 = rand(-10,10);
    $dataTable->addRow(array($a, $line1, $line2));
}

$config = array(
    'title' => 'Rain'
);

$this->gcharts->AreaChart('Rain')->setConfig($config);
?>