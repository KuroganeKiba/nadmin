<?php

class Log extends CI_Controller {


	public function index(){ //construye el controlador para el index
		$log = $_POST['log'];

		// ------------------ //
		// carga de librerias //
		// ------------------ //

		$this->load->helper('file'); // permite la lectura de archivos

		// -------------- //
		// Lectura de log //
		// -------------- //

		$logRead = read_file('/home/kimbo/log/'.$log.''); // lee el archivo

		$info = preg_split('#[\r\n]+#', $logRead); // crea un array con un item por cada salto de texto

		foreach($info as $obeject){

			if (strpos($obeject, 'Finished with') !== false) { // imprime sólo las lineas de inters
			    echo $obeject . '<br />';
			}

			
		}
	}

};