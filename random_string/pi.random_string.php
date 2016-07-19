<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
    'pi_author'      => 'Steven Peercy',
    'pi_author_url'  => 'https://github.com/speercy',
    'pi_name'        => 'Random String',
    'pi_description' => 'Generate random string for ExpressionEngine',
    'pi_version'     => '2.1',
    'pi_usage'       => 'https://github.com/speercy/ee-random-string'
);

class Random_string {

    public $return_data = '';

    public function Random_string()
    {
        $length     = intval(ee()->TMPL->fetch_param('length'));
        $length     = empty($length) ? 8 : $length;
        $charset    = explode('|', ee()->TMPL->fetch_param('charset'));

        $characters = '';
        $string     = '';
        $uppers     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowers     = 'abcdefghijklmnopqrstuvwxyz';
        $digits     = '0123456789';
        $selection  = false;

        if(in_array('uppers', $charset)) { $characters .= $uppers; $selection = true; }
        if(in_array('lowers', $charset)) { $characters .= $lowers; $selection = true; }
        if(in_array('digits', $charset)) { $characters .= $digits; $selection = true; }

        if(!$selection) $characters .= $uppers.$lowers.$digits;

        for ($p = 0; $p < $length; $p++) { $string .= $characters[mt_rand(0, (strlen($characters)-1))]; }

        $this->return_data = $string;
    }
}

/* End of file pi.random_string.php */
