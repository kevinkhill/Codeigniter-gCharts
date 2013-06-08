<?php
    define('BASEPATH', __DIR__);
    include(BASEPATH . '/libraries/Gcharts.php');

//==============================================================================

    $gcharts = new Gcharts();
    $error;

    try {
        $gcharts->LineChart(array('Count', 'Actual', 'Projected'));

        $gcharts->LineChart->title('Temperature Variance');
//        $gcharts->LineChart->titlePosition('in');
//        $gcharts->LineChart->curveType('function');
        $gcharts->LineChart->width(1000)->height(350)->pointSize(2)->lineWidth(2);

        $chartArea = new chartArea();
        $chartArea->left(25)->top(25)->width('80%');

        $titleStyle = new textStyle();
        $titleStyle->color('#FF0A04')->fontName('Lucida')->fontSize(18);

        $gcharts->LineChart->chartArea($chartArea)->titleTextStyle($titleStyle);
        $gcharts->LineChart->colors(array('green', 'navy'));

        $legendStyle = new textStyle();
        $legendStyle->color('#F3BB00')->fontName('Arial')->fontSize(20);

        $legend = new legend();
        $legend->position('bottom')->alignment('center')->textStyle($legendStyle);

        $gcharts->LineChart->legend($legend);

        $tooltipStyle = new textStyle();
        $tooltipStyle->color('#C42B5F')->fontName('Tahoma')->fontSize(10);

        $tooltip = new tooltip();
        $tooltip->textStyle($tooltipStyle);

        $gcharts->LineChart->tooltip($tooltip);
    } catch(Exception $e) {
        $error = $e->getMessage();
    }


    for($a = 1; $a < 20; $a++)
    {
        $line1 = rand(-50,50);
        $line2 = rand(-50,50);
        $gcharts->LineChart->addData(array($a, $line1, $line2));
    }

//==============================================================================
?>


<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <title>Codeigniter gCharts</title>
        <?php echo Gcharts::$googleAPI; ?>
        <?php echo $gcharts->LineChart->output('chart_div'); ?>
    </head>

    <body>
        <div id="chart_div">
        </div>
        <hr />
        <div>
            <?php echo (isset($error) ? $error : ''); ?>
        </div>
        <hr />
        <?php var_dump($gcharts); ?>
    </body>
</html>