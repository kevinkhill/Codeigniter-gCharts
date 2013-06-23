#Codeigniter-gCharts
###Google Chart API for CodeIgniter
This is a library that extends the flexibility and power of Google Charts into CodeIgniter using the magic of PHP5
by [Kevin Hill](http://khilldesigns.site11.com)
If you have any questions or comments, please email me or post issues here on Github

> This has been designed as a "Spark" for Codeigniter, which is also hosted here on
> [Getsparks](http://getsparks.org)
 - - -

##Installing
1. Follow this guide on [getsparks](http://getsparks.org/install) to enable
the spark manager for your codeigniter project
2. Follow this next [guide](http://getsparks.org/get-sparks) to install the gcharts
spark into codeigniter, replacing "example-spark" with "gcharts" (no quotes & ommiting
the version number)

##Usage
The library has Here is an example of how to create a line chart with two lines of data

###First the controller
1. Copy the "libraries" folder into your Codeigniter application folder.
2. Load the library in your controller you will use to define the chart.
```
$this->load->library('gcharts');
```
3. Use the now defined gcharts library to pick which chart you are going to build, we will be creating a LineChart.
4. Pass an array defining what you will be plotting in your graph. The first item will be the horizontal axis, the second item => the first line, the third item => second line, etc...
```
$this->gcharts->LineChart(
    array('Amount', 'Current', 'Projected')
);
```
5.

 - - -

###Example Controller, welcome.php with LineChart
```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('gcharts');
    }

    public function chart()
    {
        try {
            $this->gcharts->LineChart(array('Count', 'Actual', 'Projected'));

            $this->gcharts->LineChart->title('Temperature Variance');
            $this->gcharts->LineChart->curveType('function');
            $this->gcharts->LineChart->width(800)->height(250)->pointSize(2)->lineWidth(2);

            $chartArea = new chartArea();
            $chartArea->left(25)->top(25)->width('75%');

            $textStyle = new textStyle();
            $textStyle->color('#FF0A04')->fontName('Lucida')->fontSize(18);

            $gcharts->LineChart->addOption($chartArea)->titleTextStyle($textStyle);
        } catch(Exception $e) {
            data['error'] = $e->getMessage();
        }

        for($a = 1; $a < 10; $a++)
        {
            $line1 = rand(-20,20);
            $line2 = rand(-20,20);
            $gcharts->LineChart->addData(array($a, $line1, $line2));
        }

        $this->load->view('example.php', $data);
    }

}
```

 - - -

###Now the view
1. The Google API needs to be loaded into the header first and foremost. Put this
```
<?php echo Gcharts::$googleAPI; ?>
```
into the head of the view, The script tags are included.
2. Then use the output method of the chart to pick where the chart will be loaded. Pass a string with the ID of an element to load the chart into, here we are using 'chart_div'.


###Example view.php
```html
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="en" />
        <title>Codeigniter-gCharts</title>
        <?php echo Gcharts::$googleAPI; ?>
        <?php echo $gcharts->LineChart->output('chart_div'); ?>
    </head>

    <body>
        <div id="chart_div">
        </div>
        <div>
            <?php echo $error; ?>
        </div>
    </body>
</html>
```

###Output
![Chart Output](http://i.imgur.com/Eojy0zu.png)