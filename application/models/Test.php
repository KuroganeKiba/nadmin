<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Model{

	function __construct() {

		parent::__construct();
	}

	function myData(){

		$pato = shell_exec('ls');

		$info = preg_split('#[\r\n]+#', $pato);

		$this->set('info',$info);
		
			retun $info[];
		
		}
	}
}
?>
