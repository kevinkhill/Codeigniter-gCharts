#Codeigniter-gCharts
###Google Chart API for CodeIgniter
This is a library that extends the flexibility and power of Google Charts into CodeIgniter using the magic of PHP5  
by [Kevin Hill](http://khilldesigns.site11.com)

 - - -

##Installing
Copy the "libraries" folder into your Codeigniter application folder.

##Usage
Here is an example of how to create a line chart with two lines of data

###First the controller
1. Copy the "libraries" folder into your Codeigniter application folder.
2. Load the library in your controller you will use to define the chart.  
```php
$this->load->library('gcharts');
```
3. Use the now defined gcharts library to pick which chart you are going to build, we will be creating a LineChart.
4. Pass an array defining what you will be plotting in your graph. The first item will be the horizontal axis, the second item => the first line, the third item => second line, etc...  
```php
$this->gcharts->LineChart(
    array('Amount', 'Current', 'Projected')
);
```
5. 


###Now the view
1. The Google API needs to be loaded into the header first and foremost. Put this
```php
<?php echo Gcharts::$googleAPI; ?>
```
into the head of the view. The script tags are included.

 - - -

###Example Controller with LineChart  
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
            $this->gcharts->LineChart(array('', 'Actual', 'Projected'));

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

        $this->load->view('example.php', $data);
    }
    
}
```


###Example View
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