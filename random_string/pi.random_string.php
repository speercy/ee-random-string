<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
    'pi_name'           => 'Random String',
    'pi_version'        => '1.2.1',
    'pi_author'         => 'Steven Peercy',
    'pi_author_url'     => 'https://github.com/speercy',
    'pi_description'    => 'Generate random string for ExpressionEngine',
    'pi_usage'          => Random_string::usage()
);

class Random_string {

    public $return_data = '';

    public function Random_string()
    {
        $length     = intval(ee()->TMPL->fetch_param('length'));
        $length     = empty($length) ? 8 : $length;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string     = '';

        for ($p = 0; $p < $length; $p++)
        {
            $string .= $characters[mt_rand(0, (strlen($characters)-1))];
        }

        $this->return_data = $string;
    }

    function usage() {
        ob_start();
?>

Random String simply gives an output of a random string consisting of numbers 0-9 and upper- and lower-case letters from A-Z.

If the length attribute is not specified, the plugin will return eight characters.

{exp:random_string}

{exp:random_string length="12"}

<?
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}

/* End of file pi.random_string.php */
