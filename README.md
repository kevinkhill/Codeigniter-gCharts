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
Here is an example of how to create a line chart with two lines of data

###First, the Controller
1. Load the spark in the controller you will use to define the chart. Or add it to your autoload config file.
```php
//In controller
$this->load->spark('gcharts/0.0.1');
```
OR
```php
//In autoload config
$autoload['sparks'] = array('gcharts/0.0.1');
```
2. Now we can use the gcharts spark to create a DataTable. Pass a string to the DataTable function to assign a label for the table.
3. Then add your columns, defining what the chart's data will consist of. In this example, the first column is the horizontal axis, 
then then next two columns are the two sets of data. The order of arguments are as follows: [data type, label, id]
```php
$dt = $this->gcharts->DataTable('Stocks');

$dt->addColumn('number', 'Count', 'count');
$dt->addColumn('number', 'Projected', 'projected');
$dt->addColumn('number', 'Official', 'official');
```
4. Next add some data! (For this example, it is filled with randomness). The add row function argument order, follows the order in which the columns were added.
So here, array[0] is for 'count', array[1] is for 'projected' and array[2] is for 'official'
```php
for($a = 1; $a < 25; $a++)
{
    $line1 = rand(800,1000);
    $line2 = rand(800,1000);
    $dt->addRow(array($a, $line1, $line2));
}
```
5. Now lets configure some options for the chart. There are many ways to customize the chart, but we'll keep it simple. (Refer to the documentation for the list of configuration options.)
```php
$config = array(
    'title' => 'Stocks'
);
```
6. Finally, pass the configuration to the chart of choice, LineChart in this example, making sure that the Chart label matches the DataTable.
```php
$this->gcharts->LineChart('Stocks')->setConfig($config);
```

 - - -
 
###Second, the View
1. Within your view, use these functions to get your chart onto the page.
	* If you want everything generated automatically, use the outputInto function. Pass a string label which will be used when creating the div.
	* Then use the div() function to create a div with the corresponding label. Here you can also pass [width, height] to the div() function and it will be applied to the div.
2. If you already have a <div id="SOME-ID"> on the page, then ommit the div() function and just pass the div's ID into the outputInto() function.

```php
//Example #1
echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');

echo $this->gcharts->div();

//Example #2
echo $this->gcharts->LineChart('Stocks')->outputInto('SOME-ID');
```
3. You can also setup a way of viewing errors in the creation of the chart by using this method.
```php
if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
} 
```  

###Output
![Chart Output](http://i.imgur.com/Eojy0zu.png)