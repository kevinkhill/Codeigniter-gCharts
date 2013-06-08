#Codeigniter-gCharts
###Google Chart API for Codeigniter
####The power of the Google, The simplicity of Codeigniter and the magic of PHP5
by [Kevin Hill](http://khilldesigns.site11.com)

A library that extends the flexibility and power of Google Charts into CodeIgniter using the magic of PHP5

## Installing
Copy the "libraries" folder into your Codeigniter application folder.

## Usage
Here is an example of how to create a line chart with two lines of data

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

    }
    
}
```