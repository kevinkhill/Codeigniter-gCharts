#Codeigniter-gCharts
###Google Chart API for Codeigniter

This is a library that extends the flexibility and power of Google Charts into CodeIgniter using the magic of PHP5
By: [Kevin Hill](kevinkhill@gmail.com)

If you have any questions or comments... please email me, post issues here, or fork me and help out ;)

##Currently Supported Charts
 * Line Charts
 * Area Charts
 * Pie Charts (and Donut)
 * Column Charts
 * More coming soon!


- - -

##Installing
1. ```git clone``` the repo into a directory of your choice.
2. ```cd``` into the freshly cloned repo directory.
3. Use the included script ```cp.sh``` to copy the files into their respective folders in your Codeigniter project.
    * ```cd Codeigniter-gCharts```
    * ```chmod +x ./cp.sh```
    * ```./cp.sh <PATH_TO_YOUR_CI_PROJECT>```
4. **OR** you can copy them manually to their corresponding folders in your Codeigniter project.
    * ```./config/gcharts.php``` -> ```<CI_ROOT>/application/config/gcharts.php```
    * ```./controllers/gchart_examples.php``` -> ```<CI_ROOT>/application/controllers/gchart_examples.php```
    * ```./helpers/gcharts_helper.php``` -> ```<CI_ROOT>/application/helpers/gcharts_helper.php```
    * ```./libraries/*``` -> ```<CI_ROOT>/application/libraries/```
    * ```./views/*``` -> ```<CI_ROOT>/application/views/```
5. That's it! You now have the power of Google Charts in your project.


##Examples
Example charts have been included, just navigate to ```http://<YOUR_CI_SITE>/index.php/gchart_examples```


##Configuration
Located at ```<CI_APPLICATION_FOLDER>/config/gcharts.php```, there are some options you can set globally for the gCharts library
 * autoloadCharts - Automatically load charts instead of calling the gcharts->load() function.
 * errorPrepend - This will be prepended to error messages to stylize, EX: ```<p class="error">```
 * errorAppend - This will come after the error message, probably should match and close the prepend value, EX: ```</p>```
 * More options coming soon...


##Usage
Here is an example of how to create a line chart with two lines of data

###The Controller
1. Load the library in the controller you will use to define the chart, or add it to your autoload config file.

 ```php
 //Load in the controller
 $this->load->library('gcharts');
 
 //Or in the autoload config file
 $autoload['libraries'] = array('gcharts');
 ```

2. Next load the chart that you are going to use, or autoload it in the gcharts config file.

 ```php
 //Load in th controller
 $this->gcharts->load('LineChart');
 
 //Or in the gcharts config file
 $config['autoloadCharts'] = array('LineChart');
 ```

3. Now we can use the gcharts library to create a DataTable. Pass a string to the DataTable function to assign a label for the table.
4. Then add your columns, defining what the chart's data will consist of. In this example, the first column is the horizontal axis, then then next two columns are the two sets of data. The order of arguments are as follows: [data type, label, id]

 ```php
 $dataTable = $this->gcharts->DataTable('Stocks');

 $dataTable->addColumn('number', 'Count', 'count');
 $dataTable->addColumn('number', 'Projected', 'projected');
 $dataTable->addColumn('number', 'Official', 'official');
 ```

5. Next add some data, for this example, it is filled with randomness. The addRow() function argument order follows the order in which the columns were added.
So here, array[0] is for 'count', array[1] is for 'projected' and array[2] is for 'official'

 ```php
 for($a = 1; $a < 25; $a++)
 {
     $data[0] = $a; //Count
     $data[1] = rand(800,1000); //Line 1's data
     $data[2] = rand(800,1000); //Line 2's data
 
     $dataTable->addRow($data);
 }
 ```

6. Now lets configure some options for the chart. There are many ways to customize the chart, but we'll keep it simple. (Refer to the documentation for the list of configuration options.)

 ```php
 $config = array(
     'title' => 'Stocks'
 );
 ```

7. Finally, pass the configuration to the chart of choice, LineChart in this example, making sure that the Chart label matches the DataTable label.

 ```php
 // Since we named the dataTable "Stocks"...
 // Call the LineChart function with "Stocks" as the param to use that dataTable
 $this->gcharts->LineChart('Stocks')->setConfig($config);
 ```



###The View
1. Within your view, use these functions to get your chart onto the page.
	* If you want everything generated automatically, use outputInto() with the div() function.
	* Pass a string as a label to the outputInto() function which will be used when creating the div.
	* Then use the div() function to create a div that autoomatically has the corresponding label as it's id.
	* NOTE: You can also pass [width, height] to the div() function and it will be applied to the div.
2. If you already have a ```<div id="SOME-ID">``` on the page, then ommit the div() function and just pass the div's ID into the outputInto() function.

 ```php
 //Example #1, have the library create the div
 echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');
 echo $this->gcharts->div(600, 300);

 //Example #2, output into a div you already created
 echo $this->gcharts->LineChart('Stocks')->outputInto('SOME-ID');
 ```
3. You can also setup a way of viewing errors in the creation of the chart by using this method.

 ```php
 if($this->gcharts->hasErrors())
 {
     echo $this->gcharts->getErrors();
 }
 ```


##Putting it all together

```php
//Controller

$this->load->library('gcharts');
$this->gcharts->load('LineChart');

$dataTable = $this->gcharts->DataTable('Stocks');

$dataTable->addColumn('number', 'Count', 'count');
$dataTable->addColumn('number', 'Projected', 'projected');
$dataTable->addColumn('number', 'Official', 'official');

for($a = 1; $a < 25; $a++)
{
    $data[0] = $a //Count
    $data[1] = rand(800,1000); //Line 1's data
    $data[2] = rand(800,1000); //Line 2's data

    $dataTable->addRow($data);
}

$config = array(
    'title' => 'Stocks'
);

$this->gcharts->LineChart('Stocks')->setConfig($config);
```

```php
//View

echo $this->gcharts->LineChart('Stocks')->outputInto('stock_div');
echo $this->gcharts->div(600, 300);

if($this->gcharts->hasErrors())
{
    echo $this->gcharts->getErrors();
}
```

###Output
![Chart Output](http://i.imgur.com/XVM8q7T.png)


##Todo
 * Add event callbacks
 * Support more charts
 * Make available via composer and/or sparks and/or non-codeigniter projects


##License

                              MIT License
             Copyright (c) 2013, Kevin Hill of KHill Designs

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
