<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Testem extends CI_Model{

	function __construct(); {

		parent::__construct();
	}

	function myData(){

		$pato = shell_exec('ls');

		$info = preg_split('#[\r\n]+#', $pato);

		if($info->num_rows() > 0){
			retun $info;
		}else{
			return NULL;
		}
	}
}
?>
