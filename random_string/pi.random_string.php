<?

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
=====================================================
 http://stevenpeercy.com
-----------------------------------------------------
 Copyright (c) 2010 Steven Peercy
=====================================================
 File: pi.random_string.php
-----------------------------------------------------
 Purpose: Random String plugin
=====================================================

*/

$plugin_info = array(
					'pi_name'			=> 'Random String',
					'pi_version'		=> '1.2',
					'pi_author'			=> 'Steven Peercy',
					'pi_author_url'		=> 'http://stevenpeercy.com/',
					'pi_description'	=> 'Returns a random string',
					'pi_usage'			=> Random_string::usage()
					);

class Random_string {

	public $return_data = '';

	public function Random_string()
	{
		$this->EE =& get_instance();
		$length = $this->EE->TMPL->fetch_param('length');
		if(empty($length)) { $length = '8'; }

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';

		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, (strlen('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')-1))];
		}

		$this->return_data = $string;

	}
	// End
    
	// Usage
	function usage() {
		ob_start();

?>

Random String simply gives an output of a random string consisting of numbers 0-9 and upper- and lower-case letters from A-Z.

If the length attribute isn't specified, the plugin will return eight characters.

{exp:random_string}

{exp:random_string length="12"}

<?

		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
	// End

}
/* End of file pi.random_string.php */ 
?>