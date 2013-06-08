<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chartException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

/* End of file chartException.php */
/* Location: ./application/libraries/gcharts/chartException.php */