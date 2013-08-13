<?php
$dataTable = $this->gcharts->DataTable('Foods');

$dataTable->addColumn('string', 'Foods', 'food');
$dataTable->addColumn('string', 'Amount', 'amount');

$p1 = rand(0,50);
$p2 = rand(0,50);
$p3 = rand(0,50);
$p4 = rand(0,50);

$dataTable->addRow(array('Pizza', $p1));
$dataTable->addRow(array('Beer', $p2));
$dataTable->addRow(array('Steak', $p3));
$dataTable->addRow(array('Bacon', $p4));

$config = array(
    'title' => 'Favorite Foods',
    'is3D' => TRUE
);

$this->gcharts->PieChart('Foods')->setConfig($config);
?>