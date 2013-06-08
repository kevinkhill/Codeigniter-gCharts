<?php define('BASEPATH', __DIR__); include(BASEPATH . '/libraries/Gcharts.php');

    $gcharts = new Gcharts();
    $error;
    
    try {
        $gcharts->AreaChart(array('Count', 'Actual', 'Projected'));

        $gcharts->AreaChart->title('Temperature Variance');
//        $gcharts->AreaChart->titlePosition('in');
        $gcharts->AreaChart->curveType('function');
        $gcharts->AreaChart->width(800)->height(250)->pointSize(2)->lineWidth(2);

        $chartArea = new chartArea();
        $chartArea->left(25)->top(25)->width('75%');

        $textStyle = new textStyle();
        $textStyle->color('#FF0A04')->fontName('Lucida')->fontSize(18);

        $gcharts->AreaChart->addOption($chartArea)->titleTextStyle($textStyle);
    } catch(Exception $e) {
        $error = $e->getMessage();
    }


    for($a = 1; $a < 10; $a++)
    {
        $line1 = rand(-20,20);
        $line2 = rand(-20,20);
        $gcharts->AreaChart->addData(array($a, $line1, $line2));
    }

?>


<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <title>Codeigniter gCharts</title>
        <?php echo Gcharts::$googleAPI; ?>
        <?php echo $gcharts->AreaChart->output('chart_div'); ?>
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