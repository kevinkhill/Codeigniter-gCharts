<h1><?php echo anchor('gchart_examples', 'Codeigniter gChart Examples'); ?> \ Advanced Pie Chart</h1>
<?php
    echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
    echo $this->gcharts->div();

    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>

<hr />

<h2>Controller Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
$this->gcharts->load('PieChart');

$this->gcharts->DataTable('Activities')
              ->addColumn('string', 'Foods', 'food')
              ->addColumn('string', 'Amount', 'amount')
              ->addRow(array('Driving', 5))
              ->addRow(array('Video Games', 5))
              ->addRow(array('Eating', 10))
              ->addRow(array('TV', 25))
              ->addRow(array('Working', 30))
              ->addRow(array('Sleeping', 20))
              ->addRow(array('Gym', 2))
              ->addRow(array('Running', 1))
              ->addRow(array('Walking Dog', 1));

$config = array(
    'title' => 'Activities',
    'titleTextStyle' => new textStyle(array(
        'color' => 'blue',
        'fontName' => 'Impact',
        'fontSize' => 24
    )),
    'width' => 800,
    'height' => 600,
    'backgroundColor' => new backgroundColor(array(
        'stroke' => '#C2A86F',
        'strokeWidth' => 5,
        'fill' => '#C8F9FC'
    )),
    'legend' => new legend(array(
        'position' => 'bottom',
        'alignment' => 'start',
        'textStyle' => new textStyle(array(
            'color' => '#7F4818',
            'fontName' => 'Arial Bold',
            'fontSize' => 14
        ))
    )),
    'tooltip' => new tooltip(array(
        'showColorCode' => TRUE,
        'textStyle' => new textStyle(array(
            'color' => '#00C0B0',
            'fontName' => 'Courier New',
            'fontSize' => 18
        ))
    )),
    'pieSliceBorderColor' => '#F050F0',
    'pieSliceTextStyle' => new textStyle(array(
        'color' => 'yellow',
        'fontName' => 'Arial',
        'fontSize' => 16
    )),
    'pieStartAngle' => 100,
    'reverseCategories' => TRUE,
    'sliceVisibilityThreshold' => .03,
    'pieResidueSliceColor' => '#0C04A0',
    'pieResidueSliceLabel' => 'Stuff I Do',
    'slices' => array(
        4 => new slice(array(
            'color' => 'red',
            'offset' => .2,
            'textStyle' => new textStyle(array(
                'color' => '#7CA8FA',
                'fontName' => 'Helvetica',
                'fontSize' => 13
            ))
        )),
        5 => new slice(array(
            'color' => 'yellow',
            'offset' => .2,
            'textStyle' => new textStyle(array(
                'color' => '#2CF80A',
                'fontName' => 'Times New Roman',
                'fontSize' => 11
            ))
        )),
        6 => new slice(array(
            'color' => '#000000',
            'offset' => .2,
            'textStyle' => new textStyle(array(
                'color' => '#3B20FE',
                'fontName' => 'Impact',
                'fontSize' => 15
            ))
        ))
    )
);

$this->gcharts->PieChart('Activities')->setConfig($config);
</pre>

<h2>View Code</h2>
<pre style="font-family:Courier New, monospaced; font-size:10pt;border:1px solid #000;background-color:#e0e0e0;padding:5px;">
echo $this->gcharts->PieChart('Activities')->outputInto('activites_div');
echo $this->gcharts->div();

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
</pre>