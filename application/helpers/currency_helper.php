<?php
defined('BASEPATH') or exit('No direct script access allowed');
function currency($nominal)
{
    "Rp. " . number_format($nominal);
}

/* End of file: currency_helper.php */
