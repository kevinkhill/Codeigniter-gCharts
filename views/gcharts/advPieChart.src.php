<?php
$dataTable = $this->gcharts->DataTable('Activities');
$dataTable->addColumn('string', 'Foods', 'food');
$dataTable->addColumn('string', 'Amount', 'amount');

$p1 = rand(0,50);
$p2 = rand(0,50);
$p3 = rand(0,50);
$p4 = rand(0,50);

$dataTable->addRow(array('TV', $p1));
$dataTable->addRow(array('Running', $p2));
$dataTable->addRow(array('Video Games', $p3));
$dataTable->addRow(array('Sleeping', $p4));
$dataTable->addRow(array('Working', 1));
$dataTable->addRow(array('Sprinting', 1));
$dataTable->addRow(array('Driving', 1));
$dataTable->addRow(array('Golfing', 1));

$config = array(
    'title' => 'Activities',
    'titleTextStyle' => new textStyle(array(
        'color' => 'blue',
        'fontName' => 'Impact',
        'fontSize' => 24
    )),
    //'is3D' => TRUE,
    'pieSliceBorderColor' => 'orange',
    'pieSliceTextStyle' => new textStyle(array(
        'color' => 'yellow',
        'fontName' => 'Arial',
        'fontSize' => 18
    )),
    'reverseCategories' => TRUE,
    'sliceVisibilityThreshold' => .04,
    'pieResidueSliceColor' => '#0C04A0',
    'pieResidueSliceLabel' => 'Stuff I Do',
);

$this->gcharts->PieChart('Activities')->setConfig($config);
?>