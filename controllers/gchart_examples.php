<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gchart_examples extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('gcharts');
    }

    public function index()
    {
        $this->load->view('gcharts/index');
    }

    public function line_chart_basic()
    {
        $dataTable = $this->gcharts->DataTable('Stocks');

        $dataTable->addColumn('number', 'Count', 'count');
        $dataTable->addColumn('number', 'Projected', 'projected');
        $dataTable->addColumn('number', 'Official', 'official');

        for($a = 1; $a < 25; $a++)
        {
            $line1 = rand(800,1000);
            $line2 = rand(800,1000);
            $dataTable->addRow(array($a, $line1, $line2));
        }

        $config = array(
            'title' => 'Stocks'
        );

        $this->gcharts->LineChart('Stocks')->setConfig($config);

        $this->load->view('gcharts/line_chart_basic');
    }




    public function render($level, $chart, $label, $div, $width=0, $height=0)
    {
        $file = $this->examplesDir.$level.$chart.'.src.php';
        $src = preg_replace('[\<\?php|\?\>]', '', file_get_contents($file));

        require_once($file);

        $this->_add_data('src', $src);
        $this->_add_data('chart', $chart);
        $this->_add_data('label', $label);
        $this->_add_data('div', $div);
        if($width != 0 && $height != 0)
        {
            $this->_add_data('height', $height);
            $this->_add_data('width', $width);
        }
        $this->viewdir = '';
        $this->_render_view('chart');
    }

}

/* End of file examples.php */
/* Location: ./application/controllers/examples.php */